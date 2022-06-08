<template>
  <admin-layout title="Roles & Permissions" :breadcrumb-pages="breadcrumbs">
    <tabs
      :tabs="tabs"
      :button-items="true"
      :input-items="true"
      :active-tab="activeTab"
      :page-route="route('admin.role-permission-management.index')"
    >
      <template #inputs>
        <label for="search" class="sr-only">Search</label>
        <div class="relative rounded-md shadow-sm">
          <div
            class="
              absolute
              inset-y-0
              left-0
              pl-3
              flex
              items-center
              pointer-events-none
            "
            aria-hidden="true"
          >
            <SearchIcon class="mr-3 h-4 w-4 text-gray-400" aria-hidden="true" />
          </div>
          <input
            v-model="searchText"
            type="text"
            name="search"
            id="search"
            class="
              focus:ring-yellow-300 focus:border-yellow-300
              block
              w-full
              pl-9
              sm:text-sm
              border-gray-300
              rounded-md
            "
            placeholder="Search"
          />
          <button
            v-if="searchText"
            @click="searchText = ''"
            class="absolute inset-y-0 right-0 pr-3 flex items-center z-10"
          >
            <XIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
          </button>
        </div>
      </template>

      <template #buttons>
        <Link
          :href="route('admin.role-permission-management.create')"
          as="button"
          type="button"
          class="
            inline-flex
            items-center
            px-3
            py-1.5
            border border-transparent
            text-xs
            font-medium
            rounded-full
            shadow
            text-gray-800
            bg-yellow-300
            hover:bg-yellow-200
            focus:outline-none
            focus:ring-2
            focus:ring-offset-2
            focus:ring-yellow-300
          "
        >
          <PlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
          Create
        </Link>
      </template>
    </tabs>

    <DataTable
      :headers="headers"
      :no-action="noAction"
      :empty="items.data.length === 0"
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
                <Link
                  :href="
                    route('admin.role-permission-management.edit', role.id)
                  "
                  class="
                    mx-1
                    inline-flex
                    items-center
                    p-1
                    border border-transparent
                    rounded-full
                    shadow
                    text-gray-700
                    bg-yellow-300
                    hover:bg-yellow-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-yellow-300
                  "
                >
                  <PencilAltIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
                </Link>
                <button
                  @click="selectDelete(role)"
                  class="
                    mx-1
                    inline-flex
                    items-center
                    p-1
                    border border-transparent
                    rounded-full
                    shadow
                    text-gray-700
                    bg-red-400
                    hover:bg-red-300
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-red-400
                  "
                >
                  <TrashIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
                </button>
              </template>

              <button
                class="
                  mx-1
                  inline-flex
                  items-center
                  p-1
                  border border-transparent
                  rounded-full
                  shadow
                  text-gray-700
                  bg-green-300
                  hover:bg-green-200
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-green-300
                "
                v-if="activeTab === 'archived'"
                @click="selectRestore(role)"
              >
                <RefreshIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
              </button>
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
import { computed, ref, watch } from "vue";
import {
  SearchIcon,
  TrashIcon,
  RefreshIcon,
  PlusIcon,
  XIcon,
  PencilAltIcon,
} from "@heroicons/vue/solid";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import RestoreModal from "@/Components/RestoreModal.vue";
import DeleteModal from "@/Components/DeleteModal.vue";
import Pagination from "@/Components/Pagination.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

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
    SearchIcon,
    TrashIcon,
    RefreshIcon,
    PlusIcon,
    XIcon,
    PencilAltIcon,
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
