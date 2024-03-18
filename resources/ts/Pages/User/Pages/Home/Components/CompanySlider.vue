<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="2.8"
            :space-between="32"
            :direction="'horizontal'"
            :autoplay="{
                delay: 5000,
                disableOnInteraction: false,
            }"
            :loop="true"
            :breakpoints="{
                '1024': {
                    slidesPerView: 6,
                    spaceBetween: 40,
                },
            }"
            :speed="1000" class="company-swiper"
        >
            <swiper-slide v-for="i,index in company" :key="index">
                <a 
                    :href="i.link" 
                    target="_blank" 
                    rel="noreferrer"
                    
                >
                    <div class="popAnimate w-fit m-auto">
                        <img 
                            class="w-[114px] grayscale transition hover:grayscale-0 hover:scale-125 duration-500"
                            :src="i.image" 
                            alt="logo"
                        >
                    </div>
                </a>
            </swiper-slide>
        </swiper>
    </div>
</template>
<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import "swiper/css/free-mode";
import 'swiper/css';
import { Autoplay, Navigation } from 'swiper/modules';

defineProps({
    items: {
        type: Object
    }
})

const modules = [Autoplay, Navigation];

const company = [
    {
        link: 'https://thrivedx.com/',
        image: '/temp/logo1.png'
    },
    {
        link: 'https://www.tango.me/',
        image: '/temp/logo2.png'
    },
    {
        link: 'https://www.accessiway.com/',
        image: '/temp/logo3.png'
    },
    {
        link: 'https://www.playtech.com/',
        image: '/temp/logo4.png'
    },
    {
        link: 'https://connecteam.com/',
        image: '/temp/logo5.png'
    },
    {
        link: 'https://creditsense.ai/',
        image: '/temp/logo6.png'
    },
    {
        link: '/',
        image: '/temp/logo7.png'
    },
    {
        link: 'https://comontec.com/',
        image: '/temp/logo8.png'
    },
    {
        link: 'https://www.playtika.com/',
        image: '/temp/logo9.png'
    },
    {
        link: 'https://www.superplay.co/',
        image: '/temp/logo10.png'
    },
    {
        link: '/',
        image: '/temp/logo11.png'
    },
]
</script>
