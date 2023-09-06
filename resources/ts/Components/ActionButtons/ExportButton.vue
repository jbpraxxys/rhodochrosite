<template>
    <jet-button type="button" import_export @click="action">
        <ArrowDownTrayIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
        Export
    </jet-button>
</template>

<script setup lang="ts">
import JetButton from "@/Components/ActionButtons/JetButton.vue";
import { ArrowDownTrayIcon } from "@heroicons/vue/24/solid";

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
