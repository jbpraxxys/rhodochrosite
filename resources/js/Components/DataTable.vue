<template>
  <div class="flex flex-col frm-table"
  :class="[ tableClass ]">
    <div class="py-2 align-middle inline-block w-full">
      <div class="overflow-x-auto pb-2 scrollbar-style-horizontal">
        <table class="min-w-full">
          <!-- Header Slot -->
          <slot name="header">
            <thead class="border-b border-dark-200">
              <tr>
                <th
                  v-for="(header, index) in headers"
                  :key="`th-${index}`"
                  class="py-4 text-xs text-white font-normal border-l border-dark-200 first:border-0"
                >
                  {{ header.text }}
                </th>
                <th
                  v-if="!noAction"
                  class="py-4 text-xs text-white font-normal border-l border-dark-200"
                >
                  {{ actionText }}
                </th>
              </tr>
            </thead>
          </slot>

          <!-- Body Slot -->
          <tbody>
            <slot name="body"/>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</template>

<script>
export default {
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
