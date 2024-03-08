<template>
    <footer class="bg-primary-900">
        <div class="px-20 py-16 flex justify-between">
            <div class="max-w-[396px]">
                <div class="py-3 mb-2">
                    <a href="/">
                        <img 
                            class="w-[260px]" 
                            src="/temp/footer-logo.svg" 
                            alt="footer-logo"
                        >
                    </a>
                </div>
                <p class="text-white leading-5 mb-8">Double Dragon Meridian Park corner Macapagal Avenue, Pasay, Metro Manila, Philippines</p>
                <div class="flex items-center space-x-6">
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
            <div class="max-w-[681px] w-full grid grid-cols-3 gap-16 text-white">
                <div class="space-y-6">
                    <p class="font-bold">Solutions</p>
                    <div><a class="hover:text-primary-600 transition" href="/">Contact Center</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Managed Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Staff Leasing</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Workforce Management</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Seat Leasing</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Crowd Sourcing</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Virtual Assistant</a></div>
                </div>
                <div class="space-y-6">
                    <p class="font-bold">Specializations</p>
                    <div><a class="hover:text-primary-600 transition" href="/">ICT and Creative Services</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Sales and Customer Support</a></div>
                </div>
                <div class="space-y-6">
                    <p class="font-bold">Others</p>
                    <div><a class="hover:text-primary-600 transition" href="/">Industries</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Serviced Locations</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">On-Boarding</a></div>
                    <div><a class="hover:text-primary-600 transition" href="/">Why Us?</a></div>
                </div>
            </div>
        </div>
        <div class="px-20 py-16 flex items-center justify-between text-white">
            <div class="flex items-center space-x-16">
                <p>Copyright © 2024 Reliasourcing Inc. All Rights Reserved.</p>
                <div class="flex items-center space-x-4">
                    <a class="hover:text-primary-600 transition" href="">Privacy Policy</a>
                    <a class="hover:text-primary-600 transition" href="">Terms</a>
                </div>
            </div>
            <div class="flex items-center space-x-3.5">
                <a 
                    href="/"
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
                    href="/"
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