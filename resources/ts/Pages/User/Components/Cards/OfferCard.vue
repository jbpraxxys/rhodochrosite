<template>
    <div 
        class="p-8 rounded-2xl h-[358px] overflow-hidden relative group/offer hover:-translate-y-3 transition hover:shadow-lg duration-500"
        :class="item.accent ? 'bg-primary-500 text-white' : 'bg-white'"
    >
        <div class="w-[80%]">
            <p class="mb-2 font-bold text-lg">{{ item.title }}</p>
            <div v-html="item.description" />
        </div>
        <img 
            class="w-[152px] absolute bottom-0 right-0 transition duration-500 group-hover/offer:scale-110" 
            :src="item.image" 
            alt="icon"
        >
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