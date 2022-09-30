<template>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-6 frm-breadcrumb">
            <!-- <li>
                <div>
                    <Link
                        :href="route('admin.dashboard.index')"
                        class="text-gray-400 hover:text-gray-500"
                    >
                        <HomeIcon class="flex-shrink-0 h-5 w-5" aria-hidden="true" />
                        <span class="sr-only">Home</span>
                    </Link>
                </div>
            </li>
            <li v-for="page in pages" :key="page.name">
                <div class="flex items-center">
                <ChevronRightIcon
                    class="flex-shrink-0 h-5 w-5 text-gray-400"
                    aria-hidden="true"
                />
                <Link
                    :href="page.href"
                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                    :aria-current="page.current ? 'page' : undefined"
                    >{{ page.name }}
                </Link>
                </div>
            </li> -->

            <li>
                <div class="h-7 w-7 flex items-center justify-center relative">
                    <Link 
                    :href="route('admin.profile.show')" 
                    :class="{ 'active': $page.url === '/admin/user/profile' }"
                    class="text-gray-400 hover:text-gray-500"
                    >
                        <img 
                        src="/icons/nav/ic-user.svg" 
                        class="flex-shrink-0 h-4 w-4"
                        :class="$page.url === '/admin/user/profile' ? 'text-yellow-600' : 'grayscale'">
                        <span class="sr-only">User</span>
                    </Link>
                </div>
            </li>
            <li>
                <div class="h-7 w-7 flex items-center justify-center relative">
                    <Link
                    :href="route('admin.notification.index')" 
                    :class="{ 'active': $page.url === '/admin/notification/index' }"
                    class="admin-notif text-gray-400 hover:text-gray-500 hasNotif"
                    >
                        <img src="/icons/nav/ic-notification.svg" class="flex-shrink-0 h-4 w-4"
                        :class="$page.url === '/admin/notification/index' ? '' : 'grayscale'">
                        <span class="sr-only">Notification</span>
                    </Link>
                </div>
            </li>
            <li>
                <div class="h-7 w-7 flex items-center">
                    <button class="text-gray-400 hover:text-gray-500" @click="$emit('logout')">
                        <img src="/icons/nav/ic-logout.svg" class="flex-shrink-0 h-4 w-4">
                        <span class="sr-only">Logout</span>
                    </button>
                </div>
            </li>
        </ol>
    </nav>
</template>

<script>
import { ChevronRightIcon, HomeIcon } from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        ChevronRightIcon,
        HomeIcon,
        Link,
    },
    emits: ["logout"],
    props: {
        pages: {
        type: Array,
        default: [],
        },
    },
};
</script>

<style>
.frm-breadcrumb .active:after {
    position: absolute;
    left: 0;
    bottom: -16px;
    content: '';
    width: 28px;
    height: 4px;
    background: #fde047;
    border-radius: 8px 8px 0px 0px;
    transform: translateX(-50%, -50%);
}
</style>