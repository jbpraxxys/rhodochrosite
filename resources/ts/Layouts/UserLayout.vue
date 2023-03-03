<template>
    <Head>
        <title inertia>{{ seoTitle }}</title>
        <meta property="og:image" :content="seoImage">
        <meta property="og:title" :content="seoTitle">
        <meta property="og:description" :content="seoDescription">
        <link rel="icon" :href="'/storage/' + headerfooter.logo_favicon" sizes="32x32">
    </Head>
    <div>
        <Header 
        :header="headerfooter"
        />
        
        <slot />

        <Footer
        :footer="headerfooter"
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

const headerfooter = ref([]); 
const fetchHeaderFooter = () => {
    window.axios.post(route('web.cms.general.fetchHeaderFooter'))
    .then(({ data }) => {
        headerfooter.value = data[0].content;
    })
    .catch((err) => {
        console.log(err)
    })
}

onMounted(() => {
    fetchHeaderFooter();
})
</script>