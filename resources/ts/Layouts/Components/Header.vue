<template>
    <header class="w-full fixed top-0 left-0 bg-primary-500 lg:bg-white z-[90] lg:border-b border-primary-600">
        <div class="w-[94%] mx-auto py-1 lg:py-5 flex items-center justify-between">
            <div class="hdr-logo w-8/12 lg:w-auto">
                <a href="/">
                    <img 
                    src="//via.placeholder.com/90x90" 
                    alt="logo"
                    class="hidden lg:block h-[65px] max-w-full mx-auto">
                </a>
            </div>
        </div>
    </header>
</template>


<script setup lang="ts">
import { ref } from 'vue'
import DesktopMenu from "./DesktopMenu.vue";
import MobileMenu from "./MobileMenu.vue";
import Search from "./Search.vue";
import { 
    Bars2Icon,
    XMarkIcon,
    MagnifyingGlassIcon
} from "@heroicons/vue/24/solid";

defineProps({
    header: {
        type: Object
    }
})


</script>