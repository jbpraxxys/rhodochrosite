<template>
    <admin-layout title="Admin Management" :breadcrumb-pages="breadcrumbs">
        <!-- Tabs -->
        <div>
            <tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value) => (activeTab = value)"
                :tab-route="route('admin.admin-management.index')"
            >
                <template #buttons v-if="activeTab !== 'activity_logs'">
                    <export-button
                        :route="route('admin.admin-management.index', { action: 'export' })"
                        class="mr-2"
                    />
                    <create-button :route="route('admin.admin-management.create')" />
                </template>
            </tabs>
            

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

        <div v-if="activeTab !== 'activity_logs'">
            <DataTable 
                :headers="headers" 
                :no-action="noAction"
                :count="items.data.length"
            >
                <template v-slot:body>
                    <template v-for="item in items.data" :key="item">
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img
                                            class="h-10 w-10 rounded-full object-cover"
                                            :src="item.profile_photo_url"
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ item.name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ item.email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ "None" }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ item.created_at }}
                            </td>

                            <td
                                v-if="!noAction"
                                class="
                                    px-6
                                    py-4
                                    whitespace-nowrap
                                    text-sm text-gray-500 text-center
                                "
                            >
                                <template v-if="selectedTab !== 'archived'">
                                    <edit-button
                                        class="mr-3"
                                        :route="route('admin.admin-management.edit', item.id)"
                                    />
                                    <delete-button @click="selectArchive(item)" />
                                </template>

                                <restore-button
                                    v-if="selectedTab === 'archived'"
                                    @click="selectRestore(item)"
                                />
                            </td>
                        </tr>
                    </template>
                </template>
            </DataTable>
            <pagination :items="items" />
        </div>

        <!-- <template v-if="activeTab === 'activity_logs'">
            <activity-logs
                :logs="logs"
                :result-route="route('admin.admin-management.index')"
                tab="activity_logs"
                :query="searchLog"
                :event="filterEvent"
                :rows="rows"
            />
        </template> -->

        
        <DeleteModal
            title="Archive Admin"
            :show="showArchiveModal"
            :item-name="archiveItemName"
            @confirm="processArchive"
            @cancel="showArchiveModal = false"
        />

        <ImportModal
            title="Import Admins"
            content="Are you sure you wish to import this file"
            action-text="Import"
            :show="showModal"
            :manifest-route="route('admin.admin-management.manifest')"
            @cancel="showModal = false"
            @confirm="importData"
        >
            <template v-slot:body>
                <dropzone
                    :label="'Import'"
                    :id="'import'"
                    :description="'CSV, XLSX upto 2MB'"
                    :preview-file="true"
                    v-model:file="importFile"
                    accept=".csv,.xls,.xlsx"
                />
            </template>
        </ImportModal>
    </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import ExportButton from "@/Components/ActionButtons/ExportButton.vue";
import CreateButton from "@/Components/ActionButtons/CreateButton.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import DataTable from "@/Components/DataTable.vue";
import Tabs from "@/Components/Tabs.vue";
import Filter from "@/Components/Filter.vue";
import { computed, ref, watch } from "vue";
import {
    UserPlusIcon,
    PencilSquareIcon,
    TrashIcon,
    MagnifyingGlassIcon,
    ArrowPathIcon,
    XCircleIcon,
    ArrowDownTrayIcon,
    ArrowUpTrayIcon,
} from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import DeleteModal from "@/Components/DeleteModal.vue";
import Pagination from "@/Components/Pagination.vue";
import DatePicker from "@/Components/DatePicker.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import ImportModal from "@/Components/ImportModal.vue";
import Dropzone from "@/Components/Dropzone.vue";

export default {
    components: {
        AdminLayout,
        DeleteModal,
        Pagination,
        UserPlusIcon,
        PencilSquareIcon,
        TrashIcon,
        MagnifyingGlassIcon,
        ArrowPathIcon,
        XCircleIcon,
        ArrowDownTrayIcon,
        ArrowUpTrayIcon,
        Link,
        ImportModal,
        Dropzone,
        ExportButton,
        CreateButton,
        EditButton,
        DeleteButton,
        RestoreButton,
        DataTable,
        Tabs,
        Filter,
        DatePicker
    },
    props: [
        "items",
        "activeCount",
        "archivedCount",
        "selectedTab",
        "query",
    ],
    setup(props) {
        const activeTab = ref(props.selectedTab);

        /*--------------------*
         * Table Data/Init Vars
         *--------------------*/
        const items = computed(() => props.items);

        /*--------------*
         * Table Search
         *--------------*/
        const searchText = ref(props.query);
        watch(
            searchText,
            throttle((val) => {
                Inertia.get(
                    route("admin.admin-management.index"),
                    pickBy({ query: val, tab: props.selectedTab }), // removes falsey values
                    {
                        preserveState: true,
                    }
                );
            }, 1000)
        );
        /*---------------*
         * Breadcrumbs
         *---------------*/
        const breadcrumbs = [
            { name: "Admin Management", href: "#", current: true },
        ];

        /*---------------*
         * Tabs
         *---------------*/
        const tabs = [
            {
                name: "Active",
                value: null,
                href: "#",
                count: props.activeCount,
            },
            {
                name: "Archived",
                value: "archived",
                href: "#",
                count: props.archivedCount,
            },
        ];

        const headers = [
            { text: "Admin", value: "admin", width: "50%" },
            { text: "Role", value: "role" },
            { text: "Date Created", value: "dateCreated" },
        ];

        // function isSelectedTab(value) {
        //   return props.selectedTab === value;
        // }
        // function selectTab(value) {
        //   Inertia.get(
        //     route("admin.admin-management.index"),
        //     pickBy({ tab: value }), // removes falsey values
        //     {
        //       preserveState: false,
        //     }
        //   );
        // }

        /*---------------*
         * Delete Modal  *
         *---------------*/


        /*---------------*
         * Archive Modal  *
         *---------------*/
        const showArchiveModal = ref(false);
        const selectedItem = ref(null);
        const archiveItemName = computed(() =>
            selectedItem.value ? selectedItem.value.name : ""
        );
        function selectArchive(item) {
            selectedItem.value = item;
            showArchiveModal.value = true;
        }
        function processArchive() {
            Inertia.delete(
                route("admin.admin-management.delete", selectedItem.value.id),
                { preserveState: false }
            );
        }

        /*---------------*
         * Import Modal  *
         *---------------*/
        const showModal = ref(false);
        const importFile = ref(null);

        function importModal() {
            showModal.value = true;
        }

        function importData() {
            Inertia.post(
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

        return {
            breadcrumbs,
            // tabs
            tabs,
            activeTab,
            // selectTab,
            // isSelectedTab,
            // Table
            items,
            searchText,
            headers,
            // Delete Modal
            showArchiveModal,
            selectArchive,
            processArchive,
            archiveItemName,
            // Import
            showModal,
            importFile,
            importModal,
            importData,
        };
    },
};
</script>
