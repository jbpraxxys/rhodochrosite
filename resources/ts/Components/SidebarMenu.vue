<template>
    <div>
        <!-- Static sidebar for desktop -->
        <div 
            class="
                h-full 
                border-r 
                border-gray-200 
                bg-white
                overflow-auto
                fixed 
                top-0 
                z-50 
                transition-all	
                duration-300 
                shadow-2xl
                lg:left-0 
                lg:relative 
                lg:shadow-none
            "
            :class="show ? 'left-0' : 'left-[-100%]'"
            >
            <!-- close button -->
            <div class="absolute top-0 right-0 -mr-12 pt-4 z-50 block lg:hidden">
                <button
                    class="flex items-center justify-center h-8 w-8 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    @click="$emit('close')"
                >
                    <XCircleIcon class="h-8 w-8 text-gray-500" aria-hidden="true" />
                </button>
            </div>
            <!--  -->
            <div 
                class="
                    flex 
                    flex-col 
                    w-64
                    transition-all	
                    duration-300 
                "
                :class="collapse ? 'w-24' : 'w-64'"
            >
                <div class="flex items-center flex-shrink-0 px-4 py-6">
                    <img
                        class="max-w-full h-auto object-contain mx-auto"
                        src="/images/logo.png"
                        alt="PRAXXYS"
                    />
                </div>
                <div class="flex-1 flex flex-col overflow-y-auto">
                    <div class="px-4 mb-6">
                        <span
                            class="flex min-w-0 items-center justify-between space-x-3"
                        >
                            <img
                                class="w-10 h-10 bg-gray-300 rounded-full object-cover"
                                :src="page.user.profile_photo_url"
                                :alt="page.user.name"
                            />
                            <span class="flex-1 flex flex-col min-w-0" :class="collapse ? 'hidden' : ''">
                                <span
                                    class="text-gray-900 text-sm font-medium truncate"
                                    >{{ page.user.name }}</span
                                >
                                <span class="text-gray-500 text-sm truncate">{{
                                    page.user.email
                                }}</span>
                            </span>
                        </span>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="mt-3">
                        <div class="space-y-4 h-[calc(100vh-180px)] overflow-y-auto overflow-x-hidden">
                            <Disclosure
                                v-for="item in navigation"
                                :key="item.section"
                                v-slot="{ open }"
                                :defaultOpen="true"
                            >
                                <DisclosureButton 
                                    :class="collapse ? 'hidden' : ''"
                                    class="
                                        w-full 
                                        flex 
                                        items-center
                                        justify-between
                                        px-6
                                    "
                                >
                                    <span class="font-bold text-sm uppercase">{{ item.section }}</span>
                                    <img src="/icons/nav/ic-arrow-down.svg"/>
                                </DisclosureButton>
                                <DisclosurePanel>
                                    <div class="space-y-2">
                                        <template v-for="content in item.sectionContent" :key="content.name">
                                            <div v-if="!content.children">
                                                <Link
                                                    :href="content.href"
                                                    :class="[
                                                        isCurrentUrl(content.parentUrl)
                                                            ? 'text-black bg-gray-100 rounded-xl'
                                                            : 'text-gray-600 hover:text-black',
                                                        'group flex items-center text-sm font-medium rounded-md px-4 py-3.5 mx-2',
                                                    ]"
                                                    v-if="content.allowed"
                                                >
                                                    <img
                                                        :src="
                                                            isCurrentUrl(content.parentUrl)
                                                                ? content.activeIcon
                                                                : content.icon
                                                        "
                                                        :class="[
                                                            isCurrentUrl(content.parentUrl)
                                                                ? 'text-gray-500'
                                                                : 'text-gray-400 group-hover:text-gray-500',
                                                            'mr-5 flex-shrink-0 h-5 w-5',
                                                        ]"
                                                    />
                                                    <span :class="collapse ? 'hidden' : ''">{{ content.name }}</span>
                                                </Link>
                                            </div>
                                            <Disclosure
                                                as="div"
                                                v-else-if="
                                                    content.children &&
                                                    content.children.filter((e) => e.allowed).length > 0
                                                "
                                                class="space-y-2 flex flex-col"
                                                v-slot="{ open }"
                                                :defaultOpen="isCurrentUrl(content.parentUrl) ? true : false"
                                            >
                                                <DisclosureButton
                                                    :class="[
                                                        isCurrentUrl(content.parentUrl)
                                                            ? 'text-black bg-gray-100 rounded-xl'
                                                            : 'text-gray-600 hover:text-black',
                                                        'group flex items-center text-sm font-medium rounded-md px-4 py-3.5 mx-2',
                                                    ]"
                                                >
                                                    <img
                                                        :src="
                                                            isCurrentUrl(content.parentUrl)
                                                                ? content.activeIcon
                                                                : content.icon
                                                        "
                                                        :class="[
                                                            isCurrentUrl(content.parentUrl) ? '-ml-0.5' : 'ml-0',
                                                        ]"
                                                        class="
                                                            mr-5
                                                            flex-shrink-0
                                                            h-5
                                                            w-5
                                                            text-gray-500
                                                            group-hover:text-gray-500
                                                        "
                                                    />
                                                    <span :class="collapse ? 'hidden' : ''">{{ content.name }}</span>
                                                </DisclosureButton>
                                                <DisclosurePanel class="space-y-2">
                                                    <template
                                                        v-for="subItem in content.children"
                                                        :key="subItem.name"
                                                    >
                                                        <Link
                                                            :href="subItem.href"
                                                            :class="[
                                                                isCurrentUrl(subItem.parentUrl)
                                                                    ? 'text-black bg-gray-100 rounded-xl'
                                                                    : 'text-gray-600 hover:text-black',
                                                                'group flex items-center text-sm font-medium rounded-md px-4 py-3.5 mx-2',
                                                            ]"
                                                            v-if="subItem.allowed"
                                                        >
                                                            <img
                                                                :src="
                                                                    isCurrentUrl(subItem.parentUrl)
                                                                        ? subItem.activeIcon
                                                                        : subItem.icon
                                                                "
                                                                :class="[
                                                                    isCurrentUrl(subItem.parentUrl)
                                                                        ? '-ml-0.5'
                                                                        : 'ml-0',
                                                                    'mr-6 flex-shrink-0 h-3 w-3',
                                                                ]"
                                                            />
                                                            <span :class="collapse ? 'hidden' : ''">{{ subItem.name }}</span>
                                                        </Link>
                                                    </template>
                                                </DisclosurePanel>
                                            </Disclosure>
                                        </template>
                                    </div>
                                </DisclosurePanel>
                            </Disclosure>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
        
    </div>
</template>


<script setup lang="ts">
import { Link, usePage } from "@inertiajs/inertia-vue3";
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";
import {
    XCircleIcon,
} from "@heroicons/vue/24/outline";

const props = defineProps ({
    collapse: {
        type: Boolean,
        default: false
    },
    show: {
        type: Boolean,
        default: false
    }
});

const page = usePage<any>().props.value;

interface navigationType {
    section: string,
    sectionContent: generalNavType[]
}

interface generalNavType {
    name: string,
    href: string,
    parentUrl: Array<string> | string,
    icon: any,
    activeIcon: any,
    allowed?: boolean
    children?: generalNavType[]
}

const navigation: navigationType[] = [
    {
        section: "Main Navigation",
        sectionContent: [
            {
                name: "Dashboard",
                href: route("admin.settings-management.index"),
                parentUrl: "admin.settings-management*",
                icon: "/icons/nav/ic-nav-dashboard.svg",
                activeIcon: "/icons/nav/ic-nav-dashboard-active.svg",
                allowed: true,
            },
            {
                name: "Resource Module",
                href: "#",
                parentUrl: "admin.resource-module*",
                icon: "/icons/nav/ic-nav-contents.svg",
                activeIcon: "/icons/nav/ic-nav-contents-active.svg",
                allowed: true
            },
            {
                name: "Training Management",
                href: "#",
                parentUrl: "admin.training-management*",
                icon: "/icons/nav/ic-nav-training-manuals.svg",
                activeIcon: "/icons/nav/ic-nav-training-manuals-active.svg",
                allowed: true
            },
            {
                name: "User Guide",
                href: "#",
                parentUrl: "admin.user-guide*",
                icon: "/icons/nav/ic-nav-activity-logs.svg",
                activeIcon: "/icons/nav/ic-nav-activity-logs-active.svg",
                allowed: true
            },
            {
                name: "FAQs",
                href: "#",
                parentUrl: "admin.faq*",
                icon: "/icons/nav/ic-nav-faq.svg",
                activeIcon: "/icons/nav/ic-nav-faq-active.svg",
                allowed: true
            },
        ]
    },
    {
        section: "Content Management",
        sectionContent: [
            {
                name: "Resource Module",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-contents.svg",
                activeIcon: "/icons/nav/ic-nav-contents-active.svg",
                children: [
                    {
                        name: "Manuals",
                        href: "#",
                        parentUrl: "admin.manuals*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Service News",
                        href: "#",
                        parentUrl: "admin.service-news*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Flat Rates",
                        href: "#",
                        parentUrl: "admin.flat-rates*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Other Resources",
                        href: "#",
                        parentUrl: "admin.other-resources*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Series Name",
                        href: "#",
                        parentUrl: "admin.series-name*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Model Name",
                        href: "#",
                        parentUrl: "admin.model-name*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Resource Categories",
                        href: "#",
                        parentUrl: "admin.resource-categories*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Training Management",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-training-manuals.svg",
                activeIcon: "/icons/nav/ic-nav-training-manuals-active.svg",
                children: [
                    {
                        name: "Training Levels",
                        href: "#",
                        parentUrl: "admin.training-levels*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Training Categories",
                        href: "#",
                        parentUrl: "admin.training-categories*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Training Courses",
                        href: "#",
                        parentUrl: "admin.training-course*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "User Access List",
                        href: "#",
                        parentUrl: "admin.user-access-list*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Tech Channels",
                        href: "#",
                        parentUrl: "admin.tech-channels*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Language Master Data",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-language.svg",
                activeIcon: "/icons/nav/ic-nav-language-active.svg",
                children: [
                    {
                        name: "Languages",
                        href: "#",
                        parentUrl: "admin.languages*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Master Data",
                        href: "#",
                        parentUrl: "admin.master-data*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Terms and Policies",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-contents.svg",
                activeIcon: "/icons/nav/ic-nav-contents-active.svg",
                children: [
                    {
                        name: "Terms and Conditions",
                        href: "#",
                        parentUrl: "admin.terms-and-conditions*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Privacy Policies",
                        href: "#",
                        parentUrl: "admin.privacy-policy*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Fair Processing Notices",
                        href: "#",
                        parentUrl: "admin.fair-processing-notices*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "User Guide",
                href: "#",
                parentUrl: "admin.user-guide*",
                icon: "/icons/nav/ic-nav-activity-logs.svg",
                activeIcon: "/icons/nav/ic-nav-activity-logs-active.svg",
                allowed: true
            },
            {
                name: "FAQs",
                href: "#",
                parentUrl: "admin.faq*",
                icon: "/icons/nav/ic-nav-faq.svg",
                activeIcon: "/icons/nav/ic-nav-faq-active.svg",
                allowed: true
            },
        ]
    },
    {
        section: "User Management",
        sectionContent: [
            {
                name: "User Management",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-accounts.svg",
                activeIcon: "/icons/nav/ic-nav-accounts-active.svg",
                children: [
                    {
                        name: "Dealer Groups",
                        href: "#",
                        parentUrl: "admin.dealer-groups*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Country Region",
                        href: "#",
                        parentUrl: "admin.country-region*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Distributor Territory",
                        href: "#",
                        parentUrl: "admin.distributor-territory*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Accounts",
                href: "#",
                parentUrl: [
                    "admin.reports-management*",
                    "admin.settings-management*",
                    "admin.admin-management*",
                    "admin.role-permission-management*",
                ],
                icon: "/icons/nav/ic-nav-accounts.svg",
                activeIcon: "/icons/nav/ic-nav-accounts-active.svg",
                children: [
                    {
                        name: "Dealers",
                        href: "#",
                        parentUrl: "admin.reports-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Distributors",
                        href: "#",
                        parentUrl: "admin.settings-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Admins",
                        href: route("admin.admin-management.index"),
                        parentUrl: "admin.admin-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Role & Permission",
                        href: "#",
                        parentUrl: "admin.role-permission-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Activity Logs",
                href: route("admin.activity-logs.index"),
                parentUrl: "admin.activity-logs*",
                icon: "/icons/nav/ic-nav-activity-logs.svg",
                activeIcon: "/icons/nav/ic-nav-activity-logs-active.svg",
                allowed: true
            },
        ]
    }
];

const isCurrentUrl = (url: Array<string> | string): boolean => {
    if (Array.isArray(url)) {
        let value = false;

        url.forEach((href: string) => {
            if (route().current(href)) {
                value = true;
            }
        })

        return value;
    } else {
        return route().current(url);
    }
}
</script>
