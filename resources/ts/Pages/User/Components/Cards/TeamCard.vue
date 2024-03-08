<template>
    <div class="w-full aspect-w-[392] aspect-h-[504] bg-primary-500/[0.08] rounded-xl overflow-hidden relative member-card">
        <div class="w-40 h-40 absolute top-8 left-8">
            <img 
                class="w-full h-full object-cover team-iso" 
                :src="item.bg" 
                alt="iso"
            >
        </div>
        <div class="px-3 py-8">
            <img 
                class="w-full h-full object-cover team-img" 
                :src="item.image" 
                alt="member"
            >
        </div>
        <div class="absolute w-full flex items-center justify-between bg-primary-500 p-4 bottom-0 top-auto left-0 h-fit">
            <div class="text-white">
                <p class="text-2xl font-bold">{{ item.name }}</p>
                <p class="font-semibold">{{ item.position }}</p>
            </div>
            <div>
                <a :href="item.linkedin">
                    <img src="/temp/linkedin-icon.svg" alt="icon">
                </a>
            </div>
        </div>
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