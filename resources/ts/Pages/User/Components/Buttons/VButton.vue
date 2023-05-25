<template>
    <button
        :type="btnType"
        class="inline-flex items-center font-bold px-4 py-3 text-sm transition text-center justify-center disabled:opacity-25 border btn"
        
        :class="
            customClass,
			primary
				? 'bg-primary-800 border-primary-800 text-white hover:text-primary-800 hover:bg-white focus:outline-none active:bg-primary-900 active:text-white disabled:opacity-25 '
				: secondary
                ? 'bg-white border-primary-800 text-primary-800 hover:text-white hover:bg-primary-800 focus:outline-none active:bg-primary-900 disabled:opacity-25'
                : tertiary
                ? 'border-0 text-primary-800 hover:text-primary-700 active:text-primary-900 px-0 py-0'
                : ''
		"
    >
      <slot></slot>
    </button>
  </template>
  
<script setup lang="ts">
import { PropType } from 'vue';


export type ButtonType = 'button' | 'submit' | 'reset'

const props = defineProps({
    btnType: {
        type: String as PropType<ButtonType>,
        default: "button",
    },
    primary: {
        type: Boolean,
        default: false,
    },
    secondary: {
        type: Boolean,
        default: false,
    },
    tertiary: {
        type: Boolean,
        default: false,
    },
    customClass: {
        type: String,
        default: "primary large", // primary | secondary | tertiary &&& large | medium | small
    },
    btnWidth: {
        type: String,
        default: ""
    },
});
</script>
  