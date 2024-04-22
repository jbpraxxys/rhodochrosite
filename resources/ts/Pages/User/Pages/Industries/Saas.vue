<template>
    <user-layout custom-class="!bg-[#0F193D]">
        <section class="relative">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[250px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[70vw] text-white">
                    <h1 
                    class="text-5xl leading-tight lg:text-[4.5vw] lg:leading-[4.5vw] mb-6 ck-content saas-highlight" 
                    v-html="cms?.section1_header" />
                    <div class="max-w-[519px] mb-8 lg:mb-12">
                        <p>{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
        </section>
        <section class="bg-[#172B75] relative saas-frame2">
            <img class="absolute top-[-200px] left-[-650px]" src="/icons/saas-particle.svg" alt="saas particles">
            <div class="max-w-[1440px] m-auto px-20 flex items-center space-x-20 py-20 w-full">
                <div class="w-[540px] relative z-1">
                    <img 
                        class="w-full"
                        :src="$page.props.storage_url + cms?.section2_image" 
                        alt="saas"
                    >
                </div>
                <div class="w-[calc(100%-620px)]">
                    <div class="text-white text-[3.34vw] leading-[4vw] saas-highlight ck-editor mb-4 animateUp" v-html="cms?.section2_header"></div>
                    <p class="text-white animateUp">{{ cms?.section2_content }}</p>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#172B75] to-[#425FC5]">
            <div class="max-w-[1440px] m-auto px-20 py-20">
                <div class="text-white text-[3.34vw] leading-[4vw] saas-highlight ck-editor mb-10 reveal-type" v-html="cms?.section3_header"></div>
                <div class="grid grid-cols-6 gap-10">
                    <div 
                        v-for="solution in cms?.section3_items" 
                        class="p-8 rounded-lg bg-white/[0.03] text-white space-y-2.5 flex flex-col justify-end animateUp" 
                        :class="solution.customClass"
                    >
                        <div class="w-24 h-24 relative">
                            <img
                                class="w-full h-full object-contain" 
                                :src="$page.props.storage_url + solution.logo" 
                                alt="icon"
                            >
                        </div>
                        <p class="font-semibold text-2xl">{{ solution.title }}</p>
                        <p>{{ solution.content }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#0F193D] to-[#2843A3] relative overflow-hidden">
            <img 
                class="absolute top-[60%] left-1/2 -translate-x-1/2 z-1"
                src="/icons/saas-particle4.svg" 
                alt="saas"
            >
            <div class="max-w-[1060px] m-auto px-20 py-20 relative z-[10]">
                <div class="text-white text-center text-[3.34vw] leading-[4vw] saas-highlight ck-editor mb-16 reveal-type" v-html="cms?.section4_header"></div>
                <div class="grid grid-cols-2 gap-8">
                    <div v-for="expectation in cms?.section4_items" class="even:translate-y-3 radial-card4 rounded-lg animateUp">
                        <div class="p-6 rounded-lg bg-[#182948] flex space-x-4 h-full relative z-[10]">
                            <div class="w-10 h-10">
                                <img 
                                    class="w-full h-full object-contain" 
                                    :src="$page.props.storage_url + expectation.logo" 
                                    alt="expectation"
                                >
                            </div>
                            <div class="w-[calc(100%-56px)] text-white">
                                <p class="text-lg font-semibold mb-4">{{expectation.title}}</p>
                                <p class="opacity-[0.65]">{{expectation.content}}</p>
                            </div>
                        </div>
                        <div class="radial-bg"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#0F193D] to-[#425FC5]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="saas"
                    >
                </div>
                <div class="w-full lg:w-1/2 text-white px-4 lg:px-20 py-6 lg:py-[100px]">
                    <p class="text-5xl font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp" v-html="cms?.section5_content" />
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-primary-500">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 bg-[#142150]">
            <div id="contact-form" class="-translate-y-20"></div>
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#0F193D]"
                    :title="cms?.section6_title"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/SaasFrameOne.vue';
const props = defineProps({
    cms: {
        type: Object
    }
})
const solutions = [
    {
        icon: '/temp/saas1.png',
        title: 'Web Development and Design',
        content: 'Attract the right audience and guide them seamlessly through your website with our cutting-edge Web Development and Design services.  Let our experts turn design ideas into functional, visually appealing websites. Elevate your brand with an effective online platform.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/saas2.png',
        title: 'Sales Development',
        content: 'Encounter a glitch? Our seasoned experts are at your service 24/7 for swift technical troubleshooting. We optimize your customers’ gaming experience, ensuring uninterrupted gameplay.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/saas3.png',
        title: 'Technical Support',
        content: 'Empower your customers with top-tier Technical Support that goes beyond conventional service. Our dedicated team ensures prompt and effective solutions, keeping your products running seamlessly. ',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/saas4.png',
        title: 'Customer Success Management',
        content: 'Partner with us for unparalleled Customer Success Management. Our Account Executives and Customer Success teams work tirelessly to understand your clients’ needs, providing proactive solutions and fostering lasting partnerships.',
        customClass: 'col-span-3'
    },
    {
        icon: '/temp/saas1.png',
        title: 'Account Management',
        content: 'Our dedicated team of Account Managers acts as your strategic partners, ensuring seamless communication, optimizing operations, and driving growth. From onboarding to ongoing support, trust us to nurture your client relationships and maximize profitability.',
        customClass: 'col-span-3'
    },
]

const expectations = [
    {
        icon: '/temp/expect1.png',
        title: 'Scalable Infrastructure',
        content: 'Outsource product and SaaS services with us to access scalable infrastructure tailored to your needs. Whether you\'re experiencing rapid growth or seasonal fluctuations, our flexible solutions ensure your business can expand without constraints.',
    },
    {
        icon: '/temp/expect2.png',
        title: 'Enhanced User Experience',
        content: 'Expect an elevated user experience when you outsource with us. Our focus on user-centric design and development ensures your product or SaaS solution is intuitive, efficient, and delights your customers at every interaction.',
    },
    {
        icon: '/temp/expect3.png',
        title: 'Continuous Innovation',
        content: 'Partnering with us means tapping into a pool of innovation. Our dedicated teams stay abreast of the latest trends and technologies, continuously enhancing your product or SaaS offerings to stay ahead in the market.',
    },
    {
        icon: '/temp/expect4.png',
        title: 'Agile Development Cycles',
        content: 'Experience faster time-to-market and adaptability with our agile development approach. We prioritize collaboration, iterative improvements, and rapid prototyping to ensure your product or SaaS solution remains competitive and relevant in a dynamic market landscape',
    },
]
</script>