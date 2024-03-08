<template>
    <section class="relative z-1">
        <img 
            class="absolute bottom-0 left-0 -translate-x-[50%] z-1"
            src="/icons/contact-bg.svg" 
            alt="contact"
        >
        <div class="max-w-[1440px] m-auto relative z-[2]">
            <contact-form />
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