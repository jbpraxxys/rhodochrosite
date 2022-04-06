<template>
  <admin-layout title="CMS" :breadcrumb-pages="breadcrumbs">
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
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-center text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Label
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-center text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Last Updated
                  </th>
                  <th
                    scope="col"
                    class="
                      relative
                      px-6
                      py-3
                      text-center text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="page in items" :key="page.slug">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-center text-gray-900">
                      {{ page.label }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-center text-gray-900">
                      {{ page.updated_at }}
                    </div>
                  </td>
                  <td
                    class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-center text-sm
                      font-medium
                    "
                  >
                    <!-- Edit Button -->
                    <Link
                      :href="route('admin.cms.edit', page.id)"
                      class="
                        mx-1
                        inline-flex
                        items-center
                        p-1
                        border border-transparent
                        rounded-full
                        shadow
                        text-gray-700
                        bg-yellow-300
                        hover:bg-yellow-200
                        focus:outline-none
                        focus:ring-2
                        focus:ring-offset-2
                        focus:ring-yellow-300
                      "
                    >
                      <PencilAltIcon class="p-0.5 h-5 w-5" aria-hidden="true" />
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <p
            v-if="items.length === 0"
            class="text-sm text-gray-600 text-center py-8"
          >
            No data to display.
          </p>
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
export default {
  components: {
    AdminLayout,
    PencilAltIcon,
    Link,
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
    const breadcrumbs = [{ name: "CMS", href: "#", current: true }];

    return {
      breadcrumbs,
      // Table
      items,
    };
  },
};
</script>
