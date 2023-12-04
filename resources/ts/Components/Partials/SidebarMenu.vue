<template>
    <div 
    class="fixed z-50 h-screen max-h-screen bg-white border-r border-gray-100 overflow-auto transition-all duration-500 scroll-mr-1 snap-start"
    :class="[
        expanded ? 'w-60' : '',
        expanded ? '' : mouseenter ? 'w-60' : 'w-[84px]'
    ]">
        <div class="p-8">
            <div class="flex items-center space-x-3">
                <img 
                class="flex-shrink-0"
                src="/icons/logo.png" 
                alt="logo">
                <!-- <transition
                enter-active-class="transition duration-300 ease-out delay-300"
                enter-from-class="transform opacity-0"
                enter-to-class="transform opacity-100"
                leave-active-class="transition duration-300 ease-out"
                leave-from-class="transform opacity-100"
                leave-to-class="transform opacity-0"
                >
                    <div class="w-full" v-if="expanded ? true : mouseenter">
                        <p class="text-sm font-semibold text-primary-600 whitespace-nowrap">One Roadway</p>
                        <p class="text-sm font-semibold text-gray-400 whitespace-nowrap">Trucking Services, Inc.</p>
                    </div>
                </transition> -->
            </div>
        </div>

        <div class="p-4 space-y-8">
            <div v-for="item in navigation" :key="item.name">
                <transition
                enter-active-class="transition duration-300 ease-out delay-300"
                enter-from-class="transform opacity-0"
                enter-to-class="transform opacity-100"
                leave-active-class="transition duration-300 ease-out"
                leave-from-class="transform opacity-100"
                leave-to-class="transform opacity-0"
                >
                    <p
                    v-if="expanded ? true : mouseenter"
                    class="text-xs font-semibold uppercase text-gray-600 mb-2 whitespace-nowrap"
                    >
                        {{ item.name }}
                    </p>
                </transition>
                <div v-for="menu in item.children">
                    <template v-if="!menu.children">
                        <a
                        :href="menu.href"
                        class="flex items-center w-full py-3 px-4 rounded-lg transition hover:bg-primary-50"
                        :class="[
                            isCurrentUrl(menu.parentUrl)
                                ? 'bg-primary-50 text-primary-500'
                                : 'text-gray-400',
                        ]">
                            <component
                                :is="menu.icon"
                                aria-hidden="true"
                                class="w-5 h-5 flex-shrink-0"
                            />
                            <transition
                            enter-active-class="transition duration-300 ease-out delay-300"
                            enter-from-class="transform opacity-0"
                            enter-to-class="transform opacity-100"
                            leave-active-class="transition duration-300 ease-out"
                            leave-from-class="transform opacity-100"
                            leave-to-class="transform opacity-0"
                            >
                                <span 
                                v-if="expanded ? true : mouseenter"
                                class="text-sm ml-3 whitespace-nowrap" 
                                >
                                    {{ menu.name }}
                                </span>
                            </transition>
                        </a>
                    </template>

                    <template v-else>
                        <Disclosure
                        as="div"
                        :defaultOpen="true">
                            <DisclosureButton
                            :class="[
                                'flex items-center py-3 px-4 w-full text-gray-400',
                            ]">
                                <component
                                    :is="menu.icon"
                                    aria-hidden="true"
                                    class="w-5 h-5 flex-shrink-0 mr-3"
                                />
                                <transition
                                enter-active-class="transition duration-300 ease-out delay-300"
                                enter-from-class="transform opacity-0"
                                enter-to-class="transform opacity-100"
                                leave-active-class="transition duration-300 ease-out"
                                leave-from-class="transform opacity-100"
                                leave-to-class="transform opacity-0"
                                >
                                    <span class="text-sm ml-3" v-if="expanded ? true : mouseenter">
                                        {{ menu.name }}
                                    </span>
                                </transition>
                                <ChevronDownIcon 
                                class="w-5 h-5 ml-auto"/>
                            </DisclosureButton>
                            <DisclosurePanel>
                                <div v-for="submenu in menu.children">
                                    <a
                                    :href="submenu.href"
                                    class="flex w-full py-3 pl-12 pr-4 text-sm text-gray-400"
                                    :class="[
                                        isCurrentUrl(submenu.href)
                                            ? 'text-white bg-gray-800'
                                            : 'text-gray-400 hover:text-white',
                                        'group flex items-center py-3 text-sm rounded-lg pl-12',
                                    ]"

>
                                        {{ submenu.name }}
                                        <!-- <span class="ml-auto">
                                            13
                                        </span> -->
                                    </a>
                                </div>
                            </DisclosurePanel>
                        </Disclosure>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";

import {
    RectangleGroupIcon,
    BriefcaseIcon,
    FolderIcon,
    CheckCircleIcon,
    ChatBubbleBottomCenterTextIcon,
    DocumentDuplicateIcon,
    DocumentTextIcon,
    TruckIcon,
    MapPinIcon,
    MapIcon,
    WrenchScrewdriverIcon,
    UserGroupIcon,
    BanknotesIcon,
    NewspaperIcon,
    ClockIcon,
    ChartBarIcon,
    ChevronDownIcon,
} from "@heroicons/vue/24/outline";

defineProps({
    expanded: {
        type: Boolean,
        default: true
    },
    mouseenter: {
        type: Boolean,
        default: true
    }
})


interface generalNavType {
    name: string,
    href: string,
    parentUrl: Array<string> | string,
    icon: any,
    allowed?: boolean,
    children?: generalNavType[]
}

const navigation: generalNavType[] = [
    {
        name: "Content Management",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Pages',
                href: route('admin.cms.index'),
                parentUrl: "admin.cms.*",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Menu",
        href: "#",
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Dashboard',
                href: '#',
                parentUrl: "#",
                icon: RectangleGroupIcon,
                allowed: true,
            },
            {
                name: 'Trip Management',
                href: '#',
                parentUrl: "#",
                icon: BriefcaseIcon,
                allowed: true,
            },
            {
                name: 'Cash Liquidation',
                href: '#',
                parentUrl: "#",
                icon: FolderIcon,
                allowed: true,
            },
            {
                name: 'Doc Liquidation',
                href: '#',
                parentUrl: "#",
                icon: FolderIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Finance Management",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Trip Demurrage',
                href: '#',
                parentUrl: "#",
                icon: CheckCircleIcon,
                allowed: true,
            },
            {
                name: 'Notice to Bill',
                href: '#',
                parentUrl: "#",
                icon: ChatBubbleBottomCenterTextIcon,
                allowed: true,
            },
            {
                name: 'Manual Billing',
                href: '#',
                parentUrl: "#",
                icon: DocumentDuplicateIcon,
                allowed: true,
            },
            {
                name: 'Invoice',
                href: '#',
                parentUrl: "#",
                icon: DocumentTextIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Content Management",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Vehicles',
                href: '#',
                parentUrl: "#",
                icon: TruckIcon,
                allowed: true,
            },
            {
                name: 'Distance Matrix',
                href: '#',
                parentUrl: "#",
                icon: MapPinIcon,
                allowed: true,
            },
            {
                name: 'Hub/Origin',
                href: '#',
                parentUrl: "#",
                icon: MapIcon,
                allowed: true,
            },
            {
                name: 'Other Setup',
                href: '#',
                parentUrl: "#",
                icon: WrenchScrewdriverIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "HR Management",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Employees',
                href: '#',
                parentUrl: "#",
                icon: UserGroupIcon,
                allowed: true,
            },
            {
                name: 'Payroll',
                href: '#',
                parentUrl: "#",
                icon: BanknotesIcon,
                allowed: true,
            },
            {
                name: 'Incident Reports',
                href: '#',
                parentUrl: "#",
                icon: NewspaperIcon,
                allowed: true,
            },
            {
                name: 'Crew Attendance',
                href: '#',
                parentUrl: "#",
                icon: ClockIcon,
                allowed: true,
            },
        ]
    },
    {
        name: "Account Management",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Admins',
                href: route("admin.admin-management.index"),
                parentUrl: "admin.admin-management.*",
                icon: UserGroupIcon,
                allowed: true,
            },
            {
                name: 'Roles',
                href: route("admin.role-permission-management.index"),
                parentUrl: "admin.role-permission-management.*",
                icon: FolderIcon,
                allowed: true,
            }
        ]
    },
    {
        name: "Others",
        href: '#',
        parentUrl: "#",
        icon: '',
        allowed: true,
        children: [
            {
                name: 'Reports',
                href: '#',
                parentUrl: "#",
                icon: ChartBarIcon,
                allowed: true,
            },
            {
                name: 'Logs',
                href: route("admin.activity-logs.index"),
                parentUrl: "#",
                icon: DocumentTextIcon,
                allowed: true,
            }
        ]
    },
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