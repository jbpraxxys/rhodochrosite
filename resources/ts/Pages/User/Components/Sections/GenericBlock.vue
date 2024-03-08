<template>
    <section>
        <div class="max-w-[1440px] m-auto px-20">
            <image-text 
                :item="item"
            />
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