<template>
  <div>
    <!-- Table -->
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <template v-for="item in items" :key="item.id">
            <th
              v-if="item.summary_field"
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
              {{ item.label }}
            </th>
          </template>
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
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-center text-gray-900">Label</div>
          </td>
          <td
            class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"
          >
            Actions
          </td>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <button
        type="button"
        class="
          inline-flex
          items-center
          px-3
          py-1.5
          border border-transparent
          text-xs
          font-medium
          rounded-full
          shadow
          text-gray-800
          bg-yellow-300
          hover:bg-yellow-200
          focus:outline-none
          focus:ring-2
          focus:ring-offset-2
          focus:ring-yellow-300
        "
      >
        <PlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
        Add
      </button>
    </div>
    <!-- Table -->
    <template v-for="item in items" :key="`${item.id}`">
      <!-- Text -->
      <div
        v-if="item.type === 'text' || item.type === 'url'"
        class="col-span-5"
      >
        <text-input
          v-model="form[item.id]"
          :label="item.label"
          :id="`${item.id}`"
        />
        <p class="text-gray-400 text-sm mt-1">
          {{ item.description }}
        </p>
      </div>

      <!-- Images -->
      <div class="col-span-5" v-if="item.type === 'image'">
        <label :for="id" class="block text-sm font-medium text-gray-700 mb-1">{{
          item.label
        }}</label>
        <dropzone
          v-model:path="form[item.id]"
          v-model:file="form[item.id + '_file']"
          :label="item.label"
          :id="`${item.id}`"
          :description="item.description"
        ></dropzone>
      </div>
    </template>
  </div>
</template>

<script>
import { PlusIcon } from "@heroicons/vue/solid";
import { ref } from "vue";
import TextInput from "@/Components/TextInput.vue";
import Dropzone from "@/Components/Dropzone.vue";
export default {
  components: {
    PlusIcon,
    TextInput,
    Dropzone,
  },
  props: {
    items: {
      type: Array,
      required: true,
    },
    id: {
      type: String,
      required: true,
    },
  },
  setup(props) {
    const models = props.items.map((item) => {
      let obj = {};
      obj[item.id] = null;
      return obj;
    });
    const form = ref(models);
    console.log(models);
    return {
      form,
    };
  },
};
</script>
