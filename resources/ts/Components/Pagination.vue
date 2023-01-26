<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div v-if="items.total > 3">
    <div class="bg-white px-4 py-3 flex items-center justify-between sm:px-6">
      <div class="flex-1 flex justify-between sm:hidden">
        <a
          href="#"
          class="
            relative
            inline-flex
            items-center
            px-4
            py-2
            border border-gray-300
            text-sm
            font-medium
            rounded-md
            text-gray-700
            bg-white
            hover:bg-gray-50
          "
        >
          Previous
        </a>
        <a
          href="#"
          class="
            ml-3
            relative
            inline-flex
            items-center
            px-4
            py-2
            border border-gray-300
            text-sm
            font-medium
            rounded-md
            text-gray-700
            bg-white
            hover:bg-gray-50
          "
        >
          Next
        </a>
      </div>
      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div class="sm:flex sm:items-center">
          <selector
            :options="options"
            :modelValue="rows"
            @update:modelValue="updatePagination"
            id="pagination-id"
            name="pagination-name"
            class="w-[auto] mr-4"
            placeholder="10 Rows"
          />

          <p class="text-sm text-gray-700">
            Showing
            {{ " " }}
            <span class="font-medium">{{ items.from }}</span>
            {{ " " }}
            to
            {{ " " }}
            <span class="font-medium">{{ items.to }}</span>
            {{ " " }}
            of
            {{ " " }}
            <span class="font-medium">{{ items.total }}</span>
            {{ " " }}
            results
          </p>
        </div>
        <div>
          <nav
            class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
            aria-label="Pagination"
          >
            <template v-for="(link, key) in items.links" :key="link">
              <template v-if="key === 0">
                <Link
                  v-if="key === 0"
                  :href="items.first_page_url"
                  class="
                    relative
                    inline-flex
                    items-center
                    px-2
                    py-2
                    rounded-l-md
                    border border-gray-300
                    bg-white
                    text-sm
                    font-medium
                    text-gray-500
                    hover:bg-gray-50
                  "
                >
                  <span class="sr-only">First</span>
                  <ChevronDoubleLeftIcon class="h-4 w-4" aria-hidden="true" />
                </Link>

                <Link
                  v-if="key === 0"
                  :href="link.url"
                  class="
                    relative
                    inline-flex
                    items-center
                    px-2
                    py-2
                    border border-gray-300
                    bg-white
                    text-sm
                    font-medium
                    text-gray-500
                    hover:bg-gray-50
                  "
                >
                  <span class="sr-only">Previous</span>
                  <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                </Link>
              </template>

              <template v-else-if="key === items.links.length - 1">
                <Link
                  :href="link.url"
                  class="
                    relative
                    inline-flex
                    items-center
                    px-2
                    py-2
                    border border-gray-300
                    bg-white
                    text-sm
                    font-medium
                    text-gray-500
                    hover:bg-gray-50
                  "
                >
                  <span class="sr-only">Next</span>
                  <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                </Link>

                <Link
                  :href="items.last_page_url"
                  class="
                    relative
                    inline-flex
                    items-center
                    px-2
                    py-2
                    rounded-r-md
                    border border-gray-300
                    bg-white
                    text-sm
                    font-medium
                    text-gray-500
                    hover:bg-gray-50
                  "
                >
                  <span class="sr-only">Last</span>
                  <ChevronDoubleRightIcon class="h-4 w-4" aria-hidden="true" />
                </Link>
              </template>

              <Link
                v-else
                :href="link.url"
                aria-current="page"
                :class="
                  link.active
                    ? 'z-10 bg-gray-50 border-gray-500 text-gray-500 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                    : 'bg-white  border-gray-300  text-gray-400  hover:bg-gray-50  relative  inline-flex  items-center  px-4  py-2  border  text-sm  font-medium'
                "
              >
                {{ link.label }}
              </Link>
            </template>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Selector from "@/Components/Selector.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ChevronLeftIcon, ChevronRightIcon, ChevronDoubleLeftIcon, ChevronDoubleRightIcon } from "@heroicons/vue/24/solid";
import { ref } from "vue";

export default {
  components: {
    Link,
    ChevronDoubleLeftIcon,
    ChevronDoubleRightIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
    Selector,
  },
  props: {
    items: Object,
    rows: {
      type: Number,
      default: 10,
    },
  },
  setup(props) {
    const rows = ref(props.rows);

    const options = [
      {
        id: 5,
        value: "5 Rows",
      },
      {
        id: 25,
        value: "25 Rows",
      },
      {
        id: 50,
        value: "50 Rows",
      },
      {
        id: 100,
        value: "100 Rows",
      },
    ];

    const updatePagination = (value) => {
      const params = route().params;
      const data = params;

      if (value) {
        data.rows = value;
      } else {
        delete params.rows;
      }

      if (params.page) {
        delete params.page;
      }

      Inertia.replace(route(route().current(), params), {
        data: data,
        replace: false,
        preserveState: true,
        preserveScroll: true,
      });

      rows.value = value;
    };

    return {
      rows,
      options,
      updatePagination,
    };
  },
};
</script>
