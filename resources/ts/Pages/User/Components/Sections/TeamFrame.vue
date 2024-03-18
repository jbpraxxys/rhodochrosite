<template>
    <section class="bg-primary-900 relative z-[2]">
        <div class="max-w-[1440px] m-auto lg:py-20 px-4 py-16 lg:px-20">
            <div class="text-center mb-20">
                <p class="text-5xl text-white font-bold">{{title1}}</p>
            </div>
            <div class="text-center">
                <div class="team-card" v-for="item in items">
                    <team-card 
                        :item="item"
                    />
                </div>
            </div>
            <div class="text-center mb-10 lg:mb-20">
                <p class="text-5xl text-white font-bold">{{title2}}</p>
            </div>
            <div>
                <Lightgallery
                    :settings="{ 
                        speed: 500,
                        plugins: plugins
                    }"
                >
                    <a 
                        href="https://www.youtube.com/watch?v=P2kofMKMLnE&mute=0&autoplay=1"
                    >
                        <img 
                            class="image image-thumb w-full h-full object-cover" 
                            src="/temp/video-thumbnail.png" 
                            alt=""
                        >
                    </a>
                </lightgallery>
            </div>
        </div>
    </section>
</template>
<script lang="ts" setup>
import Lightgallery from 'lightgallery/vue';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
import lgVideo from 'lightgallery/plugins/video';

const plugins: {} [] = [lgThumbnail, lgZoom, lgVideo];

defineProps({
    items: {
        type: Object,
        default: () => ({})
    },
    title1: {
        type: String
    },
    title2: {
        type: String
    },
})
</script>