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
})

const sidebarOpen = ref(false);

const canBack = computed(() => props.showBack);

const goBack = () => {
    const url = props.backUrl;
    router.visit(url);
}
</script>
