<template>
    <Link
        :href="routeLink"
        class="
            mx-1
            inline-flex
            items-center
            p-1
            border border-transparent
            rounded-xl
            text-primary
            shadow-[0_0_4px_0px_rgb(17,24,39,0.25)]
            bg-blue-600
            hover:bg-blue-500
            active:bg-blue-700
            focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500
        "
    >
        <EyeIcon class="p-0.5 h-6 w-6 text-white" aria-hidden="true" />
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { EyeIcon } from "@heroicons/vue/24/solid";
const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
});
</script>
