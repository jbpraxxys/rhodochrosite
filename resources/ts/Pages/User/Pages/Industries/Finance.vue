<template>
    <user-layout custom-class="!bg-[#04193C]">
        <section class="relative bg-[#04193C]">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[165px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[70vw] text-white">
                    <h1 
                    class="text-5xl leading-tight lg:text-[5vw] lg:leading-[4.5vw] mb-4 ck-content finance-highlight text-[#10B8AD]" 
                    v-html="cms?.section1_header" />
                    <div class="max-w-[597px] mb-8 lg:mb-12">
                        <p>{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
        </section>
        <section class="bg-[#051125] relative saas-frame2">
            <div class="max-w-[1440px] m-auto px-20 flex items-center space-x-20 py-20 w-full">
                <div class="w-[540px]">
                    <img 
                        class="w-full"
                        :src="$page.props.storage_url + cms?.section2_image" 
                        alt="finance"
                    >
                </div>
                <div class="w-[calc(100%-620px)]">
                    <div class="text-white text-[2.2vw] leading-[3vw] finance-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                    <p class="text-white reveal-type">{{ cms?.section2_content }}</p>
                </div>
            </div>
        </section>
        <section class="bg-[#04193C]">
            <div class="max-w-[1440px] m-auto px-20 py-20">
                <div class="text-white text-[1.7vw] leading-[2.5vw] finance-highlight ck-editor mb-16 text-center reveal-type" v-html="cms?.section3_header"></div>
                <div class="max-w-[1000px] m-auto grid grid-cols-2 gap-11">
                    <div class="radial-card1 relative rounded-xl animateUp"
                        v-for="i in cms?.section3_items" 
                    >
                        <div 
                            class="p-8 rounded-xl bg-[#051d42] text-white space-y-2.5 flex flex-col justify-end h-full z-[10] relative"
                        >
                            <div class="w-24 h-24 relative">
                                <img
                                    class="w-full h-full object-contain" 
                                    :src="$page.props.storage_url + i.image" 
                                    alt="icon"
                                >
                            </div>
                            <p class="font-semibold text-2xl text-[#51D2CA]">{{i.title}}</p>
                            <div class="content">
                                <p>{{ i.content }}</p>
                            </div>
                        </div>
                        <div class="radial-bg rounded-xl"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#051125]">
            <div class="m-auto px-20 pt-20">
                <div class="text-white text-[2.3vw] leading-[2.5vw] finance-highlight ck-editor mb-20 reveal-type" v-html="cms?.section4_header"></div>
            </div>
            <div class="animateUp">
                <finance-slider :items="cms?.section4_items"/>
            </div>
        </section>
        <section class="bg-[#04193C]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="finance"
                    >
                </div>
                <div class="w-full lg:w-1/2 text-white px-4 lg:px-20 py-6 lg:py-[100px]">
                    <p class="text-5xl leading-tight font-bold mb-6 animateUp" v-html="cms?.section5_header"></p>
                    <div class="text-lg mb-12 animateUp" v-html="cms?.section5_content" />
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-[#304958]">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 bg-[#051125] overflow-hidden">
            <div id="contact-form" class="-translate-y-20"></div>
            <img 
                class="absolute lg:top-0 top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#000A2F]"
                    :title="cms?.section6_title"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/FinanceFrameOne.vue';
import FinanceSlider from './Components/FinanceSlider.vue';

const props = defineProps({
    cms: {
        type: Object
    }
})

const solutions = [
{
        icon: '/temp/adv1.png',
        title: 'Inbound and Outbound Sales',
        content: 'Our sales strategies are expertly crafted to boost your e-commerce revenue. Through targeted approaches tailored to your specific business needs, we drive customer engagement and conversion, whether through proactive outreach or responsive customer inquiries, helping you capitalize on every sales opportunity and grow your online business.',
    },
    {
        icon: '/temp/adv2.png',
        title: 'Bookkeeping Services',
        content: ' Keep your financial records organized and accurate with our professional bookkeeping services. From recording daily transactions to reconciling accounts and maintaining financial ledgers, we ensure that your financial data is up-to-date and compliant with regulations, allowing you to focus on growing your business.',
    },
    {
        icon: '/temp/adv4.png',
        title: 'Customer Support',
        content: ' Enhance your customer experience with our dedicated support team. Whether your customers have questions, concerns, or need assistance with your products or services, our team is available to provide prompt and personalized support, ensuring that their needs are met and their issues are resolved quickly and effectively.',
    },
    {
        icon: '/temp/adv3.png',
        title: 'Payroll Processing Services',
        content: 'Our processing solutions are designed to streamline your payroll management process and ensure timely and accurate payments to your employees. We handle all aspects of payroll administration, including calculating wages, deducting taxes and benefits, and processing payments, saving you time and resources while ensuring compliance with relevant regulations',
    },
]

const services = [
    {
        icon: '/temp/finance1.png',
        title: 'Comprehensive Technical Assistance',
        content: 'Including website troubleshooting and mobile app assistance, to enhance user experience and resolve technical issues efficiently.',
    },
    {
        icon: '/temp/finance2.png',
        title: 'VIP Customer Management Solutions',
        content: 'Including website troubleshooting and mobile app assistance, to enhance user experience and resolve technical issues efficiently.',
    },
    {
        icon: '/temp/finance3.png',
        title: 'Data-Driven Retention Strategies',
        content: 'leveraging customer behavior analytics to re-engage inactive customers and maximize customer lifetime value.',
    },
    {
        icon: '/temp/finance4.png',
        title: 'Effective Dispute Resolution Services',
        content: 'Outsource functions with Reliasourcing and re-calibrate your support processes. Our expertise can optimizes your operations and offer a more streamlined operational experience for your customers.',
    },
    {
        icon: '/temp/finance1.png',
        title: 'Cross-selling and Upselling ',
        content: 'Initiatives encouraging customers to purchase complementary products or upgrade during the buying process.',
    },
]
</script>