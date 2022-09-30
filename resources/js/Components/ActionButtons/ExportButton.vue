<template>
  <jet-button type="button" secondary @click="action">
    <DownloadIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
    Export
  </jet-button>
</template>

<script>
import { DownloadIcon } from "@heroicons/vue/24/solid";
import JetButton from "@/Jetstream/Button.vue";

export default {
  components: {
    DownloadIcon,
    JetButton,
  },
  props: {
    route: {
      type: String,
      required: true,
    },
  },
  setup(props, { emit }) {
    function action() {
      window.open(props.route, "_blank");

      emit("click");
    }

    return {
      action,
    };
  },
};
</script>
