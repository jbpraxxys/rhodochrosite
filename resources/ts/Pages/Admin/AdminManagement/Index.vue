<template>
    <admin-layout title="Admin Management">
        <!-- Tabs -->
        <div>
            <Tabs
                :tabs="tabs"
                :button-items="true"
                :active-tab="activeTab"
                @update:tab="(value: string) => (activeTab = value)"
                :tab-route="route('admin.admin-management.index')"
            >
            <template #buttons>
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

        <div v-if="activeTab !== 'activity_logs'">
            <DataTable 
                :headers="headers" 
                :no-action="false"
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
                                {{ item.role.name }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ item.created_at }}
                            </td>

                            <td
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
                                        :routeLink="route('admin.admin-management.edit', item.id)"
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

        <DeleteModal
            title="Archive Admin"
            :show="showArchiveModal"
            :item-name="archiveItemName"
            @confirm="processArchive"
            @cancel="showArchiveModal = false"
        />

        <RestoreModal
            title="Restore Admin"
            :show="showRestoreModal"
            @confirm="processRestore"
            @cancel="showRestoreModal = false"
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
    { text: 'Admin' },
    { text: 'Role' },
    { text: 'Date Created'}
];

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
        route("admin.admin-management.restore"),
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