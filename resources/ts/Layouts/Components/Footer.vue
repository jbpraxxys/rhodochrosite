<template>
    <footer class="text-white relative">
        <div class="bg-primary-500">
            <div class="w-[94%] mx-auto py-3 lg:py-7 flex flex-wrap lg:items-center lg:justify-center space-x-4">
                <p class="text-xs lg:text-base w-full lg:w-auto">Copyright 2023</p>
                <p class="text-xs lg:text-base w-full lg:w-auto">PRAXXYS Solutions Inc.</p>
                <p class="text-xs lg:text-base w-full lg:w-auto">All rights reserved.</p>
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