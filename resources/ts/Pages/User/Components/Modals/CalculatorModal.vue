<template>
    <modal 
        :id="id" 
        :show="show" 
        :max-width="maxWidth" 
        :closeable="closeable" 
        @close="$emit('close')"
    >
        <div class="p-8 rounded-[2rem] bg-white">
            <div class="mb-8">
                <p class="text-3xl font-bold mb-4">Hire top talent!</p>
                <p>For much less than you expect.</p>
            </div>
            <div class="space-y-8">
                <div>
                    <v-selector
                        :options="sampleOption"
                        label="Role"
                        placeholder="Select role here"
                        id="role"
                        name="role"
                    />
                </div>
                <div>
                    <v-selector
                        :options="sampleOption"
                        label="Experience Level"
                        placeholder="Select experience level here"
                        id="experience_level"
                        name="experience_level"
                    />
                </div>
                <div>
                    <v-selector
                        :options="sampleOption"
                        label="Country"
                        placeholder="Select country here"
                        id="country"
                        name="country"
                    />
                </div>
                <v-button 
                    @click="proceed"
                    custom-class="px-6 !text-base animateUp w-full" 
                    size="md" 
                    design-color="text-white"
                >
                    Proceed
                </v-button>
            </div>
        </div>
    </modal>
</template>

<script lang="ts" setup>
import Modal from '@/Components/Modals/Modal.vue';

const sampleOption = [
    { id: 'Creative Services', value: 'Creative Services'},
    { id: 'Web Design', value: 'Web Design'},
    { id: 'Web Development', value: 'Web Development'},
    { id: 'Software Development', value: 'Software Development'},
    { id: 'Sales Development Services', value: 'Sales Development Services'},
    { id: 'Email and Phone Support', value: 'Email and Phone Support'},
    { id: 'Live Chat Support', value: 'Live Chat Support'},
    { id: 'Social Media Services', value: 'Social Media Services'},
    { id: 'Revenue Optimization Services', value: 'Revenue Optimization Services'},
]

const props = defineProps({
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
})

const proceed = () => {
    location.href = '/calculator/view';
}
</script>
