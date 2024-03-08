<template>
    <section class="bg-primary-900">
        <div class="max-w-[1440px] m-auto pl-32 pr-20 py-[100px] flex items-center justify-between">
            <img 
                class="max-w-[300px] banner-image" 
                :src="item.image" 
                alt="banner-image"
            >
            <div class="max-w-[755px] w-full">
                <h1 class="font-bold text-white mb-8" v-html="item.title" />
                <v-button>
                    Inquire Now
                </v-button>
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