<template>
  <div class="flex items-center justify-between px-8 mt-4">
    <div class="flex">
      <selector
        placeholder="Filter by Status"
        :options="events"
        :modelValue="filterEvent"
        @update:modelValue="(newValue) => (filterEvent = newValue)"
        id="selector-id"
        name="selector-name"
        class="w-[180px] mr-2"
      ></selector>
    </div>
    <TextInput
      :lead-icon="'/images/icons/ic-search.svg'"
      type="text"
      name="input"
      id="input"
      placeholder="Search"
      v-model="searchText"
    />
  </div>

  <div class="mt-4 px-8">
    <DataTable :headers="headers" :no-action="true">
      <template v-slot:body>
        <template v-for="log in logs.data" :key="log.id">
          <tr class="text-center border-l border-dark-200">
            <td class="p-2 text-sm border-l border-b border-dark-200">
              {{ log.id }}
            </td>
            <td class="p-2 text-sm border-l border-b border-dark-200">
              {{ log.log_name }}
            </td>
            <td class="p-2 text-sm border-l border-b border-dark-200">
              {{ log.description }}
            </td>
            <td class="p-2 text-sm border-l border-b border-dark-200">
              {{ log.causer_name }}
            </td>
            <td class="p-2 text-sm border-l border-b border-dark-200">
              {{ log.created_at }}
            </td>
          </tr>
        </template>
      </template>
    </DataTable>
  </div>

  <pagination class="mb-4" :items="logs" />
</template>
<script>
import TextInput from "@/Components/TextInput.vue";
import Selector from "@/Components/Selector.vue";
import DataTable from "@/Components/DataTable.vue";
import Pagination from "@/Components/Pagination.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { Inertia } from "@inertiajs/inertia";
import { computed, ref, watch } from "vue";

export default {
  components: {
    TextInput,
    Selector,
    DataTable,
    Pagination,
  },
  props: {
    logs: {
      type: Object,
      default: {},
    },
    resultRoute: {
      type: String,
      default: "",
    },
    tab: {
      type: String,
      default: "",
    },
    query: {
      type: String,
      default: "",
    },
    event: {
      type: String,
      default: "",
    },
  },
  setup(props) {
    const logs = computed(() => props.logs);

    const headers = [
      { text: "#", value: "id" },
      { text: "Log Name", value: "logName" },
      { text: "Description", value: "description" },
      { text: "Caused By", value: "causedBy" },
      { text: "Date Received", value: "dateReceived" },
    ];

    /*--------------*
     * Table Search
     *--------------*/
    const filterEvent = ref(props.event);
    watch(
      filterEvent,
      throttle((val) => {
        Inertia.get(
          props.resultRoute,
          pickBy({
            log_event: val,
            log_query: props.query,
            tab: props.tab,
          }), // removes falsey values
          {
            preserveState: true,
          }
        );
      })
    );

    const searchText = ref(props.query);
    watch(
      searchText,
      throttle((val) => {
        Inertia.get(
          props.resultRoute,
          pickBy({
            log_event: props.event,
            log_query: val,
            tab: props.tab,
          }), // removes falsey values
          {
            preserveState: true,
          }
        );
      }, 1000)
    );

    const events = [
      { id: "created", value: "Created" },
      { id: "updated", value: "Updated" },
      { id: "deleted", value: "Deleted" },
      { id: "restored", value: "Restored" },
    ];

    return {
      logs,
      headers,
      searchText,
      filterEvent,
      events,
    };
  },
};
</script>
