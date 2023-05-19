<template>
    <jet-button type="button" secondary @click="action">
        <ArrowUpTrayIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
        Import
    </jet-button>
</template>

<script setup lang="ts">
import { ArrowUpTrayIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
});

const emit = defineEmits(['click'])

const action = () => {
    window.open(props.routeLink, "_blank");
    emit("click");
}
</script>
