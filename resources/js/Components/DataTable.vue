<template>
  <div class="frm-table"
  :class="[ tableClass ]">
    <div class="align-middle inline-block w-full">
      <div class="overflow-x-auto scrollbar-style-horizontal border-t border-b border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
          <!-- Header Slot -->
          <slot name="header">
            <thead class="bg-gray-50">
              <tr>
                <th
                  v-for="(header, index) in headers"
                  :key="`th-${index}`"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                    whitespace-nowrap
                  "
                  :width="header.width"
                >
                  {{ header.text }}
                </th>
                <th
                  v-if="!noAction"
                  class="
                    px-6
                    py-3
                    text-center text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                    whitespace-nowrap
                  "
                >
                  {{ actionText }}
                </th>
              </tr>
            </thead>
          </slot>
          <!-- Body Slot -->
          <tbody class="bg-white divide-y divide-gray-200">
            <slot name="body"/>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</template>

<script>

import { SelectorIcon } from "@heroicons/vue/24/outline";


export default {
  components: {
    SelectorIcon,
  },

  props: {
    headers: {
      type: [ Array, null ],
    },

    /* Text for empty list */
    tableClass: {
        default: null,
        type: String
    },

    /* Text for empty list */
    emptyText: {
        default: 'No results found.',
        type: String
    },

    /* Hide action column */
    noAction: {
        default: false,
        type: Boolean
    },

     /* Action header text */
    actionText: {
        default: 'Action',
        type: String
    },
  },
};
</script>
