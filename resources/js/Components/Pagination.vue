<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div v-if="items.total > 3">
    <div
      class="
        bg-white
        px-4
        py-3
        flex
        items-center
        justify-between
        border-t border-gray-200
        sm:px-6
      "
    >
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
        <div>
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
            <template v-for="(link, key) in items.links">
              <Link
                v-if="key === 0"
                :href="link.url"
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
                <span class="sr-only">Previous</span>
                <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
              </Link>
              <Link
                v-else-if="key === items.links.length - 1"
                :href="link.url"
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
                <span class="sr-only">Next</span>
                <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
              </Link>
              <Link
                v-else
                :href="link.url"
                aria-current="page"
                :class="
                  link.active
                    ? 'z-10 bg-yellow-50 border-yellow-200 text-yellow-400 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                    : 'bg-white  border-gray-300  text-gray-500  hover:bg-gray-50  relative  inline-flex  items-center  px-4  py-2  border  text-sm  font-medium'
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
import { Link } from "@inertiajs/inertia-vue3";
import { ChevronLeftIcon, ChevronRightIcon } from "@heroicons/vue/24/solid";

export default {
  components: {
    Link,
    ChevronLeftIcon,
    ChevronRightIcon,
  },
  props: {
    items: Object,
  },
};
</script>
