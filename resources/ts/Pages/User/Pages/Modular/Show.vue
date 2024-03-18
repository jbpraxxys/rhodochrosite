<template>
    <user-layout>
        <general-banner 
            :item="{
                image: $page.props.storage_url + item.image,
                title: item.header
            }"
        />  
        <offset-banner 
            :item="{
                title: item.subtitle,
                description: item.description
            }"
        />

        <div v-for="frame in frames">
            <generic-block 
                v-if="frame.frame_type == 1 && frame.card_type == 1"
                class="pb-10 bg-primary-50"
                :class="frame.custom_class"
                :item="{
                    title: frame.title,
                    description: frame.description,
                    image: $page.props.storage_url + frame.image,
                    imageFirst: frame.image_first,
                    buttonText: frame.button_text,
                    buttonLink: frame.button_link
                }"
            />
            <benefit-block 
                v-if="frame.frame_type == 2 && frame.card_type == 1"
                class="pb-[120px]"
                :class="frame.custom_class"
                :items="frame?.cards"
            />

            <image-text-frame 
                v-if="frame.frame_type == 1 && frame.card_type == 2"
                :class="frame.custom_class"
                :item="{
                    image: $page.props.storage_url + frame.image,
                    title: frame.title,
                    description: frame.description,
                    buttonText: frame.button_text,
                    buttonLink: frame.button_link
                }"
            />
            
            <specialty-block 
                v-if="frame.frame_type == 2 && frame.card_type == 2"
                class="pb-20 z-[2] relative bg-primary-50"
                :class="frame.custom_class"
                :items="frame"
            />

            <offer-block 
                v-if="frame.frame_type == 2 && frame.card_type == 3"
                :items="frame"
            />
        </div>

        <contact-frame class="py-10 bg-primary-50" />

    </user-layout>
   
</template>
<script lang="ts" setup>
    const props = defineProps({
        item: {
            type: Object,
            default: () => ({}),
        },
        frames: {
            type: Object,
            default: () => ({}),
        },
    })
</script>