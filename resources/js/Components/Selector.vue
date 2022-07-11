<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <Listbox
    as="div"
    :modelValue="modelValue"
    :disabled="disabled"
    @update:model-value="$emit('update:modelValue', $event.id)"
  >
    <ListboxLabel class="block text-sm font-medium text-gray-900">
      {{ label }}
    </ListboxLabel>
    <div :class="`{{ label ? 'mt-1' : '' }} relative`">
      <ListboxButton
        class="
          relative
          w-full
          bg-white
          border
          rounded-md
          shadow-sm
          pl-3
          pr-10
          py-2.5
          text-left
          cursor-default
          focus:outline-none focus:ring-1
          sm:text-sm
          disabled:bg-gray-100
        "
        :class="
          error
            ? 'focus:ring-red-500 focus:border-red-500 border-red-500'
            : 'focus:ring-gray-900 focus:border-gray-900 border-gray-300'
        "
      >
        <span v-if="selected" class="block truncate h-5 text-sm">{{
          selected
        }}</span>
        <span v-else class="block h-5">{{ placeholder }}</span>
      </ListboxButton>
      <template v-if="modelValue && !disabled">
        <span
          @click="clearValue"
          class="
            absolute
            inset-y-0
            right-0
            flex
            items-center
            pr-2
            z-50
            cursor-pointer
          "
          title="Clear Filter"
        >
          <XIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
      </template>
      <template v-else>
        <span
          class="
            absolute
            inset-y-0
            right-0
            flex
            items-center
            pr-2
            z-50
            cursor-pointer
          "
        >
          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </span>
      </template>

      <transition
        leave-active-class="transition ease-in duration-100"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <ListboxOptions
          class="
            absolute
            z-10
            mt-1
            w-full
            bg-white
            shadow-lg
            max-h-60
            rounded-md
            py-1
            text-base
            ring-1 ring-black ring-opacity-5
            overflow-auto
            focus:outline-none
            sm:text-sm
          "
        >
          <ListboxOption
            as="template"
            v-for="item in options"
            :key="item.id"
            :value="item"
            :disabled="item.unavailable"
            :hidden="item.hidden"
          >
            <li
              :class="[
                modelValue == item.id
                  ? 'bg-gray-300'
                  : item.unavailable
                  ? 'text-gray-900'
                  : 'text-gray-900 hover:bg-gray-300',
                'cursor-default select-none relative py-2 pl-8 pr-4',
              ]"
            >
              <span
                :class="[
                  modelValue == item.id ? 'font-semibold' : 'font-normal',
                  'block truncate text-xs',
                ]"
              >
                {{ item.value }}
              </span>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
    <p
      v-if="error"
      class="mt-2 text-sm"
      :class="error ? 'text-red-600' : 'text-gray-800'"
      id="email-error"
    >
      {{ error }}
    </p>
  </Listbox>
</template>

<script>
import { computed, ref } from "vue";
import {
  Listbox,
  ListboxButton,
  ListboxLabel,
  ListboxOption,
  ListboxOptions,
} from "@headlessui/vue";
import { SelectorIcon, XIcon } from "@heroicons/vue/solid";

export default {
  components: {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    SelectorIcon,
    XIcon,
  },
  props: {
    modelValue: {
      default: null,
      required: true,
    },
    options: {
      type: Array,
      required: true,
    },
    label: {
      type: String,
      default: "",
    },
    error: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    disabled: {
      type: Boolean,
      default: false,
    },
  },
  setup(props, { emit }) {
    const selected = computed(() => {
      const result = Object.values(props.options).filter(
        (option) => option.id == props.modelValue
      )[0];

      if (typeof result !== "undefined") {
        return result.value;
      } else {
        return props.placeholder;
      }
    });

    function clearValue() {
      emit("update:modelValue", null);
    }

    return {
      selected,
      clearValue,
    };
  },
};
</script>
