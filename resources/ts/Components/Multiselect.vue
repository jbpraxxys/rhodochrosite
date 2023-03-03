<template>
    <div>
        <label class="block text-sm text-gray-900 mb-1">
            {{ label }}
        </label>
        <Multiselect
            v-model="modelValue"
            @change="(value) => $emit('update:modelValue', value)"
            mode="tags"
            :close-on-select="false"
            :searchable="true"
            :create-option="false"
            class="frm-multiselect"
            :options="options"
        />
        <p v-if="helper" class="mt-2 text-xs text-gray-500">
            {{ helper }}
        </p>

        <p v-if="error" class="mt-2 text-sm text-red-600">
            {{ error }}
        </p>
    </div>
</template>
<script>
import Multiselect from "@vueform/multiselect";

export default {
    props: {
        modelValue: {
            required: true,
            default: null,
        },
        options: {
            type: Object,
        },
        label: {
            type: String,
            default: null,
        },
        helper: {
            type: String,
            default: null,
        },
        error: {
            type: String,
            default: null,
        },
    },
    components: {
        Multiselect,
    },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>