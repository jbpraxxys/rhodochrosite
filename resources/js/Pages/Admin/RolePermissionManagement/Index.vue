<template>
  <admin-layout title="Roles & Permissions" :breadcrumb-pages="breadcrumbs">
    <!-- Tabs -->
    <div>
      <tabs
        :tabs="tabs"
        :button-items="true"
        :active-tab="activeTab"
        @update:tab="(value) => (activeTab = value)"
        :tab-route="route('admin.role-permission-management.index')"
      >
        <template #buttons v-if="activeTab !== 'activity_logs'">
          <create-button :route="route('admin.role-permission-management.create')" />
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

    <DataTable
      :headers="headers"
      :no-action="noAction"
      :is-empty="items.data.length === 0"
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

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Tabs from "@/Components/Tabs.vue";
import TextInput from "@/Components/TextInput.vue";
import DataTable from "@/Components/DataTable.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import { computed, ref, watch } from "vue";
import {
  MagnifyingGlassIcon,
  TrashIcon,
  ArrowPathIcon,
  PlusIcon,
  XCircleIcon,
  PencilSquareIcon,
} from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import RestoreModal from "@/Components/RestoreModal.vue";
import DeleteModal from "@/Components/DeleteModal.vue";
import Pagination from "@/Components/Pagination.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import Filter from "@/Components/Filter.vue";
export default {
  components: {
    AdminLayout,
    RestoreModal,
    DeleteModal,
    Tabs,
    TextInput,
    DataTable,
    Pagination,
    Link,
    MagnifyingGlassIcon,
    TrashIcon,
    ArrowPathIcon,
    PlusIcon,
    Filter,
    EditButton,
    DeleteButton,
    RestoreButton,
    XCircleIcon,
    PencilSquareIcon,
  },
  props: ["items", "activeCount", "archivedCount", "selectedTab", "query"],
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
          route("admin.role-permission-management.index"),
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
    const breadcrumbs = [{ name: "Admin", href: "#", current: true }];

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

    /*---------------*
     * Restore Modal  *
     *---------------*/
    const showRestoreModal = ref(false);
    const restoreItemName = computed(() =>
      selectedItem.value ? `${selectedItem.value.name}` : ""
    );
    function selectRestore(item) {
      selectedItem.value = item;
      showRestoreModal.value = true;
    }
    function processRestore() {
      Inertia.post(
        route("admin.role-permission-management.restore"),
        { id: selectedItem.value.id },
        { preserveState: false }
      );
    }

    /*---------------*
     * Delete Modal  *
     *---------------*/
    const showDeleteModal = ref(false);
    const selectedItem = ref(null);
    const deleteItemName = computed(() =>
      selectedItem.value ? `${selectedItem.value.name}` : ""
    );
    function selectDelete(item) {
      selectedItem.value = item;
      showDeleteModal.value = true;
    }
    function processDelete() {
      Inertia.delete(
        route("admin.role-permission-management.delete", selectedItem.value.id),
        { preserveState: false }
      );
    }

    const headers = [
      { text: "#", value: "id" },
      { text: "Role Name", value: "roleName" },
      { text: "Date Created", value: "dateCreated" },
    ];

    return {
      breadcrumbs,
      // tabs
      tabs,
      activeTab,
      // Table
      items,
      searchText,
      // Delete Modal
      showDeleteModal,
      selectDelete,
      processDelete,
      deleteItemName,
      // Restore Modal
      showRestoreModal,
      selectRestore,
      processRestore,
      restoreItemName,
      // Table headers
      headers,
    };
  },
};
</script>
