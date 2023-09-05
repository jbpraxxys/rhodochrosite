<template>
    <div class="py-8 px-12 flex items-center justify-between border-b">
        <div>
            <Breadcrumbs :pages="pages"/>
            <h3 class="font-black text-3xl mt-3">{{ title }}</h3>
        </div>

        <div class="flex items-center">
            <slot name="buttons" />
        </div>
    </div>
</template>

<script setup lang="ts">
import Breadcrumbs from "@/Components/Partials/Breadcrumbs.vue";

defineProps({
    pages: {
        type: Object,
    },
    title: {
        type: String
    }
})
</script>