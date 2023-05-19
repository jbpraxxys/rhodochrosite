<template>
    <div>
        <modal :id="id" :show="show" :max-width="maxWidth" :closeable="closeable" @close="close" :cstmClass="cstmClass">
            <div class="bg-white px-9 py-[60px] rounded-none border">
                <div class="flex flex-col items-center text-center space-y-3 mb-6">
                    <QuestionMarkCircleIcon
                        class="h-[43px] w-[43px] text-primary-800"
                        aria-hidden="true"
                    />
                    <p class="text-xl font-bold text-primary-800">{{  title }}</p>
                    <p class="">{{ description }}</p>
                    <slot name="headerText"></slot>
                </div>
                <slot name="content" class="mb-6"></slot>
                <div class="flex space-x-2 justify-center">
                    <slot name="button"></slot>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
import Modal from '@/Components/Modals/Modal.vue';
import { QuestionMarkCircleIcon } from "@heroicons/vue/24/solid";

export default {
    emits: ['close'],

    components: {
        Modal,
        QuestionMarkCircleIcon,
    },

    props: {
        id: {
            type: String,
        },
        title: {
            type: String,
            default: null
        },
        description: {
            type: String,
            default: null
        },
        show: {
            default: false
        },
        maxWidth: {
            default: 'lg'
        },
        closeable: {
            default: true
        },
        cstmClass: {
            type: String,
            default: 'rounded-none'
        }
    },

    methods: {
        close() {
            this.$emit('close')
        },
    }
}
</script>
