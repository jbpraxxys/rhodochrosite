<template>
    <section class="bg-primary-900 relative z-[2]">
        <div class="max-w-[1440px] m-auto pt-20 px-20">
            <div class="text-center mb-20">
                <p class="text-5xl text-white font-bold mb-3">{{title}}</p>
                <p class="text-white text-lg">{{subTitle}}</p>
            </div>
            <div class="text-center">
                <div class="team-card" v-for="item in items">
                    <team-card 
                        :item="item"
                    />
                </div>
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
    defineProps({
        items: {
            type: Object,
            default: () => ({})
        },
        title: {
            type: String
        },
        subTitle: {
            type: String
        },
    })
</script>