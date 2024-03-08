<template>
    <header 
        ref="headRef" 
        class="w-full fixed top-0 left-0 z-[90] transition"
        :class="headerScroll ? 'bg-white shadow-md' : 'bg-primary-900'"
    >
        <div class="px-20 mx-auto py-1 lg:py-4 flex items-center justify-between">
            <div class="hdr-logo w-8/12 lg:w-auto">
                <a href="/">
                    <img 
                        src="/temp/logo.png" 
                        alt="logo"
                        class="h-[68px] max-w-full mx-auto transition duration-700"
                        :class="headerScroll ? '' : 'brightness-0 invert'"
                    >
                </a>
            </div>
            <div
                class="flex items-center font-medium space-x-8 transition"
                :class="headerScroll ? 'text-primary-900' : 'text-white'"
            >
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition">
                        <a href="/solutions/call-center">Solutions</a>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[218px] rounded-b-xl shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/solutions/call-center">Contact Center</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/managed-services">Managed Services</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/staff-leasing">Staff Leasing</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/workforce-management">Workforce Management</a>
                        <!-- <a class="hover:text-primary-600 transition" href="/solutions/virtual-assistant">Virtual Assistant</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/crowd-sourcing">Crowd Sourcing</a>
                        <a class="hover:text-primary-600 transition" href="/solutions/seat-leasing">Seat Leasing</a> -->
                    </div>
                </div>
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition">
                        <a href="/why-us/our-advantages">Specialization</a>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[280px] rounded-b-xl shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/specializations/ict">Creative Services</a>
                        <div class="relative group-hover2">
                            <div class="flex items-center space-x-2.5 hover:text-primary-600 transition">
                                <a href="/specializations/sale-development">Sales and Customer Support</a>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="transparent" stroke="currentColor">
                                    <path d="M9 6L15 12L9 18" stroke-width="2"/>
                                </svg>
                            </div>
                            <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[275px] rounded-b-xl shadow-md absolute -top-1 left-[calc(100%+24px)] hover-child2">
                                <a class="hover:text-primary-600 transition" href="/specializations/sale-development">Sales Development Services</a>
                                <a class="hover:text-primary-600 transition" href="/specializations/customer-service">Customer Success Services</a>
                                <a class="hover:text-primary-600 transition" href="/specializations/sales-team-service">Revenue Optimization Service</a>
                                <!-- <a class="hover:text-primary-600 transition" href="/specializations/social-media-management">Social Media Management</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition">
                    <a href="/industries">Industries</a>
                </div>
                <div class="relative group-hover">
                    <div class="flex items-center space-x-1 hover:text-primary-600 cursor-pointer transition">
                        <a href="/why-us/our-advantages">Why Us?</a>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="transparent" stroke="currentColor">
                            <path d="M12 6L8 10L4 6" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="bg-white px-6 py-4 text-sm text-black flex flex-col space-y-4 min-w-[218px] rounded-b-xl shadow-md absolute top-[40px] left-0 hover-child">
                        <a class="hover:text-primary-600 transition" href="/why-us/our-advantages">Our Advantages</a>
                        <a class="hover:text-primary-600 transition" href="/why-us/our-team">Our Team</a>
                    </div>
                </div>
                <div class="pl-8">
                    <a href="/contact-us">
                        <v-button v-if="headerScroll ? '': 'hidden'" size="sm">Contact Us</v-button>
                        <v-button v-if="headerScroll ? 'hidden': ''" size="sm" design-color="text-white">Contact Us</v-button>
                    </a>
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