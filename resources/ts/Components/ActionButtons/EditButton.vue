<template>
    <Link
        :href="routeLink"
        class="
            mx-1
            inline-flex
            items-center
            p-1
            rounded-xl
            hover:text-gray-700
            active:text-gray-700
            focus:outline-none focus:ring-1 focus:ring-offset-1 focus:ring-blue-500
        "
    >
        <EyeIcon class="p-0.5 h-6 w-6 text-gray-500" aria-hidden="true" />
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { EyeIcon } from "@heroicons/vue/24/outline";
const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
});
</script>
