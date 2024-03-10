<template>
    <section class="bg-primary-50">
        <div class="flex items-center px-20 space-x-20 py-10 max-w-[1440px] m-auto relative">
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
            <img 
                class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-1/2"
                src="/icons/ph-design.svg" 
                alt="design"
            >
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