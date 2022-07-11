<template>
  <div class="flex flex-col" :class="[tableClass]">
    <div class="-my-2 overflow-x-auto">
      <div class="py-2 align-middle inline-block min-w-full">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <!-- Header Slot -->
            <slot name="header">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    v-for="(header, index) in headers"
                    :key="`th-${index}`"
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    {{ header.text }}
                  </th>
                  <th
                    v-if="!noAction"
                    scope="col"
                    class="
                      relative
                      px-6
                      py-3
                      text-right text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    {{ actionText }}
                  </th>
                </tr>
              </thead>
            </slot>

            <!-- Body Slot -->
            <tbody class="bg-white divide-y divide-gray-200">
              <slot name="body" />
            </tbody>
          </table>
        </div>
        <p v-if="isEmpty" class="text-sm text-gray-600 text-center py-8">
          {{ emptyText }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    headers: {
      type: [Array, null],
    },

    /* Text for empty list */
    tableClass: {
      default: null,
      type: String,
    },

    /* Text for empty list */
    isEmpty: {
      default: true,
      type: Boolean,
    },
    emptyText: {
      default: "No data to display.",
      type: String,
    },

    /* Hide action column */
    noAction: {
      default: false,
      type: Boolean,
    },

    /* Action header text */
    actionText: {
      default: "Action",
      type: String,
    },
  },
};
</script>
