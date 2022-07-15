<template>
  <button
    @click="$emit('click')"
    class="
      mx-1
      inline-flex
      items-center
      p-1
      border border-transparent
      rounded-full
      text-primary
      hover:text-red-400
      focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-400
    "
  >
    <TrashIcon class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
  </button>
</template>

<script>
// import { Link } from "@inertiajs/inertia-vue3";
import { TrashIcon } from "@heroicons/vue/outline";

export default {
  components: {
    // Link,
    TrashIcon,
  },
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
};
</script>
