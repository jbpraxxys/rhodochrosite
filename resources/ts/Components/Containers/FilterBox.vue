<template>
    <div>
        <div class="flex items-center space-x-2">
            <div class="w-full relative rounded-md">
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
                >
                    <MagnifyingGlassIcon
                        class="mr-3 h-5 w-5 text-gray-500"
                        aria-hidden="true"
                    />
                </div>
                <input
                    v-model="searchText"
                    type="text"
                    name="search"
                    id="search"
                    class="
                        focus:ring-primary-500 
                        focus:border-primary-500
                        block
                        w-full
                        pl-10
                        text-sm
                        placeholder:text-gray-300
                        border-gray-100
                        rounded-lg
                        h-11
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
            <action-button 
            fill="outline"
            :leading-icon="FunnelIcon"
            @click="open = true">
                Filter
            </action-button>
            <action-button fill="outline">
                <ArrowsUpDownIcon class="w-5 h-5 mr-2" />
                Sort
            </action-button>
        </div>

        <side-panel 
        :show="open"
        @close="open = false"
        title="Filter">
            <template #body>
                <slot name="fields" />
            </template>
            <template #footer>
                <div class="flex items-center justify-end space-x-2">
                    <action-button 
                    fill="outline"
                    @click="open = false && refresh">
                        Reset
                    </action-button>
                    <action-button 
                    @click="applyFilter">
                        Apply Filter
                    </action-button>
                </div>
            </template>
        </side-panel>
    </div>
</template>

<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { ref } from "vue";

import {
    FunnelIcon,
    ArrowsUpDownIcon,
    XMarkIcon,
    MagnifyingGlassIcon,
} from "@heroicons/vue/24/outline";


const props = defineProps({
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
    sortItems: {
        type: Boolean,
        default: true,
    },
    buttonItems: {
        type: Boolean,
        default: false,
    },
    refreshItems: {
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
})


const open = ref(false);
const searchText = ref(props.search);
const emit = defineEmits(['click'])

const refresh = () => {
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

const updateSearchText = (value) => {
    searchText.value = value;
    emit("update:searchText", value);
}

const applyFilter = () => {
    open.value = false;
    emit("update:filters");
}
</script>