<template>
    <footer class="bg-primary-900">
        <div class="px-4 lg:px-20 pb-7 pt-16 lg:py-16 flex lg:flex-row flex-col lg:justify-between">
            <div class="max-w-[396px]">
                <div class="py-3 mb-2">
                    <a href="/">
                        <img 
                            class="w-[250px] lg:w-[260px]" 
                            src="/temp/footer-logo.svg" 
                            alt="footer-logo"
                        >
                    </a>
                </div>
                <p class="text-white leading-5 mb-8">Double Dragon Meridian Park corner Macapagal Avenue, Pasay, Metro Manila, Philippines</p>
                <div class="flex items-center space-x-6 mb-12 lg:mb-0">
                    <img 
                        class="h-[50px]"
                        src="/temp/ftr1.png" 
                        alt="icon"
                    >
                    <img 
                        class="h-[50px]"
                        src="/temp/ftr2.png" 
                        alt="icon"
                    >
                    <img 
                        class="h-[50px]"
                        src="/temp/ftr3.png" 
                        alt="icon"
                    >
                    <img 
                        class="h-[50px]"
                        src="/temp/ftr4.png" 
                        alt="icon"
                    >
                </div>
            </div>
            <div class="max-w-[681px] w-full grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16 text-white">
                <div class="space-y-6">
                    <p class="font-bold">Solutions</p>
                    <div><a class="hover:text-primary-600 transition" href="/solutions/contact-center">Contact Center</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/solutions/managed-services">Managed Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/solutions/staff-leasing">Staff Leasing</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/solutions/workforce-management">Workforce Management</a></div>
                </div>
                <div class="space-y-6">
                    <p class="font-bold">Specializations</p>
                    <div><a class="hover:text-primary-600 transition" href="/specializations/ict">Creative Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/specializations/sales-and-customer">Sales and Customer Support</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/specializations/sale-development">Sales Development Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/specializations/customer-service">Customer Success Services</a></div>
                </div>
                <div class="space-y-6">
                    <p class="font-bold">Others</p>
                    <div><a class="hover:text-primary-600 transition" href="/industries">Industries</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/about-us/our-advantage">About Us</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/contact-us">Contact Us</a></div>
                </div>
            </div>
        </div>
        <div class="px-4 pt-4 pb-12 lg:px-20 lg:py-12 flex lg:flex-row flex-col lg:items-center justify-between text-white text-sm lg:text-base lg:space-y-0 space-y-6">
            <div class="flex lg:items-center lg:space-x-16 lg:flex-row flex-col lg:space-y-0 space-y-6">
                <p>Copyright © 2024 Reliasourcing Inc. All Rights Reserved.</p>
                <div class="flex items-start lg:items-center space-x-4 lg:w-auto w-fit">
                    <a class="hover:text-primary-600 transition" href="/privacy-policy">Privacy Policy</a>
                    <a class="hover:text-primary-600 transition" href="/terms-and-conditions">Terms</a>
                </div>
            </div>
            <div class="flex items-center space-x-3.5">
                <a 
                    href="https://www.facebook.com/reliasourcingdd/"
                    target="_blank"
                    rel="noreferrer"
                >
                    <img 
                        class="w-5" 
                        src="/temp/facebook.svg" 
                        alt="icon"
                    >
                </a>
                <a 
                    href="https://www.linkedin.com/company/reliasourcing/"
                    target="_blank"
                    rel="noreferrer"
                >
                    <img 
                        class="w-5" 
                        src="/temp/linkedin.svg" 
                        alt="icon"
                    >
                </a>
            </div>
        </div>
    </footer>
</template>


<script setup lang="ts">
import { ref } from 'vue';
defineProps({
    footer: {
        type: Object
    }
})


</script>