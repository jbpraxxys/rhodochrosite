<template>
    <section>
        <div class="max-w-[1440px] m-auto px-20">
            <div class="grid grid-cols-3 gap-6">
                <specialty-card
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