<template>
    <nav class="flex" aria-label="HeaderMenu">
        <ol class="flex items-center space-x-6">
            <li v-for="item in navigation" :key="item">
                <div class="">
                    <Link
                    :href="item.href"
                    class="relative"
                    :class="[
                        isCurrentUrl(item.href)
                        ? 'text-primary-700'
                        : 'text-gray-500 hover:text-gray-400 dark:text-white'
                    ]"
                    >
                        <component
                            :is="item.icon"
                            aria-hidden="true"
                            class="h-6 w-6"
                        />
                        <span
                        class="
                            bg-primary-700
                            w-full
                            inline-block
                            h-1
                            rounded-tl rounded-tr
                            absolute
                            -bottom-4
                        "
                        v-if="isCurrentUrl(item.href)"
                      />
                    </Link>
                </div>
            </li>
            <li @click="logout">
                <div class="cursor-pointer">
                    <ArrowRightOnRectangleIcon class="h-6 w-6 text-gray-500 hover:text-gray-400 dark:text-white"/>
                </div>
            </li>
        </ol>
    </nav>
</template>

<script lang="ts" setup>
import { Link, router } from "@inertiajs/vue3";
import {
    UserIcon,
    BellIcon,
    ArrowRightOnRectangleIcon
} from "@heroicons/vue/24/outline";
defineProps: ({
    pages: {
        type: Array,
        default: [],
    },
})

const navigation = [
    {
        name: "Profile",
        href: route("admin.profile.show"),
        icon: UserIcon,
    },
    {
        name: "Notification",
        href: route("admin.notification.index"),
        icon: BellIcon,
    },
]

const logout = () => {
    router.post(route("admin.logout"));
},

isCurrentUrl = (href) => {
    const currentUrl = window.location.href;
    return href.endsWith(currentUrl);
}
</script>
