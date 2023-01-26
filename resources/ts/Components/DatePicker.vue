<template>
  <div>
    <label :for="id" class="block text-sm font-medium text-gray-700">{{
      label
    }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <DatePicker
        :uid="id"
        v-model="value"
        :disabled="disabled"
        :placeholder="placeholder"
        :timePicker="timePicker"
        :spaceConfirm="spaceConfirm"
        :enableTimePicker="enableTimePicker"
        :range="range"
        :presetRanges="presetRanges"
        inputClassName="frm__date-picker"
      />
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
import { computed } from 'vue';
import DatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";

export default {
  components: {
    DatePicker,
  },
  props: {
    modelValue: {
      default: null,
      required: true,
    },
    disabled: {
      type: Boolean,
      default: false,
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
    timePicker: {
      type: Boolean,
      default: false,
    },
    enableTimePicker: {
      type: Boolean,
      default: true,
    },
    range: {
      type: Boolean,
      default: false,
    },
    presetRanges: {
      type: Object,
      default: {},
    },
    spaceConfirm: {
      type: Boolean,
      default: false,
    },
  },
  setup(props, { emit }) {
    const value = computed({
      get() {
        return props.modelValue;
      },
      set(value) {
        emit("update:modelValue", value);
      }
    });

    return {
      value
    };
  },
};
</script>
