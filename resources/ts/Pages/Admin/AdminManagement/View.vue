<template>
    <admin-layout :pages="pages" title="Admins">
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
        <div 
            v-if="activeTab !== 'activity_logs'" 
            class="w-[552px] mx-auto mt-6 p-6 text-sm border rounded-lg overflow-hidden"
        >
            <p class="font-semibold">Admin Information</p>
            <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur</p>

            <div class="w-1/2 mt-6 inline-block">
                <div class="mb-6">
                    <p class="text-gray-500">Full Name</p>
                    <p class="text-gray-900">{{ admin.name }}</p>
                </div>
                <div class="">
                    <p class="text-gray-500">Email Address</p>
                    <p class="text-gray-900">{{ admin.email }}</p>
                </div>
            </div>

            <div class="w-1/2 mt-6 inline-block">
                <div class="mb-6">
                    <p class="text-gray-500">Role</p>
                    <p class="text-blue-600">Superadmin</p>
                </div>
                <div class="">
                    <p class="text-gray-500">Mobile Number</p>
                    <p class="text-gray-900">0900 000 0000</p>
                </div>
            </div>

            <!-- first_name: props.admin.first_name,
            last_name: props.admin.last_name,
            email: props.admin.email,
            title: props.admin.title,
            role_id: props.admin.role_id -->
        </div>

    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

const props = defineProps({
    items: {
        type : Object,
        default: () => {},
        require: true,
    },
    informationCount: {
        type : Number,
        default: 0
    },
    activityLogsCount: {
        type : Number,
        default: 0
    },
    selectedTab: {
        type : String,
        default: null
    },
    admin: {
        type: Object
    },
    roles: {
        type: Object
    }
});

/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);

const activeTab = ref<string>(props.selectedTab);
const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const tabs: { name: string, value?: string, count?: Number }[] = [
    {
        name: 'Information',
        value: null,
        count: props.informationCount
    },
    {
        name: 'Activity Logs',
        value: 'activityLogs',
        count: props.activityLogsCount
    }
];

const pages = [
    {
        href: "/",
        name: "Dashboard",
    },
    {
        href: "/admin/admin-management/index",
        name: "Admins",
    },
    {
        href: "",
        name: props.admin.name,
    },
];

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
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

</script>
