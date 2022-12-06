<template>
    <div>
        <!-- Static sidebar for desktop -->
        <div 
        class="h-full border-r border-gray-200 bg-white
        fixed top-0 z-50 transition-all	duration-300 shadow-2xl
        lg:left-0 lg:relative lg:shadow-none"
        :class="show ? 'left-0' : 'left-[-100%]'">
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
            <div class="flex flex-col w-64">
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
                                :src="$page.props.user.profile_photo_url"
                                :alt="$page.props.user.name"
                            />
                            <span class="flex-1 flex flex-col min-w-0">
                                <span
                                    class="text-gray-900 text-sm font-medium truncate"
                                    >{{ $page.props.user.name }}</span
                                >
                                <span class="text-gray-500 text-sm truncate">{{
                                    $page.props.user.email
                                }}</span>
                            </span>
                        </span>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="mt-3">
                        <div
                            class="space-y-4"
                            role="group"
                            aria-labelledby="desktop-main-headline"
                        >
                            <template v-for="item in navigation" :key="item.name">
                                <div v-if="!item.children">
                                    <Link
                                        :href="item.href"
                                        :class="[
                                            isCurrentUrl(item.parentUrl)
                                                ? 'text-black pl-0'
                                                : 'text-gray-600 hover:text-black pl-8',
                                            'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                                        ]"
                                        :aria-current="item.current ? 'page' : undefined"
                                        v-if="item.allowed"
                                    >
                                        <span
                                            class="
                                                bg-black
                                                w-1.5
                                                inline-block
                                                h-5
                                                mr-6
                                                rounded-tr rounded-br
                                            "
                                            v-if="isCurrentUrl(item.parentUrl)"
                                        />
                                        <img
                                            :src="
                                                isCurrentUrl(item.parentUrl)
                                                    ? item.activeIcon
                                                    : item.icon
                                            "
                                            :class="[
                                                isCurrentUrl(item.parentUrl)
                                                    ? 'text-gray-500'
                                                    : 'text-gray-400 group-hover:text-gray-500',
                                                'mr-5 flex-shrink-0 h-5 w-5',
                                            ]"
                                        />
                                        {{ item.name }}
                                    </Link>
                                </div>
                                <Disclosure
                                    as="div"
                                    v-else-if="
                                        item.children &&
                                        item.children.filter((e) => e.allowed).length > 0
                                    "
                                    class="space-y-4"
                                    v-slot="{ open }"
                                    :defaultOpen="true"
                                >
                                    <DisclosureButton
                                        :class="[
                                            isCurrentUrl(item.parentUrl)
                                                ? 'text-black pl-0'
                                                : 'text-gray-600 hover:text-black pl-8',
                                            'group w-full flex items-center pr-1 py-2 text-left text-sm font-medium focus:outline-none focus:ring-2 focus:ring-gray-300',
                                        ]"
                                    >
                                        <span
                                            class="
                                                bg-black
                                                w-1.5
                                                inline-block
                                                h-5
                                                mr-7
                                                rounded-tr rounded-br
                                            "
                                            v-if="isCurrentUrl(item.parentUrl)"
                                        />
                                        <img
                                            :src="
                                                isCurrentUrl(item.parentUrl)
                                                    ? item.activeIcon
                                                    : item.icon
                                            "
                                            :class="[
                                                isCurrentUrl(item.parentUrl) ? '-ml-0.5' : 'ml-0',
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
                                        <span class="flex-1 text-sm">
                                            {{ item.name }}
                                        </span>
                                    </DisclosureButton>
                                    <DisclosurePanel class="space-y-4">
                                        <template
                                            v-for="subItem in item.children"
                                            :key="subItem.name"
                                        >
                                            <Link
                                                :href="subItem.href"
                                                :class="[
                                                    isCurrentUrl(subItem.parentUrl)
                                                        ? 'text-black pl-0'
                                                        : 'text-gray-600 hover:text-black pl-9',
                                                    'group flex items-center px-2 py-2 text-sm font-medium rounded-md',
                                                ]"
                                                :aria-current="subItem.current ? 'page' : undefined"
                                                v-if="subItem.allowed"
                                            >
                                                <span
                                                    class="
                                                        bg-black
                                                        w-1.5
                                                        inline-block
                                                        h-5
                                                        mr-8
                                                        rounded-tr rounded-br
                                                    "
                                                    v-if="isCurrentUrl(subItem.parentUrl)"
                                                />
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
                                                {{ subItem.name }}
                                            </Link>
                                        </template>
                                    </DisclosurePanel>
                                </Disclosure>
                            </template>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
        
    </div>
</template>


<script>
import { Link } from "@inertiajs/inertia-vue3";
import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";
import {
    XCircleIcon,
} from "@heroicons/vue/24/outline";

export default {
    components: {
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        XCircleIcon,
        Link
    },
    props: {
        show: {
			type: Boolean,
			default: false,
		},
    },
    setup() {

        const navigation = [
            {
                name: "Dashboard",
                href: "#",
                parentUrl: [
                    "admin.dashboard*",
                ],
                icon: "/icons/nav/ic-nav-dashboard.svg",
                activeIcon: "/icons/nav/ic-nav-dashboard-active.svg",
                children: [
                    {
                        name: "Overview",
                        href: route("admin.dashboard.index"),
                        parentUrl: "admin.dashboard*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Contents",
                href: "#",
                parentUrl: ["admin.cms*"],
                icon: "/icons/nav/ic-nav-contents.svg",
                activeIcon: "/icons/nav/ic-nav-contents-active.svg",
                children: [
                    {
                        name: "Pages",
                        href: route("admin.cms.index"),
                        parentUrl: "admin.cms*",
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
                    "admin.admin-management*",
                    "admin.role-permission-management*",
                ],
                icon: "/icons/nav/ic-nav-accounts.svg",
                activeIcon: "/icons/nav/ic-nav-accounts-active.svg",
                children: [
                    {
                        name: "Admins",
                        href: route("admin.admin-management.index"),
                        parentUrl: "admin.admin-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                    {
                        name: "Roles",
                        href: route("admin.role-permission-management.index"),
                        parentUrl: "admin.role-permission-management*",
                        icon: "/icons/nav/ic-nav-bullet.svg",
                        activeIcon: "/icons/nav/ic-nav-bullet-active.svg",
                        allowed: true
                    },
                ],
            },
            {
                name: "Reports",
                href: route("admin.reports-management.index"),
                parentUrl: "admin.reports-management*",
                icon: "/icons/nav/ic-nav-reports.svg",
                activeIcon: "/icons/nav/ic-nav-reports-active.svg",
                allowed: true
            },
            {
                name: "Settings",
                href: route("admin.settings-management.index"),
                parentUrl: "admin.settings-management*",
                icon: "/icons/nav/ic-nav-settings.svg",
                activeIcon: "/icons/nav/ic-nav-settings-active.svg",
                allowed: true
            },
            {
                name: "Activity Logs",
                href: route("admin.activity-logs.index"),
                parentUrl: "admin.activity-logs*",
                icon: "/icons/nav/ic-nav-activity-logs.svg",
                activeIcon: "/icons/nav/ic-nav-activity-logs-active.svg",
                allowed: true
            },
        ];

        return {
            navigation
        };
    },
    methods: {
        isCurrentUrl(url) {
            if (Array.isArray(url)) {
                let value = false;

                url.forEach((href, index) => {
                    if (route().current(href)) {
                        value = true;
                    }
                });

                return value;
            } else {
                return route().current(url);
            }

            // const currentUrl = this.$page.url.substr(1);
            // return href.endsWith(currentUrl);
        },
    },
};
</script>
