<template>
    <button
        :type="type"
        class="
            inline-flex
            items-center
            px-4
            py-3
            border
            ring-0
            rounded-xl
            text-sm
            transition
        "
        :class="
            secondary
                ? 'bg-white border-gray-300 text-primary-800 hover:text-primary-700 focus:outline-none active:text-gray-800 active:bg-gray-50 disabled:opacity-25 '
                : 'border-primary-800 focus:outline-none focus:border-gray-900 focus:outline-none focus:border-primary-900 disabled:opacity-25 bg-primary-800 hover:bg-primary-700 active:bg-primary-900 text-white'
        "
    >
        <slot></slot>
    </button>
</template>

<script setup lang="ts">
const props = defineProps({
    type: {
        type: String,
        default: "submit",
    },
    secondary: {
        type: Boolean,
        default: false,
    },
});
</script>
