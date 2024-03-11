<template>
    <section class="bg-primary-900">
        <div class="max-w-[1440px] m-auto px-4 pt-[100px] pb-[265px] lg:pl-32 lg:pr-20 lg:py-[100px] flex lg:flex-row flex-col items-center justify-between">
            <img 
                class="lg:max-w-[300px] banner-image" 
                :src="item.image" 
                alt="banner-image"
            >
            <div class="max-w-[755px] w-full text-banner">
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