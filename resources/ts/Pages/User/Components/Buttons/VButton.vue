<template>
    <button
        :type="btnType"
        class="inline-flex items-center font-bold px-4 py-3 text-sm transition text-center justify-center border rounded btn"
        :class="[
            disabled ? 'pointer-events-none disabled:opacity-25' : '',
            fill ? 'hover:bg-white text-white active:text-white' : 'bg-transparent hover:text-white',
            fillColor == 'primary' ? 'bg-primary-600 border-primary-600 hover:text-primary-600 active:bg-primary-900' :
            fillColor == 'red' ? 'bg-red-600 border-red-600 hover:text-red-600 active:bg-red-600' :
            fillColor == 'blue' ? 'bg-blue-800 border-blue-800 hover:text-blue-800 active:bg-blue-900' : '',
            fillColor == 'primary-outline' ? 'border-primary-600 text-primary-600 hover:bg-primary-600 active:bg-primary-900' :
            fillColor == 'gray-outline' ? 'border-gray-300 text-gray-800 hover:bg-gray-300 active:bg-gray-900' :
            fillColor == 'blue-outline' ? 'border-blue-800 text-blue-800 hover:bg-blue-800 active:bg-blue-900' : '',
            size == 'sm' ? 'h-10' : 
            size == 'md' ? 'h-12' : 'h-[44px]',
            block ? 'flex w-full' : 'inline-flex',
            customClass,
        ]"
    >
      <slot></slot>
    </button>
  </template>
  
<script setup lang="ts">
import { PropType } from 'vue';
export type ButtonType = 'button' | 'submit' | 'reset'

const props = defineProps ({
    btnType: {
        type: String as PropType<ButtonType>,
        default: "button",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    customClass: {
        type: String
    },
    size: {
        type: String, // sm, md, lg
        default: "lg"
    },
    fillColor: {
        type: String,
        default: "primary", // primary | gray | blue
    },
    fill: {
        type: Boolean,
        default: true
    },
    block: {
        type: Boolean,
        default: false,
    },
});
</script>
  