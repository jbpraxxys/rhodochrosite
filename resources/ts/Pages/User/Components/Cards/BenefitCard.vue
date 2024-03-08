<template>
    <div class="p-8 bg-white rounded-2xl text-left flex flex-col group/benefit hover:bg-primary-500 transition">
        <div class="flex items-center mb-6 mr-auto">
            <p class="text-xl font-bold group-hover/benefit:text-white transition">{{  item.title }}</p>
            <div class="w-14 h-14 bg-primary-700 rounded-full flex items-center justify-center mr-4">
                <img 
                    class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                    :src="item.icon" 
                    alt="icon"
                >
            </div>
        </div>
        <div class="leading-5 group-hover/benefit:text-white transition" v-html="item.description" />
    </div>
</template>
<script lang="ts" setup>
defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>