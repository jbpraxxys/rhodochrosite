<template>
    <div class="text-center values-card">
        <div class="img-cntnr">
            <img 
                class="w-24 m-auto mb-6 values-image scaleUp"
                :src="item.image" 
                alt="icon"
            >
        </div>
        <p class="font-bold text-xl mb-2">{{ item.title }}</p>
        <p>{{ item.description }}</p>
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