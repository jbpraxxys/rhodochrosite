<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="3.5"
            :space-between="32"
            class="advantage-swiper"
        >
            <swiper-slide v-for="item in items">
                <div 
                    class="p-8 rounded-xl text-white space-y-2.5 flex flex-col min-h-[394px] border-[3px] border-[#191919]/[0.60]" 
                    :class="item.customClass"
                >
                    <div class="w-24 h-24 relative">
                        <img
                            class="w-full h-full object-contain" 
                            :src="item.icon" 
                            alt="icon"
                        >
                    </div>
                    <p class="font-semibold text-2xl text-[#51D2CA]">{{ item.title }}</p>
                    <div>
                        <p>{{ item.content }}</p>
                    </div>
                </div>
            </swiper-slide>
            <swiper-slide class="w-20 spacer"></swiper-slide>
        </swiper>
    </div>
</template>
<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Navigation, FreeMode } from 'swiper/modules';

defineProps({
    items: {
        type: Object
    }
})

const modules = [Autoplay, Navigation, FreeMode];

</script>
