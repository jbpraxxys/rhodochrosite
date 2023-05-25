<template>
    <modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close" :cstmClass="cstmClass">
        <div class="bg-white px-9 py-[60px] text-center rounded-none border">
            <div class="text-xl font-bold text-primary-800">
                <slot name="title">
                </slot>
            </div>

            <div class="mt-3">
                <slot name="content">
                </slot>
            </div>
            <div class="flex space-x-2 mt-6 justify-center">
                <slot name="footer">
                </slot>
            </div>
        </div>

    </modal>
</template>

<script>
    import Modal from '@/Components/Modals/Modal.vue';

    export default {
        emits: ['close'],

        components: {
            Modal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
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
