<template>
    <div>
        <label v-if="label" :for="id" class="block text-sm text-gray-900 mb-1">{{
            label
        }}<span v-if="required" class="text-red-600 ml-0.5">*</span></label>
        <div
            class="relative rounded-lg"
            :class="add_on_right || add_on_left ? 'flex' : ''"
        >
            <textarea
                v-if="textarea"
                :name="name"
                :id="id"
                :rows="textAreaRows"
                class="
                    block
                    w-full
                    pr-10
                    focus:outline-none
                    text-sm
                    rounded-md
                    py-2.5
                    disabled:bg-gray-100
                    border
                "
                :class="
                    error
                        ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500'
                        : 'text-gray-800 border-gray-300 placeholder-primary-300 focus:ring-gray-900 focus:border-gray-900 disabled:bg-gray-200',
                        customInputClass
                "
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :disabled="disabled"
                :maxlength="maxlength"
                :required="required"
                :readonly=readonly
            />

            <span
                v-if="add_on_left"
                class="
                    inline-flex
                    items-center
                    px-3
                    rounded-l-md
                    border border-r-0 border-gray-300
                    bg-gray-50
                    text-gray-900
                    text-sm
                "
                >{{ add_on_text }}</span
            >

            <input
                v-if="!textarea"
                :type="type"
                :name="name"
                :id="id"
                class="
                    block
                    w-full
                    focus:outline-none
                    text-sm
                    rounded-md
                    py-2.5
                    h-11
                    disabled:bg-gray-100
                "
                :class="
                    error
                        ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500'
                        : add_on_left
                        ? 'text-gray-800 placeholder-primary-300 flex-1 min-w-0 block w-full px-3 py-2.5 rounded-none rounded-r-md focus:ring-gray-900 focus:border-gray-900 text-sm border-gray-300'
                        : add_on_right
                        ? 'text-gray-800 placeholder-primary-300 flex-1 min-w-0 block w-full px-3 py-2.5 rounded-none rounded-l-md focus:ring-gray-900 focus:border-gray-900 text-sm border-gray-300'
                        : 'text-gray-800 border-gray-300 placeholder-primary-300 focus:ring-gray-900 focus:border-gray-900 disabled:bg-gray-200',
                        customInputClass
                "
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :disabled="disabled"
                :min="min"
                :max="max"
                :step="step"
                :maxlength="maxlength"
                :required="required"
                :readonly=readonly
            />

            <span
                v-if="add_on_right"
                class="
                    inline-flex
                    items-center
                    px-3
                    rounded-r-md
                    border border-l-0 border-gray-300
                    bg-gray-50
                    text-gray-900
                    text-sm
                "
                >{{ add_on_text }}</span
            >
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

        <small
            class="block text-right mt-1"
            :class="[
                modelValue.length >= maxlength
                    ? 'text-red-600'
                    : 'text-gray-400',
            ]"
            v-if="showInputLimit"
        >
            {{ modelValue.length }}/{{ maxlength }}
        </small>

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
import { ExclamationCircleIcon } from "@heroicons/vue/24/solid";

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
        customInputClass: {
            type: String,
            default: null,
        },
        textarea: {
            type: Boolean,
            default: false,
        },
        textAreaRows: {
            type: Number,
            default: 10,
        },
        add_on_right: {
            type: Boolean,
            default: false,
        },
        add_on_text: {
            type: String,
            default: null,
        },
        add_on_left: {
            type: Boolean,
            default: false,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        min: {
            type: Number,
            default: 0,
        },
        max: {
            type: Number,
        },
        step: {
            type: Number,
            default: 1,
        },
        maxlength: {
            type: Number,
        },
        showInputLimit: {
            type: Boolean,
            default: false,
        },
        required: {
            type: Boolean,
            default: false,
        },
        readonly: {
            type: Boolean,
            default: false,
        },
    },
};
</script>
