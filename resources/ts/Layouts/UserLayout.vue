<template>
    <Head>
        <title inertia>{{ seoTitle }}</title>
        <meta itemprop="image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta name="twitter:image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta property="og:image" :content="seoImage ? seoImage : origin + '/icons/logo.png'">
        <meta property="og:title" :content="seoTitle">
        <meta property="og:description" :content="seoDescription">
    </Head>
    <div>
        <Header 
        :header="header"
        />
        
        <slot />

        <Footer
        :footer="footer"
        />
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

import Header from "./Components/Header.vue";
import Footer from "./Components/Footer.vue";

defineProps({
    seoTitle: {
        type: String,
        default: 'Home'
    },
    seoDescription: {
        type: String
    },
    seoImage: {
        type: String
    },
    seoKeywords: {
        type: String
    }
})


const header = ref<object>(null);
const footer = ref<object>(null);

// METHODS
const fetchLayout = () => {
    window.axios.post(route("web.cms.layout")).then((response) => {
        header.value = response.data.header?.content;
        footer.value = response.data.footer?.content;
    });
};

const origin = window.location.origin;

onMounted(() => {
    // fetchLayout();
})
</script>