<template>
    <header 
        ref="headRef" 
        class="w-full fixed top-0 left-0 z-[90] transition"
        :class="headerScroll ? 'bg-white shadow-md' : 'bg-primary-900'"
    >
        <div class="px-4 lg:px-20 mx-auto lg:py-4 flex items-center justify-between transition header-wrapper" :class="headerScroll ? 'py-2' : 'py-6'">
            <div class="hdr-logo lg:w-auto">
                <a href="/">
                    <img 
                        src="/temp/logo.png" 
                        alt="logo"
                        class="lg:h-[68px] max-w-full mx-auto transition duration-700 header-logo"
                        :class="headerScroll ? 'h-[64px]' : 'brightness-0 invert h-[61px]'"
                    >
                </a>
            </div>
            <div @click="toggleMenu" class="hamburger-menu pr-3 lg:hidden" :class="menuOpen ? 'active' : ''">
                <div class="bar" :class="headerScroll ? 'scroll' : ''"></div>
            </div>
            <div
                class="lg:flex items-center font-medium lg:space-y-0 space-y-6 lg:space-x-8 transition lg:relative fixed nav-menu lg:top-auto"
                :class="[
                    headerScroll ? 'text-primary-900 top-[80px] scroll' : 'lg:text-white top-[109px]',
                    menuOpen ? 'translate-x-0' : 'translate-x-[110%] lg:translate-x-0'
                ]"
            >
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a href="/solutions/contact-center">Solutions</a>
                        <svg class="rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[220px] rounded-b-xl lg:shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/solutions/contact-center">Contact Center</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/managed-services">Managed Services</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/staff-leasing">Staff Leasing</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/workforce-management">Workforce Management</a>
                        <!-- <a class="hover:text-primary-600 transition" href="/solutions/virtual-assistant">Virtual Assistant</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/crowd-sourcing">Crowd Sourcing</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/seat-leasing">Seat Leasing</a> -->
                    </div>
                </div>
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a href="/specializations/ict">Specialization</a>
                        <svg class="rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[285px] rounded-b-xl lg:shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/specializations/ict">Creative Services</a>
                        <div class="relative group-hover2">
                            <div class="flex items-center space-x-2.5 hover:text-primary-600 transition lg:justify-normal justify-between">
                                <a href="/specializations/sales-and-customer">Sales and Customer Support</a>
                                <div>
                                    <svg class="lg:block hidden" width="24" height="24" viewBox="0 0 24 24" fill="transparent" stroke="currentColor">
                                        <path d="M9 6L15 12L9 18" stroke-width="2"/>
                                    </svg>
                                    <svg class="lg:hidden block rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                                        <path d="M12 6L8 10L4 6" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[275px] rounded-b-xl lg:shadow-md absolute -top-1 left-[calc(100%+24px)] hover-child2">
                                <a class="hover:text-primary-600 transition" href="/specializations/sale-development">Sales Development Services</a>
                                <a class="hover:text-primary-600 transition" href="/specializations/customer-service">Customer Success Services</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                    <a href="/industries">Industries</a>
                </div>
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition lg:w-fit w-full lg:justify-normal justify-between">
                        <a href="/about-us/our-advantages">About Us</a>
                        <svg class="rotate-180 lg:rotate-0" width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[218px] rounded-b-xl lg:shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/about-us/our-advantages">Our Advantages</a>
                        <a class="hover:text-primary-600 transition" href="/about-us/our-team">Our Team</a>
                    </div>
                </div>
                <div>
                    <div class="lg:pl-8 button-header px-5 py-4 lg:px-0 lg:py-0">
                        <a href="/contact-us">
                            <v-button custom-class="w-full lg:w-auto" v-if="headerScroll ? '': 'hidden'" size="md">Contact Us</v-button>
                            <v-button custom-class="w-full lg:w-auto" v-if="headerScroll ? 'hidden': ''" size="md" design-color="text-white">Contact Us</v-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>


<script setup lang="ts">
import { onMounted, ref } from 'vue'

defineProps({
    header: {
        type: Object
    }
})

const menuOpen = ref(false);
const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
}

const headRef = ref<any>(null);
const headerScroll = ref(false);

onMounted(() => {
	var prev = window.pageYOffset;
	window.addEventListener("scroll", () => {
		var curr = window.pageYOffset;
		if (prev < 200) {
            headerScroll.value = false
			
		} else {
            headerScroll.value = true
		}
		prev = curr;
	});
});


</script>