<template>
    <div class="flex items-center space-x-2">
        <Link 
        :href="route('admin.notification.index')"
        class="relative w-10 h-10 p-2.5 rounded-full bg-gray-100">
            <component
                :is="BellIcon"
                aria-hidden="true"
                class="h-5 w-5 text-gray-600"
            />
            <span class="absolute top-2.5 right-2.5 bg-primary-600 w-2 h-2 rounded-full"></span>
        </Link>
        <div class="h-10">
            <Popover class="relative">
                <PopoverButton class="focus:outline-none">
                    <div class="w-10 h-10">
                        <img
                            class="w-10 h-10 rounded-full"
                            :src="$page.props.auth.user.profile_photo_url"
                            alt="profile_url"
                        />
                    </div>
                </PopoverButton>

                <PopoverPanel class="absolute top-16 right-0 z-10 w-60 py-1 bg-white rounded-lg border border-gray-100 shadow-md">
                    <div class="flex items-center space-x-3 py-3 px-6">
                        <img
                            class="w-10 h-10 rounded-full flex-shrink-0"
                            :src="$page.props.auth.user.profile_photo_url"
                            alt="profile_url"
                        />
                        <div>
                            <p class="text-sm font-semibold">{{ $page.props.auth.user.name }}</p>
                            <p class="text-sm">{{ $page.props.auth.user.title }}</p>
                        </div>
                    </div>
                    <div class="divider border-t border-gray-100 my-1"></div>
                    <div class="">
                        <Link 
                        :href="route('admin.profile.show')"
                        class="flex items-center py-3 px-6 text-sm">
                            <component
                                :is="UserIcon"
                                aria-hidden="true"
                                class="h-5 w-5 mr-3 text-primary-600"
                            />
                            Profile
                        </Link>
                        <Link class="flex items-center py-3 px-6 text-sm">
                            <component
                                :is="LockClosedIcon"
                                aria-hidden="true"
                                class="h-5 w-5 mr-3 text-primary-600"
                            />
                            Security
                        </Link>
                    </div>
                    <div class="divider border-t border-gray-100 my-1"></div>
                    <div class="" @click="logout">
                        <Link class="flex items-center py-3 px-6 text-sm">
                            <component
                                :is="ArrowRightOnRectangleIcon"
                                aria-hidden="true"
                                class="h-5 w-5 mr-3 text-primary-600"
                            />
                            Logout
                        </Link>
                    </div>
                </PopoverPanel>
            </Popover>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    LockClosedIcon,
    BellIcon,
    UserIcon,
    ArrowRightOnRectangleIcon
} from "@heroicons/vue/24/outline";
import { 
    Popover, 
    PopoverButton, 
    PopoverPanel 
} from '@headlessui/vue'

import { router } from "@inertiajs/vue3";

const logout = () => {
    router.post(route("admin.logout"));
}
</script>