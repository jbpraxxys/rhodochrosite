<template>
    <div class="flex items-center space-x-4 mb-3">
        <div v-for="(page, index) in pages" :key="page.name">
            <div class="flex items-center">
                <ChevronRightIcon
                    v-if="parseInt(index) != 0"
                    class="flex-shrink-0 h-4 w-4 mr-4 text-primary-600"
                    aria-hidden="true"
                />
                <Link
                    :href="page.href"
                    class="text-sm text-gray-500 hover:text-gray-700"
                    :aria-current="page.current ? 'page' : undefined"
                    >{{ page.name }}
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ChevronRightIcon, HomeIcon } from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/vue3";

defineProps({
    pages: {
        type: Object,
    },
})
</script>
