<template>
    <div>
        <a :href="item.link">
            <div class="flex space-x-4 cursor-pointer hover:text-primary-500 transition">
                <div class="w-[calc(100%-279px)]">
                    <div class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden">
                        <img 
                            class="w-full h-full object-cover" 
                            :src="item.image" 
                            alt="placeholder"
                        >
                    </div>
                </div>
                <div class="w-[263px]">
                    <p class="text-xl font-semibold line-clamp-4 mb-4 leading-8">{{item.title}}</p>
                    <p class="text-sm text-neutral-600">{{item.date}} • {{item.articleType}}</p>
                </div>
            </div>
        </a>
    </div>
</template>
<script setup lang="ts">
const props = defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})
</script>