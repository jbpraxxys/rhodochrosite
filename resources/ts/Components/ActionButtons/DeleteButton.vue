<template>
    <button
        @click="$emit('click')"
        class="
            mx-1
            inline-flex
            items-center
            p-1
            border border-transparent
            rounded-xl
            text-gray-500
            hover:text-gray-700
            active:text-gray-700
            focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-400
        "
    >
        <TrashIcon class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
    </button>
</template>

<script setup lang="ts">
import { TrashIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    // 
});
</script>
