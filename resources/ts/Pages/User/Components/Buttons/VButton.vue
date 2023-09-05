<template>
    <button
        :type="btnType"
        class="inline-flex items-center font-bold px-4 py-3 text-sm transition text-center justify-center border rounded btn"
        :class="[
            disabled ? 'pointer-events-none disabled:opacity-25' : '',
            fill ? 'hover:bg-white text-white active:text-white' : 'bg-transparent hover:text-white',
            fillColor == 'primary' ? 'bg-primary-800 border-primary-800 hover:text-primary-800 active:bg-primary-900' :
            fillColor == 'gray' ? 'bg-gray-800 border-gray-800 hover:text-gray-800 active:bg-gray-900' :
            fillColor == 'blue' ? 'bg-blue-800 border-blue-800 hover:text-blue-800 active:bg-blue-900' : '',
            fillColor == 'primary-outline' ? 'border-primary-800 text-primary-800 hover:bg-primary-800 active:bg-primary-900' :
            fillColor == 'gray-outline' ? 'border-gray-800 text-gray-800 hover:bg-gray-800 active:bg-gray-900' :
            fillColor == 'blue-outline' ? 'border-blue-800 text-blue-800 hover:bg-blue-800 active:bg-blue-900' : '',
            size == 'sm' ? 'h-10' : 
            size == 'md' ? 'h-12' : 'h-[60px]',
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
  