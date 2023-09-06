<template>
    <div class="w-[552px] mx-auto mt-6 border border-gray-100 rounded-lg">
        <div class="p-6 text-sm">
            <jet-section-title class="mb-6">
                <template #title><slot name="title"></slot></template>
                <template #description><slot name="description"></slot></template>
            </jet-section-title>

            <form @submit.prevent="$emit('submitted')">
                <div class="grid grid-cols-12 gap-6">
                    <slot name="form"></slot>
                </div>

                <div class="pt-4">
                    <slot name="additionals"></slot>
                </div>
            </form>
        </div>
        <div v-if="hasActions" class="py-4 px-6 w-full bg-gray-50 border-t border-gray-100 flex justify-end">
            <slot name="actions"></slot>
        </div>
    </div>
</template>

<script>
    import JetSectionTitle from "@/Components/Partials/JetSectionTitle.vue";

    export default {
        emits: ['submitted'],

        components: {
            JetSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
