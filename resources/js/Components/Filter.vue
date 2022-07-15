<template>
  <div>
    <div class="flex justify-between">
      <div class="flex justify-start items-center">
        <template v-if="customFilters">
          <jet-button
            v-if="sidebarFilters"
            type="button"
            secondary
            class="mr-2 h-10"
            @click="open = true"
          >
            <FilterIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
            Filter
          </jet-button>
          <template v-if="buttonItems">
            <slot name="buttons" />
          </template>
        </template>
        <jet-button type="button" secondary class="h-10" @click="refresh">
          <RefreshIcon class="-ml-0.5 h-4 w-4" aria-hidden="true" />
        </jet-button>
      </div>
      <div class="flex items-center gap-3">
        <template v-if="textFilters">
          <div>
            <label for="search" class="sr-only">Search</label>
            <div class="relative rounded-md">
              <div
                class="
                  absolute
                  inset-y-0
                  left-0
                  pl-3
                  flex
                  items-center
                  pointer-events-none
                "
                aria-hidden="true"
              >
                <SearchIcon
                  class="mr-3 h-4 w-4 text-gray-600"
                  aria-hidden="true"
                />
              </div>
              <input
                v-model="searchText"
                type="text"
                name="search"
                id="search"
                class="
                  focus:ring-primary-300 focus:border-primary-300
                  block
                  w-full
                  pl-10
                  sm:text-sm
                  border-gray-300
                  rounded-md
                  h-10
                "
                placeholder="Search"
                @input="updateSearchText($event.target.value)"
              />
              <button
                v-if="searchText"
                @click="updateSearchText(null)"
                class="absolute inset-y-0 right-0 pr-3 flex items-center z-10"
              >
                <XIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
              </button>
            </div>
          </div>
        </template>

        <template v-if="rightButtonItems">
          <slot name="rightButtons" />
        </template>
      </div>
    </div>

    <TransitionRoot as="template" :show="open">
      <Dialog as="div" class="relative z-10" @close="open = false">
        <div class="fixed inset-0" />

        <div class="fixed inset-0 overflow-hidden">
          <div class="absolute inset-0 overflow-hidden">
            <div
              class="
                pointer-events-none
                fixed
                inset-y-0
                right-0
                flex
                max-w-full
                pl-10
              "
            >
              <TransitionChild
                as="template"
                enter="transform transition ease-in-out duration-500 sm:duration-700"
                enter-from="translate-x-full"
                enter-to="translate-x-0"
                leave="transform transition ease-in-out duration-500 sm:duration-700"
                leave-from="translate-x-0"
                leave-to="translate-x-full"
              >
                <DialogPanel class="pointer-events-auto w-screen max-w-sm">
                  <div
                    class="
                      flex
                      h-full
                      flex-col
                      overflow-y-scroll
                      bg-white
                      py-6
                      shadow-xl
                    "
                  >
                    <div class="px-4 sm:px-6">
                      <div class="flex items-start justify-between">
                        <DialogTitle class="text-lg font-medium text-gray-900">
                          Filter
                        </DialogTitle>
                      </div>
                    </div>
                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                      <div class="h-full flex flex-col">
                        <div class="w-full">
                          <slot name="fields" />
                        </div>
                        <div class="mt-auto w-full">
                          <div class="flex justify-end">
                            <jet-button
                              type="button"
                              secondary
                              class="mr-2"
                              @click="open = false"
                            >
                              Cancel
                            </jet-button>
                            <jet-button type="button" @click="applyFilter">
                              Apply Filter
                            </jet-button>
                          </div>
                        </div>
                      </div>
                      <!-- /End replace -->
                    </div>
                  </div>
                </DialogPanel>
              </TransitionChild>
            </div>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";
import {
  Dialog,
  DialogPanel,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import {
  XIcon,
  SelectorIcon,
  FilterIcon,
  RefreshIcon,
  SearchIcon,
} from "@heroicons/vue/outline";
import JetButton from "@/Jetstream/Button.vue";

export default {
  components: {
    SelectorIcon,
    XIcon,
    SearchIcon,
    FilterIcon,
    RefreshIcon,
    JetButton,
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
  },
  props: {
    textFilters: {
      type: Boolean,
      default: true,
    },
    rightButtonItems: {
      type: Boolean,
      default: false,
    },
    customFilters: {
      type: Boolean,
      default: true,
    },
    sidebarFilters: {
      type: Boolean,
      default: true,
    },
    buttonItems: {
      type: Boolean,
      default: false,
    },
    search: {
      type: String,
      default: null,
    },
  },
  setup(props, { emit }) {
    const open = ref(false);
    const searchText = ref(props.search);

    function refresh() {
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const tab = urlParams.get("tab");
      const data = {};

      if (tab) {
        data["tab"] = tab;
      }

      Inertia.visit(window.location.href.split("?")[0], {
        preserveState: false,
        preserveScroll: true,
        replace: true,
        data: data,
      });
    }

    function updateSearchText(value) {
      searchText.value = value;
      emit("update:searchText", value);
    }

    function applyFilter() {
      open.value = false;
      emit("update:filters");
    }

    return {
      open,
      // Filters
      searchText,
      // Functions
      refresh,
      updateSearchText,
      applyFilter,
    };
  },
};
</script>
