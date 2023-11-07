<template>
    <div class="relative h-screen flex overflow-hidden bg-white dark:bg-gray-800">

        <sidebar-menu
        :expanded="expanded"
        :mouseenter="mouseenter"
        @mouseenter="mouseenter = true"
        @mouseleave="mouseenter = false"
        />

        <div 
        class="flex flex-col w-0 flex-1 overflow-hidden transition-all duration-500" 
        :class="expanded ? 'ml-60' : 'ml-20'">
            <div class="flex items-center justify-end px-4 py-2 border-b border-gray-100">
                <!-- <div class="w-10 h-10 p-2.5 cursor-pointer"
                @click="expandedSidebar">
                    <Bars3BottomLeftIcon class="w-5 h-5"/>
                </div> -->
                <header-menu />
            </div>
            <main class="relative overflow-y-auto focus:outline-none">
                <div class="flex items-center justify-between py-8 px-7 border-b border-gray-100">
                    <div class="space-y-3">
                        <breadcrumbs 
                        v-if="pages"
                        :pages="pages" />
                        <h1
                        v-if="title"
                        class="text-3xl font-black truncate"
                        >
                            {{ title }}
                        </h1>
                    </div>
                    <div class="flex items-center justify-end space-x-2">
                        <slot name="actionButtons"/>
                    </div>
                </div>

                <!-- Flash Messages -->
                <flash-messages />

                <slot></slot>
            </main>

            <div class="mt-auto w-full px-7 py-3 border-t border-gray-200 bg-gray-50" v-if="showButton">
                <slot name="buttons"/>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import FlashMessages from "@/Components/Modals/FlashMessages.vue";
import SidebarMenu from "@/Components/Partials/SidebarMenu.vue";
import Breadcrumbs from "@/Components/Partials/Breadcrumbs.vue";
import HeaderMenu from "@/Components/Partials/HeaderMenu.vue";

import {
    Bars3BottomLeftIcon,
} from "@heroicons/vue/24/outline";


const props = defineProps({
    title: String,
    backUrl: {
        type: String,
        default: null,
    },
    showBack: {
        type: Boolean,
        default: false,
    },
    pages: {
        type: Object,
    },
    showButton: {
        type: Boolean,
        default: false,
    },
})

const expanded = ref(true);
const mouseenter = ref(false);

const expandedSidebar = () => {
    expanded.value = !expanded.value;
}

</script>
