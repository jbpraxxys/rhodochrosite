<template>
    <user-layout>
        <general-banner 
            :item="{
                image: '/temp/advantage1.png',
                title: 'Team Builder'
            }"
        />  
        <offset-banner 
            :item="{
                title: 'Be part of our team!',
                description: 'Join our growing pool of talented experts and take your career to the next level.'
            }"
        />
        <section class="relative bg-primary-50">
            <img 
                class="absolute top-0 left-0 w-full h-full z-1 object-cover" 
                src="/icons/grid.png" 
                alt="grid"
            >
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 relative z-[2] py-16">
                <div class="flex lg:flex-row flex-col items-center justify-between image-text">
                    <div class="w-full lg:w-7/12 mb-8 lg:mb-0 lg:order-2 lg:ml-20">
                        <div class="text-5xl font-bold mb-6 title reveal-type leading-tight" v-html="'Commitment to <strong>Quality</strong>'" />
                        <div class="text-xl animateUp" v-html="'Quality is at the forefront of everything we do. From project initiation to delivery, we uphold the highest standards to ensure maximum satisfaction.'" />
                        <div class="pt-6">
                            <v-button 
                                @click="showCalculatorModal = true" 
                                custom-class="h-14 px-6 !text-base animateUp" 
                                design-color="text-white"
                            >
                                Get Started
                            </v-button>
                        </div>
                    </div>
                    <div class="w-full lg:w-5/12 max-w-[540px] animateUp lg:order-1">
                        <img class="w-full" src="/temp/advantage2.png" alt="image">
                    </div>
                </div>
            </div>
        </section>

        <calculator-modal 
            :show="showCalculatorModal"
            @cancel="showCalculatorModal = false"
            maxWidth="calculator"
        />
    </user-layout>
</template>
<script setup lang="ts">
import { ref } from 'vue';

const showCalculatorModal = ref(false);


</script>