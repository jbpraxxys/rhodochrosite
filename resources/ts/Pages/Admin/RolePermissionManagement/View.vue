<template>
    <admin-layout :pages="pages" title="Admin">
        <template #actionButtons>
            <ExportButton
                v-if="activeTab !== 'activity_logs'"
                :routeLink="route('admin.admin-management.index', { action: 'export' })"
                class="mr-2"
            />
            <CreateButton
                v-if="activeTab !== 'activity_logs'"
                :routeLink="route('admin.admin-management.create')"
            />
        </template>

        <!-- Tabs -->
        <Tabs
            :tabs="tabs"
            :button-items="true"
            :active-tab="activeTab"
            @update:tab="(value: string) => (activeTab = value)"
            :tab-route="route('admin.admin-management.index')"
        />
        <div class="px-12 py-6">

            <!-- Filter -->
            <div class="px-6 py-4 border-l border-t border-r  rounded-t-lg" v-if="activeTab !== 'activity_logs'">
                <Filter
                    :search="searchText"
                    @update:searchText="(value) => (searchText = value)"
                    @update:filters="applyFilters"
                    :custom-filters="activeTab !== 'activity_logs'"
                >
                    <template #fields>
                        <div class="mb-6">
                            <date-picker
                                id="filterDate"
                                label="Date Created"
                                placeholder="Filter Date Created"
                                v-model="filterDate"
                                :enableTimePicker="false"
                                @update:modelValue="(value) => (filterDate = value)"
                            />
                        </div>
                    </template>
                </Filter>
            </div>

            <div v-if="activeTab !== 'activity_logs'" class="border-l border-b border-r rounded-b-lg overflow-hidden">
                <DataTable
                    :headers="headers"
                    :no-action="false"
                    :count="5"
                >
                    <template v-slot:body>
                        <template v-for="item in permissions" :key="item">
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ item.name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ item.description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <CheckIcon class="w-5 h-5" />
                                </td>

                                <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                                >
                                    <CheckIcon class="w-5 h-5" />
                                </td>
                               
                            </tr>
                        </template>
                    </template>
                </DataTable>
                <pagination :items="roles" />
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { CheckIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    roles: {
        type : Object,
        default: () => {},
        require: true,
    },
    activeCount: {
        type : Number,
        default: 0
    },
    archivedCount: {
        type : Number,
        default: 0
    },
    selectedTab: {
        type : String,
        default: null
    },
    query: {
        type : String,
        default: null
    },
    filterDate: {
        type : String,
        default: null
    }
});

/**---------------*
 * VARS
 *----------------*/
const roles = computed(() => props.roles);

const searchText = ref<string>(props.query);
const activeTab = ref<string>(props.selectedTab);
const filterDate = ref<string>(props.filterDate);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const tabs: { name: string, value?: string, count?: Number }[] = [
    {
        name: 'Active',
        value: null,
        count: props.activeCount
    },
    {
        name: 'Archived',
        value: 'archived',
        count: props.archivedCount
    }
];

const headers: { text: string }[] = [
    { text: 'Permission' },
    { text: 'Yes' },
    { text: 'No' },
];

const pages = [
    {
        href: route("admin.role-permission-management.view"),
        name: "Roles",
    },
    {
        href: "",
        name: "View",
    },
];

const permissions = [
    {
        name: "Manage Dashboard",
        description: "Allow the Admin to access the dashboard"
    },
    {
        name: "Manage Trips",
        description: "Allow the Admin to access the trips"
    },
    {
        name: "Manage Cash Liquidation",
        description: "Allow the Admin to access the cash liquidation"
    },
    {
        name: "Manage Doc Liquidation",
        description: "Allow the Admin to access the doc liquidation"
    },
    {
        name: "Manage Invoice",
        description: "Allow the Admin to access the invoice"
    },
    {
        name: "Manage Payroll",
        description: "Allow the Admin to access the payroll"
    },
]

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
            date: filterDate.value,
            tab: props.selectedTab
        }),
        {
            preserveState: true
        }
    )
}
/**---------------*
 * WATCHERS
 *----------------*/

watch(
    searchText,
    throttle((val: string) => {
        router.get(
            route("admin.admin-management.index"),
            pickBy({
                query: val,
                tab: props.selectedTab
            }), // removes falsey values
            {
                preserveState: true,
            }
        );
    }, 1000)
);
</script>
