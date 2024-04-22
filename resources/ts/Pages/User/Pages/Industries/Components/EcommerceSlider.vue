<template>
    <div>
        <swiper
            :modules="modules"
            :slides-per-view="'auto'"
            :space-between="32"
            :free-mode="true"
            class="ecommerce-swiper"
        >
            <swiper-slide v-for="item in items" class="!w-fit">
                <div>
                    <img 
                        class=""
                        :src="$page.props.storage_url + item.image" 
                        alt="ecommerce"
                    >
                </div>
            </swiper-slide>
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
