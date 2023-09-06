<template>
    <div class="">
        <div class="flex items-center space-x-3 mb-6">
            <img 
            class="flex-shrink-0"
            src="/icons/logo.svg" 
            alt="logo">
            <div class="w-full">
                <p class="text-sm font-semibold text-primary-600">One Roadway</p>
                <p class="text-sm font-semibold text-gray-400">Trucking Services, Inc.</p>
            </div>
        </div>
        <p class="text-2xl font-black" v-if="title">{{ title }}</p>
        <p class="text-sm text-gray-500 mb-6" v-if="description">{{ description }}</p>
        
        <slot />
    </div>
</template>


<script setup lang="ts">
defineProps({
    title: {
        type: String
    },
    description: {
        type: String
    }
})
</script>