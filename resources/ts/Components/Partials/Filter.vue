<template>
    <div>
        <div class="flex justify-between">
            <div v-if="customFilter" class="flex justify-start items-center">
                <template v-if="customFilters">
                    <jet-button
                        v-if="sidebarFilters"
                        type="button"
                        secondary
                        class="mr-2 h-10 !rounded-lg !text-gray-500"
                        @click="open = true"
                    >
                        <FunnelIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
                        Filter
                    </jet-button>
                    <template v-if="buttonItems">
                        <slot name="buttons" />
                    </template>
                    <jet-button type="button" class="h-10 !px-3 !rounded-lg !bg-gray-300 hover:!bg-primary-700 active:!bg-primary-900 !border-gray-300 focus:!border-primary-800" @click="refresh">
                        <ArrowPathIcon class="-ml-0.5 h-4 w-4" aria-hidden="true" />
                    </jet-button>
                </template>
            </div>
            <div v-if="dashFilter" class="flex justify-start items-center">
                <Menu as="div" class="relative inline-block text-left">
                    <div>
                        <MenuButton class="flex items-center justify-between gap-2 px-3 py-2.5 text-sm font-normal text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-800">
                            {{ dashFilterLabel }}
                            <CalendarIcon class="w-5 h-5" aria-hidden="true" />
                        </MenuButton>
                    </div>
                    <transition enter-active-class="transition duration-100 ease-out" enter-from-class="transform scale-95 opacity-0" enter-to-class="transform scale-100 opacity-100" leave-active-class="transition duration-75 ease-in" leave-from-class="transform scale-100 opacity-100" leave-to-class="transform scale-95 opacity-0">
                        <MenuItems class="absolute left-0 mt-2 origin-top-left bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none w-max">
                            <div class="py-1">

                                <MenuItem 
                                    v-for="date in dates"
                                    :key="date.value" 
                                    v-slot="{ active }" 
                                    @click.prevent="selectDate(date.id)" 
                                    >
                                    <a href="#" :class="[active ? 'bg-gray-900 text-white' : 'text-gray-900', 'block px-4 py-2 text-sm']">
                                        {{ date.value }}
                                    </a>
                                </MenuItem>

                                <MenuItem v-slot="{ active }">
                                    <a @click.prevent="openFilter = true" :class="[active ? 'bg-primary-800 text-white' : 'text-gray-900', 'block px-4 py-2 text-sm cursor-pointer']">Custom Range</a>
                                </MenuItem>
                            </div>
                        </MenuItems>
                    </transition>
                </Menu>
                <jet-button type="button" class="ml-2 h-10 !px-3 !rounded-lg !bg-gray-300 hover:!bg-primary-700 active:!bg-primary-900 !border-gray-300 focus:!border-primary-800" @click="refresh">
                    <ArrowPathIcon class="-ml-0.5 h-4 w-4" aria-hidden="true" />
                </jet-button>
            </div>


            <div class="flex items-center gap-3">
                <template v-if="textFilters">
                    <div>
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative rounded-md">
                            <div
                                class="
                                    absolute
                                    inset-y-0
                                    left-0
                                    pl-3
                                    flex
                                    items-center
                                    pointer-events-none
                                "
                                aria-hidden="true"
                            >
                                <MagnifyingGlassIcon
                                    class="mr-3 h-4 w-4 text-gray-600"
                                    aria-hidden="true"
                                />
                            </div>
                            <input
                                v-model="searchText"
                                type="text"
                                name="search"
                                id="search"
                                class="
                                    focus:ring-primary-800 focus:border-primary-800
                                    block
                                    w-full
                                    pl-10
                                    sm:text-sm
                                    border-gray-300
                                    rounded-lg
                                    h-10
                                "
                                placeholder="Search"
                                @input="updateSearchText($event.target.value)"
                            />
                            <button
                                v-if="searchText"
                                @click="updateSearchText(null)"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center z-10"
                            >
                                <XMarkIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
                            </button>
                        </div>
                    </div>
                </template>

                <template v-if="rightButtonItems">
                    <slot name="rightButtons" />
                </template>
            </div>
        </div>

        <TransitionRoot as="template" :show="open">
            <Dialog as="div" class="relative z-10" @close="open = false">
                <div class="fixed inset-0" />

                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div
                            class="
                                pointer-events-none
                                fixed
                                inset-y-0
                                right-0
                                flex
                                max-w-full
                                pl-10
                            "
                        >
                            <TransitionChild
                                as="template"
                                enter="transform transition ease-in-out duration-500 sm:duration-700"
                                enter-from="translate-x-full"
                                enter-to="translate-x-0"
                                leave="transform transition ease-in-out duration-500 sm:duration-700"
                                leave-from="translate-x-0"
                                leave-to="translate-x-full"
                            >
                                <DialogPanel class="pointer-events-auto w-screen max-w-sm">
                                    <div
                                        class="
                                            flex
                                            h-full
                                            flex-col
                                            overflow-y-scroll
                                            bg-white
                                            py-6
                                            shadow-xl
                                        "
                                    >
                                        <div class="px-4 sm:px-6">
                                            <div class="flex items-start justify-between">
                                                <DialogTitle class="text-lg font-medium text-gray-900">
                                                    Filter
                                                </DialogTitle>
                                            </div>
                                        </div>
                                        <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                            <div class="h-full flex flex-col">
                                                <div class="w-full">
                                                    <slot name="fields" />
                                                </div>
                                                <div class="mt-auto w-full">
                                                    <div class="flex justify-end">
                                                        <jet-button
                                                            type="button"
                                                            secondary
                                                            class="mr-2 !text-gray-900 !rounded-lg"
                                                            @click="open = false && refresh"
                                                        >
                                                            Reset
                                                        </jet-button>
                                                        <jet-button type="button" class="!rounded-lg" @click="applyFilter">
                                                            Apply Filter
                                                        </jet-button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /End replace -->
                                        </div>
                                    </div>
                                </DialogPanel>
                            </TransitionChild>
                        </div>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>

<script>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import {
    XMarkIcon,
    ChevronUpDownIcon,
    FunnelIcon,
    ArrowPathIcon,
    MagnifyingGlassIcon,
} from "@heroicons/vue/24/outline";

import {
    CalendarIcon,
} from "@heroicons/vue/24/solid";

export default {
    components: {
        ChevronUpDownIcon,
        XMarkIcon,
        MagnifyingGlassIcon,
        FunnelIcon,
        ArrowPathIcon,
        CalendarIcon,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Dialog,
        DialogPanel,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
    },
    props: {
        textFilters: {
            type: Boolean,
            default: true,
        },
        rightButtonItems: {
            type: Boolean,
            default: false,
        },
        customFilters: {
            type: Boolean,
            default: true,
        },
        customFilter: {
            type: Boolean,
            default: true,
        },
        sidebarFilters: {
            type: Boolean,
            default: true,
        },
        buttonItems: {
            type: Boolean,
            default: false,
        },
        search: {
            type: String,
            default: null,
        },
        dashFilter: {
                type: Boolean,
                default: false
        },
        dashFilterLabel: {
                type: String,
                default: "Filter by Date"
        },
        dashFilterBranchLabel: {
                type: String,
                default: "All"
        },
        dates: {
                type: Array,
                default: [
                        {
                                id: "none",
                                value: "None"
                        },
                        {
                                id: "today",
                                value: "Today"
                        },
                        {
                                id: "yesterday",
                                value: "Yesterday"
                        },
                        {
                                id: "this_month",
                                value: "This Month"
                        },
                        {
                                id: "last_month",
                                value: "Last Month"
                        },
                ]
        },


    },
    setup(props, { emit }) {
        const open = ref(false);
        const searchText = ref(props.search);

        function refresh() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const tab = urlParams.get("tab");
            const data = {};

            if (tab) {
                data["tab"] = tab;
            }

            router.visit(window.location.href.split("?")[0], {
                preserveState: false,
                preserveScroll: true,
                replace: true,
                data: data,
            });
        }

        function updateSearchText(value) {
            searchText.value = value;
            emit("update:searchText", value);
        }

        function applyFilter() {
            open.value = false;
            emit("update:filters");
        }

        return {
            open,
            // Filters
            searchText,
            // Functions
            refresh,
            updateSearchText,
            applyFilter,
        };
    },
};
</script>
