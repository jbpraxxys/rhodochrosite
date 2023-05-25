<template>
  <admin-layout title="Activity Logs" :breadcrumb-pages="breadcrumbs">
    <activity-logs
      :logs="logs"
      :result-route="route('admin.activity-logs.index')"
      :query="searchText"
      :event="filterEvent"
    />
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { computed, ref, watch } from "vue";
import ActivityLogs from "@/Components/Partials/ActivityLogs.vue";

export default {
  components: {
    AdminLayout,
    ActivityLogs,
  },
  props: ["logs", "selectedEvent", "logQuery"],
  setup(props) {
    /*---------------*
     * Breadcrumbs
     *---------------*/
    const breadcrumbs = [{ name: "Admin", href: "#", current: true }];

    /*--------------*
     * Activity Logs
     *--------------*/
    const filterEvent = ref(props.selectedEvent);
    const searchText = ref(props.logQuery);
    const logs = computed(() => props.logs);

    return {
      breadcrumbs,
      logs,
      filterEvent,
      searchText,
    };
  },
};
</script>
