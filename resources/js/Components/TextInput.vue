<template>
  <div>
    <label :for="id" class="block text-sm font-medium text-gray-700">{{
      label
    }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input
        :type="type"
        :name="name"
        :id="id"
        class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md"
        :class="
          error
            ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500'
            : 'text-gray-800 border-gray-300 placeholder-gray-300 focus:ring-yellow-300 focus:border-yellow-300'
        "
        :placeholder="placeholder"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        aria-invalid="true"
        aria-describedby="email-error"
      />
      <div
        v-if="error"
        class="
          absolute
          inset-y-0
          right-0
          pr-3
          flex
          items-center
          pointer-events-none
        "
      >
        <ExclamationCircleIcon
          class="h-5 w-5 text-red-500"
          aria-hidden="true"
        />
      </div>
    </div>
    <p
      v-if="error"
      class="mt-2 text-sm"
      :class="error ? 'text-red-600' : 'text-gray-800'"
      id="email-error"
    >
      {{ error }}
    </p>
  </div>
</template>

<script>
import { ExclamationCircleIcon } from "@heroicons/vue/solid";

export default {
  components: {
    ExclamationCircleIcon,
  },
  props: {
    modelValue: {
      default: null,
      required: true,
    },
    error: {
      type: String,
      default: null,
    },
    placeholder: {
      type: String,
      default: null,
    },
    name: {
      type: String,
      default: null,
    },
    id: {
      type: String,
      default: null,
    },
    label: {
      type: String,
      default: null,
    },
    type: {
      type: String,
      default: "text",
    },
  },
};
</script>
