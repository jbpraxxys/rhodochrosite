<template>
    <input 
    class="
        block
        w-full
        focus:outline-none
        text-sm
        rounded-md
        py-2.5
        h-11
        disabled:bg-gray-100
        text-gray-800
        border-gray-300
        placeholder-gray-500
        focus:ring-gray-900
        focus:border-gray-900" 
    :value="modelValue" 
    @input="$emit('update:modelValue', $event.target.value)" 
    ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

