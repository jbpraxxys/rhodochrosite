<template>
  <admin-layout title="Reports" :breadcrumb-pages="breadcrumbs">
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto">
        <div class="py-2 align-middle inline-block min-w-full">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            "
          >
            <DataTable :headers="headers" :no-action="noAction">
              <template v-slot:body>
                <template v-for="i in 3" :key="i">
                  <tr>
                    <td
                      class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                    >
                      lorem
                    </td>
                    <td
                      v-if="!noAction"
                      class="
                        px-6
                        py-4
                        whitespace-nowrap
                        text-sm text-gray-500 text-center
                      "
                    >
                      <edit-button
                        class="mr-3"
                        route="#"
                      />
                    </td>
                  </tr>
                </template>
              </template>
            </DataTable>
          </div>
          <!-- <p
            v-if="items.length === 0"
            class="text-sm text-gray-600 text-center py-8"
          >
            No data to display.
          </p> -->
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { computed } from "vue";
import { PencilAltIcon } from "@heroicons/vue/solid";
import { Link } from "@inertiajs/inertia-vue3";
import DataTable from "@/Components/DataTable.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
export default {
  components: {
    AdminLayout,
    PencilAltIcon,
    Link,
    DataTable,
    EditButton
  },
  props: ["items"],
  setup(props) {
    /*--------------------*
     * Table Data/Init Vars
     *--------------------*/
    const items = computed(() => props.items);

    /*---------------*
     * Breadcrumbs
     *---------------*/
    const breadcrumbs = [{ name: "Reports", href: "#", current: true }];

    const headers = [
      { text: "Label", value: "Label" },
    ];

    return {
      breadcrumbs,
      // Table
      items,
      headers
    };
  },
};
</script>
