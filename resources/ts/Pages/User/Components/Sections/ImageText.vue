<template>
    <div class="flex items-center justify-between image-text">
        <div class="w-7/12 " :class="item.imageFirst ? 'order-2 ml-20' : 'mr-20'">
            <div class="text-5xl font-bold mb-6 title animateUp" v-html="item.title" />
            <div class="text-xl animateUp" v-html="item.description" />
        </div>
        <div class="w-5/12 max-w-[540px]" :class="item.imageFirst ? 'order-1' : ''">
            <img class="w-full" :src="item.image" alt="image">
        </div>
    </div>
</template>
<script lang="ts" setup>
defineProps({
    item: {
        type: Object,
        default: () => ({})
    },
})
</script>