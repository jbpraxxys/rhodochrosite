<template>
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select
            id="tabs"
            name="tabs"
            class="
                block
                w-full
                pl-3
                pr-10
                py-2
                text-base
                border-gray-300
                focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-smi
                rounded-md
            "
        >
            <option
                v-for="tab in tabs"
                :key="tab.name"
                :selected="isSelectedTab(tab.value)"
            >
                {{ tab.name }}
            </option>
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="border-b border-gray-200 flex justify-between">
            <nav class="-mb-px flex space-x-2 px-7 py-2" aria-label="Tabs">
                <Link
                    v-for="tab in tabs"
                    :key="tab.name"
                    :href="tab.value"
                    @click.prevent="selectTab(tab.value)"
                    :class="[
                        isSelectedTab(tab.value)
                            ? 'text-primary-800'
                            : 'text-gray-900 hover:text-gray-800 hover:border-gray-200',
                        'whitespace-nowrap flex py-4 px-1 text-sm cursor-pointer relative',
                    ]"
                    href=""
                    :aria-current="tab.current ? 'page' : undefined"
                >
                    {{ tab.name }}
                    <span
                        v-if="tab.count"
                        :class="[
                            isSelectedTab(tab.value)
                                ? 'bg-primary-50 text-primary-800'
                                : 'bg-gray-100 text-gray-900',
                            'hidden ml-3 py-0.5 px-2.5 rounded-xl text-xs md:inline-block',
                        ]"
                        >{{ tab.count }}</span
                    >
                    <span
                        class="
                            bg-primary-800
                            w-full
                            inline-block
                            h-1
                            rounded-tl-lg rounded-tr-lg
                            absolute
                            -bottom-2
                            left-0
                        "
                        v-if="isSelectedTab(tab.value)"
                      />
                </Link>
            </nav>
            <div class="px-7 py-2 flex items-center">
                <template v-if="buttonItems">
                    <slot name="buttons" />
                </template>
            </div>
        </div>
    </div>
</template>

<script>
import { router } from "@inertiajs/vue3";
import pickBy from "lodash/pickBy";

export default {
    props: {
        tabs: {
            type: Array,
            default: [],
        },
        buttonItems: {
            type: Boolean,
            default: false,
        },
        activeTab: {
            type: String,
            default: null,
        },
        tabRoute: {
            type: String,
            required: true,
        },
        preserveState: {
            type: Boolean,
            default: false,
        },
    },
    setup(props, { emit }) {
        function isSelectedTab(value) {
            return props.activeTab === value;
        }

        function selectTab(value) {
            router.get(
                props.tabRoute,
                pickBy({ tab: value }), // removes falsey values
                {
                    preserveState: props.preserveState,
                    onSuccess: () => {
                        emit("update:tab", value);
                    },
                }
            );
        }

        return {
            isSelectedTab,
            selectTab,
        };
    },
};
</script>
