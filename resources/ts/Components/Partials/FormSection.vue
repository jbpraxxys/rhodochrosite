<template>
    <div class="md:grid md:grid-cols-12 md:gap-6">
        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="col-span-full mt-5 md:mt-0 md:col-span-7">
            <form @submit.prevent="$emit('submitted')">
                <div class="grid grid-cols-12 gap-6">
                    <slot name="form"></slot>
                </div>

                <div class="pt-4">
                    <slot name="additionals"></slot>
                </div>

                <div class="flex items-center py-3" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
            </form>
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
