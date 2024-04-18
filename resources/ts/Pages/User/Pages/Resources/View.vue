<template>
    <user-layout>
        <div class="h-[100px]"></div>
        <div class="max-w-[1440px] px-20 m-auto bg-primary-50 py-16">
            <div class="max-w-[900px] m-auto mb-16">
                <p v-if="article.article_type == 'blogs'" class="text-neutral-600 mb-4">Blogs</p>
                <p v-if="article.article_type == 'case-studies'" class="text-neutral-600 mb-4">Case Studies</p>
                <p class="text-5xl font-bold mb-4">{{ article.title }}</p>
                <p class="text-neutral-600 mb-8">{{ formatDate(article.publish_date) }}</p>
                <div class="aspect-w-[900] aspect-h-[493] overflow-hidden relative mb-4">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + article.banner_image_path" 
                        alt="banner"
                    >
                </div>
                <div class="ck-content" v-html="article.content"></div>
            </div>
            <div class="max-w-[1032px] m-auto">
                <p class="text-2xl font-bold mb-8">Read more Articles</p>
                <div v-if="suggestedArticles.length > 0" class="grid grid-cols-2 gap-8">
                    <a v-for="item in suggestedArticles" :href="route('web.resources.show', item.slug)">
                        <div class="space-y-4 transition hover:text-primary-500">
                            <div class="aspect-w-[500] aspect-h-[307]">
                                <img 
                                    class="w-full h-full object-cover" 
                                    :src="$page.props.storage_url + item.banner_image_path" 
                                    alt="placeholder"
                                >
                            </div>
                            <p class="text-sm text-neutral-600">{{ formatDate(article.publish_date) }}</p>
                            <p class="line-clamp-2 font-semibold text-xl">{{ item.title }}</p>
                        </div>
                    </a>
                </div>
                <div v-else>
                    <p>No article available ...</p>
                </div>
            </div>
        </div>
    </user-layout>
</template>
<script setup lang="ts">
const props = defineProps({
    article: {
        type: Object
    },
    suggestedArticles: {
        type: Object
    }
})

const formatDate = (rawDate) => {
    return new Date(rawDate).toLocaleDateString('en-US', {
        month: 'long',
        day: 'numeric',
        year: 'numeric'
    })
}

const relatedArticles = [
    {
        title: 'Business Outsourcing 101: Definition, Examples, Benefits, Challenges, and Tips',
        date: 'March 1, 2024',
        image: 'https://picsum.photos/id/240/500/307',
        link: '#'
    },
    {
        title: 'Outsourcing 101: Reasons Why Companies Outsource',
        date: 'March 1, 2024',
        image: 'https://picsum.photos/id/241/500/307',
        link: '#'
    },
]
</script>