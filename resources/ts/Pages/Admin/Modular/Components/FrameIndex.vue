<template>
    <div class="mt-6 px-6 max-w-[600px] m-auto">
        <div class="border rounded">
            <div class="w-full p-4 flex justify-between border-b items-center">
                <div>
                    <p class="text-sm font-bold text-gray-900">Frames</p>
                    <p class="mt-1 text-sm text-gray-500">Relevant data and other details</p>
                </div>
                <create-button 
                    :routeLink="route(createRoute, id)"
                />
            </div>
            <div class="p-4 space-y-4">
                <div v-for="frame in frames">
                    <a :href="route(editRoute, frame.id)">
                        <p class="mb-2 text-xs">{{ frame.label }}</p>
                        <image-text v-if="frame.frame_type == 1" />
                        <cards v-if="frame.frame_type == 2" />
                    </a>
                </div>
                <div v-if="frames.length <= 0">
                    <p class="text-gray-400 text-sm">No frame available</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import ImageText from './FrameTypes/ImageText.vue';
import Cards from './FrameTypes/Cards.vue';
const props = defineProps({
    id: { 
        type: Number 
    },
    frames: {
        type: Object
    },
    createRoute: { 
        type: String 
    },
    editRoute: { 
        type: String 
    },
})
</script>