<template>
    <user-layout>
        <section class="relative lg:h-screen">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[169px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[36vw] text-white">
                    <h1 
                    class="text-5xl leading-tight lg:text-[5.1vw] lg:leading-[6vw] mb-6 font-bold ck-content text-highlight" 
                    v-html="cms?.section1_title" />
                    <div class="max-w-[294px] mb-8 lg:mb-12">
                        <p>{{ cms?.section1_content }}</p>
                    </div>
                    <a :href="cms?.section1_btn_link ? cms?.section1_btn_link : '#contact-us'">
                        <v-button custom-class="h-14 px-6 !text-base">
                            {{ cms?.section1_btn_text ? cms?.section1_btn_text : 'Outsource with Us' }}
                        </v-button>
                    </a>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
        </section>

        <!-- section 2 -->
        <section class="relative">
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:p-20">
                <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
                    <div class="flex items-center justify-center animateUp lg:pb-0 pb-20">
                        <p class="text-3xl font-bold">
                            {{ cms?.section2_title }}
                        </p>
                    </div>
                    <service-card
                        class="animateUp"
                        v-for="item in cms?.section2_items"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <!-- section 3 -->
        <section class="bg-primary-900 text-white">
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:px-20 lg:py-[120px]">
                <div class="max-w-[835px] m-auto text-center mb-20">
                    <p class="text-3xl font-bold reveal-type mb-8">{{ cms?.section3_title }}</p>
                    <p class="text-xl font-bold word-split">{{ cms?.section3_content }}</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-4 w-full gap-8 lg:gap-20">
                    <values-card
                        v-for="item in cms?.section3_items"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <!-- section 4 -->
        <section>
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:px-20 lg:py-[120px]">
                <div class="space-y-8">
                    <image-text 
                    v-for="(item, index) in cms?.section4_items"
                    :key="index"
                    :item="{
                        title: item.title,
                        content: item.content,
                        image: item.image,
                        imageFirst: index % 2 === 0 ? false : true,
                        buttonText: item.btn_text,
                        designColor: 'text-white',
                        buttonLink: item.btn_link
                    }"
                    />
                </div>
            </div>
        </section>

        <!-- section 5 -->
        <section>
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 counter-container">
                <div class="flex lg:flex-row flex-col lg:items-center space-x-0 lg:space-x-8 justify-between mb-12 lg:space-y-0 space-y-6">
                    <div class="lg:max-w-[363px] w-full image-text">
                        <p class="text-3xl font-bold ck-content text-highlight" v-html="cms?.section5_title"></p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-8" id="counter">
                        <div v-for="(item, index) in cms?.section5_items" class="counter-wrapper">
                            <p class="text-3xl font-bold">
                                {{ item.prefix }}<span class="timer">{{ item.count }}</span>{{ item.suffix }}
                            </p>
                            <p>{{ item.content }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 lg:p-14 bg-primary-50 rounded-2xl flex lg:space-x-11 items-center lg:flex-row flex-col space-y-6 lg:space-y-0">
                    <img 
                        class="w-full lg:w-[340px] showLeft" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="ceo"
                    >
                    <div class="lg:w-[calc(100%-384px)] relative">
                        <img
                            src="/icons/quote.svg" 
                            alt="quote"
                            class="absolute -top-4 lg:-top-8 left-0 lg:-left-8"
                        >
                        <p class="text-xl lg:text-2xl font-medium poppins mb-4 animateUp">{{ cms?.section5_testimonial }}</p>
                        <p class="text-sm font-bold animateUp">{{ cms?.section5_name }}</p>
                        <p class="text-sm animateUp">{{ cms?.section5_position }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- section 6 -->
        <section>
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:p-20 text-center">
                <p class="text-xl font-bold mb-8">{{ cms?.section6_title }}</p>
                <company-slider :items="cms?.section6_items"/>
            </div>
        </section>

        <!-- section 7 -->
        <section class="bg-primary-900">
            <div class="max-w-[1440px] m-auto text-center px-4 py-16 lg:px-0 lg:py-[120px]">
                <div class="max-w-[715px] m-auto text-white">
                    <p class="text-5xl font-bold mb-4 animateUp">{{ cms?.section7_title }}</p>
                    <p class="mb-12 text-xl animateUp">{{ cms?.section7_content }}</p>
                    <a
                    v-if="cms?.section7_btn_link" 
                    :href="cms?.section7_btn_link">
                        <v-button class="animateUp">{{ cms?.section7_btn_text }}</v-button>
                    </a>
                </div>
            </div>
        </section>

        <!-- section 8 -->
        <section class="relative">
            <img 
                class="absolute bottom-[1300px] lg:bottom-0 left-0 lg:scale-100 scale-[200%] -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto lg:py-[120px] lg:px-20 px-4 py-16 relative z-[2]">
                <div class="flex lg:flex-row flex-col lg:space-y-0 space-y-8 lg:space-x-20 max-w-[1062px] m-auto mb-24">
                    <div class="w-full lg:w-1/2 image-text">
                        <p 
                        class="font-bold text-3xl mb-6 animateUp ck-content text-highlight reveal-type" 
                        v-html="cms?.section8_title" />
                        <div 
                        class="text-xl mb-4 lg:mb-12 animateUp" 
                        v-html="cms?.section8_content" />
                        <a 
                        v-if="cms?.section8_btn_link"
                        :href="cms?.section8_btn_link">
                            <v-button 
                            custom-class="h-14 px-6 !text-base animateUp" 
                            design-color="text-white">
                                {{ cms?.section8_btn_text }}
                            </v-button>
                        </a>
                    </div>
                    <div class="w-full lg:w-1/2 space-y-4">
                        <div v-for="item in cms?.section8_items" class="animateUp">
                            <div class="p-6 lg:p-8 bg-primary-50 rounded-2xl group/tech hover:-translate-y-2 transition duration-300 hover:shadow-md">
                                <p class="text-xl font-bold mb-2">{{ item.title }}</p>
                                <p>{{ item.content }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <home-contact-form />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import { onMounted } from 'vue';
import FrameOne from './Components/FrameOne.vue';
import CompanySlider from './Components/CompanySlider.vue';
import HomeContactForm from './Components/ContactForm.vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import ScrollMagic from "scrollmagic";

gsap.registerPlugin(ScrollTrigger);

defineProps({
    cms: {
        type: Object
    },
})

var controller = new ScrollMagic.Controller();
const counterUp = () => {
    
    const animationDuration = 2000;
    const frameDuration = 1000 / 60;
    const totalFrames = Math.round(animationDuration / frameDuration);

    const easeOutQuad = (t) => t * (2 - t);

    const animateCountUp = (el) => {
        let frame = 0;
        const countTo = parseInt(el.innerHTML, 10);
        const counter = setInterval(() => {
            frame++;
            const progress = easeOutQuad(frame / totalFrames);
            const currentCount = Math.round(countTo * progress);
            if (parseInt(el.innerHTML, 10) !== currentCount) {
                el.innerHTML = currentCount;
            }
            if (frame === totalFrames) {
                clearInterval(counter);
            }
        }, frameDuration);
    };

    const countupEls = document.querySelectorAll(".timer");
    

    new ScrollMagic.Scene({
        triggerElement: "#counter"
    })
    .setClassToggle(".counter-wrapper", "active")
    .addTo(controller)
    .on("enter", function (e) {
        countupEls.forEach(animateCountUp);
    });

}
onMounted(() => {
    counterUp();

    setTimeout(() => {

        gsap.from(".popAnimate", {
            scrollTrigger: ".popAnimate", // start the animation when ".box" enters the viewport (once)
            scale: 0.5,
            opacity: 0,
            duration: 1,
            stagger: 0.2, // 0.
        });

        
    }, 500)
})
</script>
