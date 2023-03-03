<template>
    <admin-layout title="Roles & Permissions" :breadcrumb-pages="breadcrumbs">
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value) => (activeTab = value)"
                :tab-route="route('admin.role-permission-management.index')"
            >
                <template #buttons v-if="activeTab !== 'activity_logs'">
                    <create-button :route="route('admin.role-permission-management.create')" />
                </template>
            </Tabs>

            <!-- Filter -->
            <div class="py-3 px-6" v-if="activeTab !== 'activity_logs'">
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
        </div>

        <DataTable
            :headers="headers"
            :no-action="noAction"
            :count="items.data.length"
        >
            <template v-slot:body>
                <template v-for="role in items.data" :key="role.name">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ role.id }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ role.name }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ role.description }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ role.created_at }}
                            </div>
                        </td>

                        <td
                            v-if="!noAction"
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                        >
                            <template v-if="activeTab !== 'archived'">
                                <edit-button
                                    class="mr-3"
                                    :route="route('admin.role-permission-management.edit', role.id)"
                                />
                                <delete-button @click="selectDelete(role)" />
                            </template>

                            <restore-button
                                v-if="selectedTab === 'archived'"
                                @click="selectRestore(role)"
                            />
                            
                        </td>
                    </tr>
                </template>
            </template>
        </DataTable>

        <pagination class="mb-4" :items="items" />

        <restore-modal
            title="Restore Admin"
            :show="showRestoreModal"
            :item-name="restoreItemName"
            @confirm="processRestore"
            @cancel="showRestoreModal = false"
        ></restore-modal>

        <delete-modal
            title="Archive Admin"
            :show="showDeleteModal"
            :item-name="deleteItemName"
            @confirm="processDelete"
            @cancel="showDeleteModal = false"
        ></delete-modal>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

const props = defineProps([
    "items", 
    "activeCount", 
    "archivedCount", 
    "selectedTab", 
    "query",
    "filterDate",
]);


/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);

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
    { text: '#' },
    { text: 'Role Name' },
    { text: 'Date Created'}
];

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
            date: filterDate.value
        }),
        {
            preserveState: true
        }
    )
}

const archiveItemName = computed(() =>
    selectedItem.value ? selectedItem.value.name : ""
);

const selectArchive = (item: object): void => {
    selectedItem.value = item;
    showArchiveModal.value = true;
}

const selectRestore = (item: object): void => {
    selectedItem.value = item;
    showRestoreModal.value = true;
}

const processArchive = (): void => {
    router.delete(
        route('admin.admin-management.delete', selectedItem.value.id),
        {
            preserveState: false
        }
    )
}

const processRestore =(): void => {
    router.post(
        route("admin.role-permission-management.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
    )
}

/*---------------*
* Import Modal  *
*---------------*/
const showModal = ref(false);
const importFile = ref(null);

const importModal = () => {
    showModal.value = true;
}

const importData = () => {
    router.post(
        route("admin.admin-management.import"),
        {
            file: importFile.value,
        },
        {
            preserveState: false,
            preserveScroll: true,
        }
    );
}

/**---------------*
 * WATCHERS
 *----------------*/

watch(
    searchText,
    throttle((val: string) => {
        router.get(
            route("admin.role-permission-management.index"),
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
