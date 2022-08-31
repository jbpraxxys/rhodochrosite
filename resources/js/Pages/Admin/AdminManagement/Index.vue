<template>
  <admin-layout title="Admin Management" :breadcrumb-pages="breadcrumbs">
    <!-- Tabs -->
    <div>
      <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select
          id="tabs"
          name="tabs"
          class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-smi rounded-md"
        >
          <option
            v-for="tab in tabs"
            :key="tab.name"
            :selected="isSelectedTab(tab.value)"
          >
            {{ tab.name }}
          </option>
        </select>
      </div>
      <div class="hidden sm:block">
        <div class="border-b border-gray-200 flex justify-between">
          <nav class="-mb-px flex space-x-2 px-7" aria-label="Tabs">
            <Link
              v-for="tab in tabs"
              :key="tab.name"
              @click.prevent="selectTab(tab.value)"
              :class="[
                isSelectedTab(tab.value)
                  ? 'border-yellow-400 text-yellow-400'
                  : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200',
                'whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm',
              ]"
              :aria-current="tab.current ? 'page' : undefined"
            >
              {{ tab.name }}
              <span
                v-if="tab.count"
                :class="[
                  isSelectedTab(tab.value)
                    ? 'bg-yellow-100 text-yellow-500'
                    : 'bg-gray-100 text-gray-900',
                  'hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block',
                ]"
                >{{ tab.count }}</span
              >
            </Link>
          </nav>
          <div class="px-7 flex items-center">
            <!-- Sidebar Search -->
            <div class="px-3">
              <label for="search" class="sr-only">Search</label>
              <div class="relative rounded-md shadow-sm">
                <div
                  class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                  aria-hidden="true"
                >
                  <MagnifyingGlassIcon
                    class="mr-3 h-4 w-4 text-gray-400"
                    aria-hidden="true"
                  />
                </div>
                <input
                  v-model="searchText"
                  type="text"
                  name="search"
                  id="search"
                  class="focus:ring-yellow-300 focus:border-yellow-300 block w-full pl-9 sm:text-sm border-gray-300 rounded-md"
                  placeholder="Search"
                />
                <button
                  v-if="searchText"
                  @click="searchText = ''"
                  class="absolute inset-y-0 right-0 pr-3 flex items-center z-10"
                >
                  <XCircleIcon
                    class="h-5 w-5 text-gray-400"
                    aria-hidden="true"
                  />
                </button>
              </div>
            </div>
            <Link
              :href="route('admin.admin-management.create')"
              as="button"
              type="button"
              class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow text-gray-800 bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300"
            >
              <UserPlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
              Create
            </Link>
            <Link
              :href="
                route('admin.admin-management.export', {
                  query: searchText,
                })
              "
              as="button"
              type="button"
              class="inline-flex items-center ml-2 px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow text-gray-800 bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300"
            >
              <ArrowDownTrayIcon
                class="-ml-0.5 mr-2 h-4 w-4"
                aria-hidden="true"
              />
              Export
            </Link>
            <button
              @click="importModal"
              as="button"
              type="button"
              class="inline-flex items-center ml-2 px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow text-gray-800 bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300"
            >
              <ArrowUpTrayIcon
                class="-ml-0.5 mr-2 h-4 w-4"
                aria-hidden="true"
              />
              Import
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
          <div
            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
          >
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Name
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Title
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Status
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Role
                  </th>
                  <th
                    scope="col"
                    class="relative px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="admin in items.data" :key="admin.email">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img
                          class="h-10 w-10 rounded-full object-cover"
                          :src="admin.profile_photo_url"
                          alt=""
                        />
                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ admin.name }}
                        </div>
                        <div class="text-sm text-gray-500">
                          {{ admin.email }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ admin.title }}
                    </div>
                    <div class="text-sm text-gray-500">
                      {{ admin.department.name }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                    >
                      Active
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ "None" }}
                  </td>
                  <td
                    class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                  >
                    <!-- Edit Button -->
                    <Link
                      v-if="selected_tab !== 'archived'"
                      :href="route('admin.admin-management.edit', admin.id)"
                      class="mx-1 inline-flex items-center p-1 border border-transparent rounded-full shadow text-gray-700 bg-yellow-300 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300"
                    >
                      <PencilSquareIcon
                        class="p-0.5 h-5 w-5"
                        aria-hidden="true"
                      />
                    </Link>
                    <!-- Delete Button -->
                    <button
                      v-if="selected_tab !== 'archived'"
                      @click="selectDelete(admin)"
                      class="mx-1 inline-flex items-center p-1 border border-transparent rounded-full shadow text-gray-700 bg-red-400 hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                    >
                      <TrashIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
                    </button>

                    <!-- Restore Button -->
                    <button
                      v-if="selected_tab === 'archived'"
                      @click="
                        $inertia.post(
                          route('admin.admin-management.restore'),
                          { id: admin.id },
                          { preserveState: false }
                        )
                      "
                      class="mx-1 inline-flex items-center p-1 border border-transparent rounded-full shadow text-gray-700 bg-green-300 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300"
                    >
                      <ArrowPathIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p
            v-if="items.data.length === 0"
            class="text-sm text-gray-600 text-center py-8"
          >
            No data to display.
          </p>
        </div>
      </div>
    </div>
    <pagination class="mt-6" :items="items" />
    <delete-modal
      title="Archive Admin"
      :show="showDeleteModal"
      :item-name="deleteItemName"
      @confirm="processDelete"
      @cancel="showDeleteModal = false"
    ></delete-modal>

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
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import DeleteModal from "@/Components/DeleteModal.vue";
import Pagination from "@/Components/Pagination.vue";
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
  },
  props: [
    "items",
    "archived",
    "active_count",
    "archived_count",
    "selected_tab",
    "query",
  ],
  setup(props) {
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
          pickBy({ query: val, tab: props.selected_tab }), // removes falsey values
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
        count: props.active_count,
      },
      {
        name: "Archived",
        value: "archived",
        count: props.archived_count,
      },
    ];

    function isSelectedTab(value) {
      return props.selected_tab === value;
    }
    function selectTab(value) {
      Inertia.get(
        route("admin.admin-management.index"),
        pickBy({ tab: value }), // removes falsey values
        {
          preserveState: false,
        }
      );
    }

    /*---------------*
     * Delete Modal  *
     *---------------*/
    const showDeleteModal = ref(false);
    const selectedItem = ref(null);
    const deleteItemName = computed(() =>
      selectedItem.value
        ? `${selectedItem.value.first_name} ${selectedItem.value.last_name}`
        : ""
    );
    function selectDelete(item) {
      selectedItem.value = item;
      showDeleteModal.value = true;
    }
    function processDelete() {
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
      selectTab,
      isSelectedTab,
      // Table
      items,
      searchText,
      // Delete Modal
      showDeleteModal,
      selectDelete,
      processDelete,
      deleteItemName,
      // Import
      showModal,
      importFile,
      importModal,
      importData,
    };
  },
};
</script>
