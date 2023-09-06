<template>
    <Link
        class="
            inline-flex
            items-center
            px-4
            py-3
            border-0
            rounded-xl
            text-sm
            transition
            ring-0
            focus:outline-none focus:border-0 focus:ring-0
            disabled:opacity-25
            bg-primary-800
            hover:bg-primary-700
            active:bg-primary-900
            text-white
        "
        :href="routeLink"
    >
        {{ text }}
        <PlusIcon class="-mr-0.5 ml-2 h-4 w-4" aria-hidden="true" />
    </Link>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
import { PlusIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    routeLink: {
        type: String,
        required: true,
    },
    text: {
        type: String,
        default: "Create",
    },
});
</script>
