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
            text-primary
            shadow-[0_0_4px_0px_rgb(17,24,39,0.25)]
            bg-red-600
            hover:bg-red-500
            active:bg-red-700
            focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-red-400
        "
    >
        <TrashIcon class="p-0.5 h-6 w-6 text-white" aria-hidden="true" />
    </button>
</template>

<script setup lang="ts">
import { TrashIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    // 
});
</script>
