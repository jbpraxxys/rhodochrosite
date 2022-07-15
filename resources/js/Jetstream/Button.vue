<template>
  <button
    :type="type"
    class="
      inline-flex
      items-center
      px-4
      py-2.5
      border
      ring-0
      rounded-md
      font-semibold
      text-sm
      transition
    "
    :class="
      secondary
        ? 'bg-white border-gray-300 text-primary-500 hover:text-primary-600 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 '
        : 'border-primary-500 focus:outline-none focus:border-gray-900 focus:outline-none focus:border-primary-400 disabled:opacity-25 bg-primary-500 hover:bg-primary-600 active:bg-primary-400 text-white'
    "
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: "submit",
    },
    secondary: {
      type: Boolean,
      default: false,
    },
  },
};
</script>
