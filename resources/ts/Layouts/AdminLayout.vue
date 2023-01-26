<template>
    <div class="relative h-screen flex overflow-hidden bg-white dark:bg-gray-800">

        <SidebarMenu
        :show="sidebarOpen"
        @close="sidebarOpen = false"/>

        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- mbl header -->
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
                <button
                    class="px-4 border-r border-gray-200 text-gray-500 lg:hidden"
                >
                    <img
                        class="h-8 w-8 rounded-full"
                        src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                    />
                </button>
            </div>
            <!--  -->

            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
                <!-- Page title & actions -->
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

                <!-- Flash Messages -->
                <flash-messages />

                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { ref, computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import FlashMessages from "@/Components/FlashMessages.vue";
import SidebarMenu from "@/Components/SidebarMenu.vue";
import HeaderMenu from "@/Components/HeaderMenu.vue";

import {
    Bars3CenterLeftIcon,
    ChevronLeftIcon,
} from "@heroicons/vue/24/outline";

export default {
    components: {
        Bars3CenterLeftIcon,
        ChevronLeftIcon,
        Link,
        FlashMessages,
        SidebarMenu,
        HeaderMenu
    },
    props: {
        title: String,
        backUrl: {
            type: String,
            default: null,
        },
        showBack: {
            type: Boolean,
            default: false,
        },
    },
    setup(props) {
        const sidebarOpen = ref(false);

        const canBack = computed(() => props.showBack);

        function goBack() {
            const url = props.backUrl;
            Inertia.visit(url);
        }

        return {
            sidebarOpen,
            goBack,
            canBack,
        };
    },
};
</script>
