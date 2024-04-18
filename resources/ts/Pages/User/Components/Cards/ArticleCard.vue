<template>
    <div>
        <a :href="route('web.resources.show', item.slug)">
            <div class="flex space-x-4 cursor-pointer hover:text-primary-500 transition">
                <div class="w-[calc(100%-279px)]">
                    <div class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden">
                        <img 
                            class="w-full h-full object-cover" 
                            :src="$page.props.storage_url + item.banner_image_path" 
                            alt="placeholder"
                        >
                    </div>
                </div>
                <div class="w-[263px]">
                    <p class="text-xl font-semibold line-clamp-4 mb-4 leading-8">{{item.title}}</p>
                    <p class="text-sm text-neutral-600">{{ formatDate(item.publish_date) }} • {{item.article_type}}</p>
                </div>
            </div>
        </a>
    </div>
</template>
<script setup lang="ts">
const props = defineProps({
    item: {
        type: Object,
        default: () => ({})
    }
})

const formatDate = (rawDate) => {
    return new Date(rawDate).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
}
</script>