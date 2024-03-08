<template>
    <Head>
        <title inertia>{{ seoTitle }}</title>
        <meta itemprop="image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta name="twitter:image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta property="og:image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta property="og:title" :content="seoTitle">
        <meta property="og:description" :content="seoDescription">
    </Head>
    <div>
        <Header 
        :header="header"
        />
        
        <slot />

        <Footer
        :footer="footer"
        />
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

import Header from "./Components/Header.vue";
import Footer from "./Components/Footer.vue";

import Lenis from '@studio-freight/lenis';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

defineProps({
    seoTitle: {
        type: String,
        default: 'Home'
    },
    seoDescription: {
        type: String
    },
    seoImage: {
        type: String
    },
    seoKeywords: {
        type: String
    }
})


const header = ref<object>(null);
const footer = ref<object>(null);

// METHODS
const fetchLayout = () => {
    window.axios.post(route("web.cms.layout")).then((response) => {
        header.value = response.data.header?.content;
        footer.value = response.data.footer?.content;
    });
};

const origin = window.location.origin;

const lenis = new Lenis({
    duration: 1.5
})

function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

onMounted(() => {
    // fetchLayout();
    setTimeout(() => {
        const animateUp = gsap.utils.toArray('.animateUp');
        animateUp.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                y: 20,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const showLeft = gsap.utils.toArray('.showLeft');
        showLeft.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                x: -40,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const scaleUp = gsap.utils.toArray('.scaleUp');
        scaleUp.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                scale: 0,
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

        const fadeIn = gsap.utils.toArray('.fadeIn');
        fadeIn.forEach(grow => {
            gsap.from(grow, {
                scrollTrigger: {
                    trigger: grow,
                    start: 'bottom 100%',
                },
                opacity: 0,
                duration: 2,
                ease: "Expo.easeOut",
            });
        });

    }, 500)
    
})
</script>