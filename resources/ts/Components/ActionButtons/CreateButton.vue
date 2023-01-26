<template>
  <Link
    class="
      inline-flex
      items-center
      px-4
      py-2.5
      border-0
      rounded-md
      font-semibold
      text-sm
      transition
      ring-0
      focus:outline-none focus:border-0 focus:ring-0
      disabled:opacity-25
      bg-primary-500
      hover:bg-primary-600
      active:bg-primary-400
      text-white
    "
    :href="route"
  >
    <PlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
    {{ text }}
  </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { PlusIcon } from "@heroicons/vue/24/solid";

export default {
  components: {
    Link,
    PlusIcon,
  },
  props: {
    route: {
      type: String,
      required: true,
    },
    text: {
      type: String,
      default: "Create",
    },
  },
};
</script>
