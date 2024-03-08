<template>
    <section class="bg-primary-50 py-10 relative">
        <img 
            class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2"
            src="/icons/ph-design.svg" 
            alt="design"
        >
        <div class="flex items-center px-20 space-x-20">
            <div class="w-[calc(100%-620px)] image-text">
                <div class="text-5xl font-bold mb-6 title animateUp" v-html="item.title" />
                <div class="text-xl animateUp" v-html="item.description" />
            </div>
            <div class="w-[540px]">
                <img 
                    class="w-full banner-image" 
                    :src="item.image" 
                    alt="map"
                >
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>