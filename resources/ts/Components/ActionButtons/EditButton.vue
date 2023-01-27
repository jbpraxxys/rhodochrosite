<template>
  <Link
    :href="route"
    class="
      mx-1
      inline-flex
      items-center
      p-1
      border border-transparent
      rounded-full
      text-primary
      hover:text-blue-400
      focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500
    "
  >
    <EyeIcon class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
  </Link>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import { EyeIcon } from "@heroicons/vue/24/outline";

export default {
  components: {
    Link,
    EyeIcon,
  },
  props: {
    route: {
      type: String,
      required: true,
    },
  },
};
</script>
