<template>
  <div>
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
          :selected="isSelectedTab(tab)"
        >
          {{ tab.name }}
        </option>
      </select>
    </div>
    <div class="hidden sm:block">
      <div class="border-b border-gray-200 flex justify-between">
        <nav class="-mb-px flex space-x-2 px-7" aria-label="Tabs">
          <Link
            v-for="tab in tabs"
            :key="tab.name"
            @click.prevent="selectTab(tab.value)"
            :class="[
              isSelectedTab(tab)
                ? 'border-yellow-400 text-yellow-400'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200',
              'whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm',
            ]"
            :aria-current="tab.current ? 'page' : undefined"
          >
            {{ tab.name }}
            <span
              v-if="tab.count"
              :class="[
                isSelectedTab(tab)
                  ? 'bg-yellow-100 text-yellow-500'
                  : 'bg-gray-100 text-gray-900',
                'hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block',
              ]"
              >{{ tab.count }}</span
            >
          </Link>
        </nav>
        <div class="px-7 flex items-center">
          <!-- Input Fields -->
          <div class="px-3" v-if="inputItems">
            <slot name="inputs"></slot>
          </div>

          <!-- Buttons -->
          <div v-if="buttonItems">
            <slot name="buttons"></slot>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
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
    inputItems: {
      type: Boolean,
      default: false,
    },
    activeTab: {
      type: String,
      default: null,
    },
    preserveState: {
      type: Boolean,
      default: false,
    },
    pageRoute: {
      type: String,
      required: true,
    },
  },
  setup(props, { emit }) {
    function isSelectedTab(tab) {
      return props.activeTab == tab.value || tab.current;
    }

    function selectTab(value) {
      emit("update:activeTab", value);

      Inertia.get(
        props.pageRoute,
        pickBy({ tab: value }), // removes falsey values
        {
          preserveState: props.preserveState,
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
