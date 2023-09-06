<template>
    <admin-layout :pages="pages">
        <div class="w-[552px] mx-auto mt-6 border border-gray-100 rounded-lg ">
            <div class="p-6 text-sm">
                <p class="font-semibold">Admin Information</p>
                <p class="text-gray-500">Relevant Information and other details</p>

                <div class="my-6">
                    <p class="text-gray-500">Full Name</p>
                    <p class="text-gray-900">{{ admin.name }}</p>
                </div>
                <div class="w-1/2 inline-block">
                    <p class="text-gray-500">Email Address</p>
                    <p class="text-gray-900">{{ admin.email }}</p>
                </div>
                <div class="w-1/2 inline-block">
                    <p class="text-gray-500">Contact Number</p>
                    <p class="text-gray-900">0900 000 0000</p>
                </div>
                <div class="mt-6">
                    <p class="text-gray-500">Role</p>
                    <p class="text-blue-600">Superadmin</p>
                </div>
            </div>
            <div class="py-4 px-6 w-full bg-gray-50 border-t border-gray-100 flex justify-end">
                <jet-button><a :href="route('admin.admin-management.edit', admin.id)">
                    Update Information
                </a></jet-button>
            </div>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
import { computed, ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";

const props = defineProps({
    items: {
        type : Object,
        default: () => {},
        require: true,
    },
    informationCount: {
        type : Number,
        default: 0
    },
    activityLogsCount: {
        type : Number,
        default: 0
    },
    selectedTab: {
        type : String,
        default: null
    },
    admin: {
        type: Object
    },
    roles: {
        type: Object
    }
});

/**---------------*
 * VARS
 *----------------*/
const items = computed(() => props.items);

const showArchiveModal = ref<boolean>(false);
const showRestoreModal = ref<boolean>(false);
const selectedItem = ref<any>(null);

const pages = [
    {
        href: route("admin.admin-management.index"),
        name: "Admins",
    },
    {
        href: "",
        name: "View",
    },
];

/**---------------*
 * METHODS
 *----------------*/
const applyFilters = (): void => {
    router.get(
        route(route().current()),
        pickBy({
            tab: props.selectedTab
        }),
        {
            preserveState: true
        }
    )
}

/**---------------*
 * WATCHERS
 *----------------*/

</script>
