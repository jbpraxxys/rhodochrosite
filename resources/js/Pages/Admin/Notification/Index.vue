<template>
  <admin-layout title="Notifications">
    <tabs
      :tabs="tabs"
      :input-items="true"
      :button-items="true"
      :active-tab="activeTab"
      @update:activeTab="(newValue) => (activeTab = newValue)"
      :page-route="route('admin.notification.index')"
    >
      <template #inputs>
        <div class="flex items-center justify-end gap-4">
          <Datepicker
            v-model="date"
            :enableTimePicker="false"
            class="form__date-picker"
            placeholder="Filter by Date"
          ></Datepicker>
        </div>
      </template>

      <template #buttons>
        <button
          @click="refresh"
          type="button"
          class="
            inline-flex
            items-center
            px-3
            py-1.5
            mr-3
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
          <ArrowPathIcon class="h-4 w-4" aria-hidden="true" />
        </button>
        <button
          @click="markAllRead"
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
          v-show="!activeTab"
        >
          <EnvelopeOpenIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
          Mark all as read
        </button>
      </template>
    </tabs>

    <DataTable
      :headers="headers"
      :no-action="noAction"
      :is-empty="notifications.data.length === 0"
    >
      <template v-slot:body>
        <template
          v-for="notification in notifications.data"
          :key="notification.id"
        >
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">
                {{ notification.id }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">
                {{ notification.data.title }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-500">
                {{ notification.data.message }}
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">
                {{ notification.created_at }}
              </div>
            </td>
            <td
              v-if="!noAction"
              class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
            >
              <Link
                :href="route('admin.notification.show', notification.id)"
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
                <EyeIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
              </Link>
            </td>
          </tr>
        </template>
      </template>
    </DataTable>
  </admin-layout>
</template>
<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DataTable from "@/Components/DataTable.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Tabs from "@/Components/Tabs.vue";
import { ArrowPathIcon, EnvelopeOpenIcon, EyeIcon } from "@heroicons/vue/24/solid";
import Datepicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import pickBy from "lodash/pickBy";
import Pagination from "@/Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch } from "vue";
import throttle from "lodash/throttle";

export default {
  components: {
    AdminLayout,
    DataTable,
    Link,
    Tabs,
    EyeIcon,
    ArrowPathIcon,
    EnvelopeOpenIcon,
    Datepicker,
    Pagination,
  },
  props: [
    "notifications",
    "selected_tab",
    "date",
    "unread_count",
    "read_count",
  ],
  setup(props) {
    const headers = [
      { text: "#", value: "id" },
      { text: "Title", value: "title" },
      { text: "Message", value: "message" },
      { text: "Date", value: "date" },
    ];

    const notifications = ref(props.notifications);
    const activeTab = ref(props.selected_tab);

    const tabs = [
      {
        name: "Unread",
        href: "#",
        value: null,
        count: props.unread_count,
      },
      {
        name: "Read",
        href: "#",
        value: "read",
        count: props.read_count,
      },
    ];

    const date = ref(props.date);
    watch(
      date,
      throttle((val) => {
        Inertia.get(
          route("admin.notification.index"),
          pickBy({
            date: val,
            tab: props.selected_tab,
          }), // removes falsey values
          {
            preserveState: false,
          }
        );
      })
    );

    function isSelectedTab(value) {
      return props.selected_tab === value;
    }
    function selectTab(tab) {
      if (!isSelectedTab(tab.value)) {
        activeTab.value = tab.value;

        Inertia.get(
          route("admin.notification.index"),
          pickBy({ tab: tab.value }), // removes falsey values
          {
            preserveState: false,
          }
        );
      }
    }

    function markAllRead() {
      Inertia.patch(
        route("admin.notification.read-all"),
        {},
        {
          preserveState: false,
        }
      );
    }

    function refresh() {
      Inertia.get(
        route("admin.notification.index"),
        pickBy({
          date: props.date,
          tab: props.selected_tab,
        }), // removes falsey values
        {
          preserveState: false,
        }
      );
    }

    return {
      date,
      headers,
      notifications,
      tabs,
      activeTab,
      selectTab,
      markAllRead,
      refresh,
    };
  },
};
</script>
