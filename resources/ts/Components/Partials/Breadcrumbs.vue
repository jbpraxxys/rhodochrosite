<template>
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-3">
            <li>
                <div>
                    <Link
                        :href="route('admin.dashboard.index')"
                        class="text-gray-500 hover:text-gray-600 flex items-center"
                    >
                        <img src="/icons/nav/ic-dashboard.svg" alt="dashboard">
                        <span class="ml-2 text-sm">Dashboard</span>
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
                        class="ml-2 text-sm font-medium text-gray-500 hover:text-gray-700"
                        :aria-current="page.current ? 'page' : undefined"
                        >{{ page.name }}
                    </Link>
                </div>
            </li>
        </ol>
    </nav>
</template>

<script>
import { ChevronRightIcon, HomeIcon } from "@heroicons/vue/24/solid";
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        ChevronRightIcon,
        HomeIcon,
        Link,
    },
    props: {
        pages: {
            type: Array,
            default: [],
        },
    },
};
</script>
