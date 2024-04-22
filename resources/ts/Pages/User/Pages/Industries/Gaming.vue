<template>
    <user-layout custom-class="gaming">
        <div class="spacer h-[100px]"></div>
        <section class="relative">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[250px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[70vw]">
                    <img 
                        class="-translate-x-16 mb-4 animateUp"
                        :src="$page.props.storage_url + cms?.section1_header" 
                        alt="game"
                    >
                    <div class="max-w-[566px] mb-8 lg:mb-12 animateUp">
                        <h1 class="text-base">{{cms?.section1_content}}</h1>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
            <img 
                class="absolute bottom-0 w-full"
                :src="$page.props.storage_url + cms?.section1_footer" 
                alt="footer"
            >
        </section>
        {{ title }}
        <section class="bg-[#11CEBB] relative gaming-frame2">
            <div class="max-w-[1440px] m-auto px-20 flex items-center space-x-20 py-20 w-full">
                <div class="w-[540px] fadeIn">
                    <img 
                        class="w-full"
                        :src="$page.props.storage_url + cms?.section2_image" 
                        alt="iceberg"
                    >
                </div>
                <div class="w-[calc(100%-620px)]">
                    <div class="text-white text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-4 animateUp" v-html="cms?.section2_header"></div>
                    <p class="text-white animateUp">{{cms?.section2_content}}</p>
                </div>
            </div>
        </section>
        <section class="relative">
            <div class="max-w-[1440px] m-auto px-20 pt-20 pb-[154px]">
                <div class="grid grid-cols-6 gap-10 w-full">
                    <div class="col-span-2 flex items-center">
                        <div class="text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-10 fadeIn" v-html="cms?.section3_header"></div>
                    </div>
                    <div 
                        v-for="solution in cms?.section3_items" 
                        class="p-8 rounded-lg bg-[#2D4959] text-white space-y-2.5 flex flex-col justify-end animateUp" 
                        :class="solution?.custom"
                    >
                        <div class="w-24 h-24 relative">
                            <img
                                class="w-full h-full object-contain" 
                                :src="$page.props.storage_url + solution?.logo" 
                                alt="icon"
                            >
                        </div>
                        <p class="font-semibold text-2xl">{{ solution?.title }}</p>
                        <p>{{ solution?.content }}</p>
                    </div>
                </div>
            </div>
            <img 
                class="absolute bottom-0 w-full"
                :src="$page.props.storage_url + cms?.section3_footer" 
                alt="footer"
            >
        </section>
        <section class="bg-[#11CEBB]">
            <div class="max-w-[1440px] m-auto px-20 py-20 flex space-x-20">
                <div class="w-1/2">
                    <div class="text-white text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-12 reveal-type" v-html="cms?.section4_header"></div>
                    <div class="space-y-4">
                        <div v-for="expectation in cms?.section4_items" class="radial-card5 rounded-lg animateUp">
                            <div class="flex space-x-4 bg-[#146a68] p-6 rounded-lg relative z-[10]">
                                <div class="w-11 h-11 bg-primary-700 flex items-center rounded-full justify-center">
                                    <img 
                                        class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                                        :src="$page.props.storage_url + expectation?.logo" 
                                        alt="icon"
                                    >
                                </div>
                                <div class="w-[calc(100%-60px)] text-white">
                                    <p class="font-semibold text-lg mb-4">{{ expectation.title  }}</p>
                                    <p class="opacity-[0.65]">{{expectation.content}}</p>
                                </div>
                            </div>
                            <div class="radial-bg"></div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <img 
                        class="w-full animateUp"
                        :src="$page.props.storage_url + cms?.section4_image" 
                        alt="gaming"
                    >
                </div>
            </div>
        </section>
        <section>
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="gaming"
                    >
                </div>
                <div class="w-full lg:w-1/2 px-4 lg:px-20 py-6 lg:py-[100px]">
                    <p class="text-5xl font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp">
                        <p>{{ cms?.section5_content }}</p>
                    </div>
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-white">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 overflow-hidden">
            <div id="contact-form" class="-translate-y-20"></div>
            <img 
                class="absolute lg:top-0 top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#2D4959]"
                    :title="cms?.section6_title "
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/GamingFrameOne.vue';
const props = defineProps({
    cms: {
        type: Object
    },
})
</script>