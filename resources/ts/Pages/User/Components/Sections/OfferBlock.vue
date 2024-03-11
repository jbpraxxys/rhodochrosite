<template>
    <section class="bg-primary-50">
        <div class="max-w-[1440px] m-auto px-20 pb-20">
            <div class="grid grid-cols-2 gap-8">
                <offer-card 
                    class="animateUp"
                    v-for="item in items"
                    :item="item"
                />
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
defineProps({
    items: {
        type: Object,
        default: () => ({})
    }
})
</script>