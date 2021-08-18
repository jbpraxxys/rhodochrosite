<template>
  <TransitionRoot
    :show="success !== null"
    enter="transition-opacity duration-75"
    enter-from="opacity-0"
    enter-to="opacity-100"
    leave="transition-opacity duration-150"
    leave-from="opacity-100"
    leave-to="opacity-0"
  >
    <div class="rounded-md bg-green-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <CheckCircleIcon class="h-5 w-5 text-green-400" aria-hidden="true" />
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">
            {{ success }}
          </p>
        </div>
        <div class="ml-auto pl-3">
          <div class="-mx-1.5 -my-1.5">
            <button
              type="button"
              class="
                inline-flex
                bg-green-50
                rounded-md
                p-1.5
                text-green-500
                hover:bg-green-100
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-offset-green-50
                focus:ring-green-600
              "
            >
              <span class="sr-only">Dismiss</span>
              <XIcon class="h-5 w-5" aria-hidden="true" @click="show = false" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </TransitionRoot>
</template>

<script>
import { CheckCircleIcon, XIcon } from "@heroicons/vue/solid";
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { TransitionRoot } from "@headlessui/vue";

export default {
  components: {
    CheckCircleIcon,
    XIcon,
    TransitionRoot,
  },
  setup() {
    const success = computed(() => usePage().props.value.flash.success);
    return {
      success,
    };
  },
};
</script>
