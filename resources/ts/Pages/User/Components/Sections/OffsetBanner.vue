<template>
    <section class="bg-primary-50">
            <div class="max-w-[1440px] m-auto px-20">
                <div class="flex space-x-10 p-12 bg-white rounded-2xl -translate-y-16 relative z-[2]">
                    <div class="w-5/12 font-bold" v-html="item.title"/>
                    <div class="w-7/12" v-html="item.description" />
                </div>
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