<template>
    <div class="relative h-screen flex overflow-hidden bg-white dark:bg-gray-800">

        <sidebar-menu
        :show="sidebarOpen"
        @close="sidebarOpen = false"/>

        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="flex items-center justify-between px-4 py-2 border-b border-gray-100">
                <div>
                    <!-- mobile menu -->
                    <div class="w-10 h-10 p-2.5">
                        <Bars3BottomLeftIcon class="w-5 h-5"/>
                    </div>
                </div>
                <header-menu />
            </div>
            <main class="relative overflow-y-auto focus:outline-none">
                <div class="flex items-center justify-between py-8 px-12 border-b border-gray-100">
                    <div>
                        <breadcrumbs :pages="pages" />
                        <h1
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
        </div>

        <!-- <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div
                class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden"
            >
                <button
                    class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-300 lg:hidden"
                    @click="sidebarOpen = true"
                >
                    <span class="sr-only">Open sidebar</span>
                    <Bars3CenterLeftIcon class="h-6 w-6" aria-hidden="true" />
                </button>
            </div>

            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                <div
                    class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between lg:px-6"
                >
                    <div class="flex min-w-0">
                        <button
                            v-if="canBack"
                            @click="goBack"
                            class="border border-transparent text-xs text-gray-600 hover:text-gray-300 focus:outline-none mr-4"
                        >
                            <ChevronLeftIcon class="h-5 w-5" />
                        </button>
                        <h1
                            class="text-lg font-medium leading-6 text-gray-900 sm:truncate dark:text-white"
                        >
                            {{ title }}
                        </h1>
                    </div>
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <HeaderMenu />
                    </div>
                </div>

                
            </main>
        </div> -->
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
})

const sidebarOpen = ref(false);

const canBack = computed(() => props.showBack);

const goBack = () => {
    const url = props.backUrl;
    router.visit(url);
}
</script>
