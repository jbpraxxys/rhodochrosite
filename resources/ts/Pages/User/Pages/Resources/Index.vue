<template>
    <user-layout>
        <general-banner 
            :item="{
                image: '/temp/cs3.png',
                title: 'Resources'
            }"
        />  
        <div class="max-w-[1440px] m-auto px-20 py-16 bg-primary-50">
            <div class="max-w-[1061px] m-auto">
                <div class="flex space-x-8 w-full">
                    <div class="w-[calc(100%-415px)]">
                        <div class="aspect-w-[641] aspect-h-[469] overflow-hidden rounded-md">
                            <img 
                                class="w-full h-full object-cover" 
                                src="https://picsum.photos/id/237/641/469" 
                                alt="placeholder"
                            >
                        </div>
                    </div>
                    <div class="space-y-4 w-[383px]">
                        <p class="text-28 font-bold line-clamp-3">Maximizing Business Efficiency by Outsourcing Call Center Services</p>
                        <p class="line-clamp-6">Call center outsourcing has emerged as a strategic tool for enhancing customer service efficiency. It’s a pathway that enables businesses to tap into specialized expertise and innovative technology, transforming the way they engage with their customers.</p>
                        <p class="text-sm text-neutral-500">March 1, 2024 • Blogs</p>
                        <v-button designColor='text-white'>Read More</v-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-[1440px] m-auto px-20 pb-16 bg-primary-50">
            <div class="max-w-[1061px] m-auto">
                <div class="w-fit m-auto space-x-2.5 flex mb-16">
                    <div @click="activateTab('case-studies')" class="px-4 py-2 rounded-lg cursor-pointer transition hover:bg-primary-600/[0.24]" :class="articleType == 'case-studies' ? 'bg-primary-600/[0.24] text-primary-400 font-medium' : ''">
                        <p class="text-sm leading-6">Case Studies</p>
                    </div>
                    <div @click="activateTab('blogs')" class="px-4 py-2 rounded-lg cursor-pointer transition hover:bg-primary-600/[0.24]" :class="articleType == 'blogs' ? 'bg-primary-600/[0.24] text-primary-400 font-medium' : ''">
                        <p class="text-sm leading-6">Blogs</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 mb-16">
                    <article-card 
                        v-for="item in items"
                        :item="item"
                    />
                </div>
                <div class="w-fit flex items-center m-auto">
                    <v-pagination :items="items" :min="6" />
                </div>
            </div>
        </div>  
    </user-layout>
</template>
<script setup lang="ts">
import { ref } from 'vue';

const articleType = ref('case-studies');

const activateTab = (tab) => {
    articleType.value = tab;
}

const items = [
    {
        title: 'An Ever-Evolving Landscape: Exploring Emerging Trends in Information Technology',
        date: 'March 1, 2024',
        articleType: 'Blogs',
        link: '/resources/view',
        image: 'https://picsum.photos/id/201/400/400'
    },
    {
        title: 'Unveiling the Advantages and Disadvantages of Outsourcing for Business Success',
        date: 'March 1, 2024',
        articleType: 'Blogs',
        link: '/resources/view',
        image: 'https://picsum.photos/id/202/400/400'
    },
    {
        title: 'Outsourcing IT Services: Guaranteeing Efficiency in a Tech-Driven World',
        date: 'March 1, 2024',
        articleType: 'Blogs',
        link: '/resources/view',
        image: 'https://picsum.photos/id/203/400/400'
    },
    {
        title: 'Outsourcing 101: Reasons Why Companies Outsource',
        date: 'March 1, 2024',
        articleType: 'Blogs',
        link: '/resources/view',
        image: 'https://picsum.photos/id/204/400/400'
    },
    {
        title: 'Business Outsourcing 101: Definition, Examples, Benefits, Challenges, and Tips',
        date: 'March 1, 2024',
        articleType: 'Blogs',
        link: '/resources/view',
        image: 'https://picsum.photos/id/206/400/400'
    },
]
</script>