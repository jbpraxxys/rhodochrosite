<template>
    <user-layout custom-class="!bg-[#051125]">
        <section class="relative bg-[#051125]">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[165px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[70vw] text-white">
                    <h1 
                    class="text-5xl leading-tight lg:text-[3.5vw] lg:leading-[4.5vw] mb-4 ck-content ecommerce-highlight text-[#51D2CA]" 
                    v-html="cms?.section1_header" />
                    <div class="max-w-[682px] mb-8 lg:mb-12">
                        <p>{{ cms?.section1_content }}</p>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
        </section>
        <section class="bg-primary-900 relative saas-frame2">
            <div class="m-auto px-20 flex items-center space-x-16 pt-[120px] pb-20 w-full">
                <div class="w-1/2">
                    <div class="text-white text-[1.7vw] leading-[2.5vw] ecommerce-highlight ck-editor mb-4 reveal-type" v-html="cms?.section2_header"></div>
                </div>
                <div class="w-1/2 text-white animateUp">
                    <p>{{ cms?.section2_content }}</p>
                </div>
            </div>
            <div class="fadeIn">
                <eco-slider :items="cms?.section2_items" />
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#1C2C36] to-[#283F4E]">
            <div class="max-w-[1440px] m-auto px-20 py-20">
                <div class="text-white text-3xl ecommerce-highlight ck-editor mb-20 text-center reveal-type" v-html="cms?.section3_header"></div>
            </div>
            <div>
                <advantage-slider :items="cms?.section3_items"/>
            </div>
        </section>
        <section class="bg-primary-900">
            <div class="max-w-[1440px] m-auto px-20 py-20">
                <div class="text-white text-3xl ecommerce-highlight ck-editor mb-16 text-center reveal-type" v-html="cms?.section4_header"></div>
                <div class="grid grid-cols-6 gap-4">
                    <div 
                        v-for="service in cms?.section4_items" 
                        class="radial-card3 rounded-lg animateUp" 
                        :class="service.customClass"
                    >
                        <div class="flex space-x-4 bg-[#232627] p-6 rounded-lg relative z-[10] h-full">
                            <div class="w-11 h-11 bg-primary-700 flex items-center rounded-full justify-center">
                                <img 
                                    class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                                    :src="$page.props.storage_url +  service.image" 
                                    alt="icon"
                                >
                            </div>
                            <div class="w-[calc(100%-60px)] text-white">
                                <p class="font-semibold text-lg mb-4">{{ service.title  }}</p>
                                <p>{{service.content}}</p>
                            </div>
                        </div>
                        <div class="radial-bg"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-to-b from-[#1C2C36] to-[#304958]">
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        :src="$page.props.storage_url + cms?.section5_image" 
                        alt="ecommerce"
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
        <section class="relative z-1 bg-[#1B2B35] overflow-hidden">
            <div id="contact-form" class="-translate-y-20"></div>
            <img 
                class="absolute lg:top-0 top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#142129]"
                    :title="cms?.section6_header"
                    :description="cms?.section6_content"
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/ECommerceFrameOne.vue';
import EcoSlider from './Components/EcommerceSlider.vue';
import AdvantageSlider from './Components/EcommerceAdvantageSlider.vue';

const props = defineProps({
    cms: {
        type: Object
    }
})

const gallery = [
    { image: '/temp/eco1.png' },
    { image: '/temp/eco2.png' },
    { image: '/temp/eco3.png' },
    { image: '/temp/eco4.png' },
    { image: '/temp/eco1.png' },
]
const advantages = [
{
        icon: '/temp/adv1.png',
        title: 'Inbound and Outbound Sales',
        content: 'Our sales strategies are expertly crafted to boost your e-commerce revenue. Through targeted approaches tailored to your specific business needs, we drive customer engagement and conversion, whether through proactive outreach or responsive customer inquiries, helping you capitalize on every sales opportunity and grow your online business.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/adv2.png',
        title: 'Data Entry',
        content: 'Ensure the accuracy and organization of your e-commerce data. From product information to customer details and sales transactions, our data entry experts maintain precise records to optimize efficiency and facilitate informed decision-making for your business.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/adv3.png',
        title: 'Order Processing',
        content: ' Streamline your e-commerce order processing workflow for improved efficiency. Our processes ensure quick and accurate order fulfillment, from order placement to shipping and delivery, enhancing customers’ overall shopping experience and driving repeat business on your platform.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/adv4.png',
        title: 'Inventory Management',
        content: 'Optimize your e-commerce inventory levels and logistics to prevent stockouts and minimize holding costs. Through effective inventory management strategies, we ensure the availability of popular products while reducing excess inventory, maximizing profitability and efficiency for your online business.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/adv5.png',
        title: 'Payment Management & Support ',
        content: 'Safeguard your transactions and provide seamless payment support to your customers. With our secure payment management solutions, we ensure the confidentiality of transactions, while our responsive support services address any payment-related issues promptly.',
        customClass: 'col-span-2'
    },
]

const services = [
    {
        icon: '/temp/icon2.png',
        title: 'Comprehensive Technical Assistance',
        content: ' Including website troubleshooting and mobile app assistance, to enhance user experience and resolve technical issues efficiently. ',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/icon3.png',
        title: 'VIP Customer Management Solutions',
        content: 'We provide exclusive perks, personalized recommendations, and priority assistance to enhance VIP customer loyalty.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/icon1.png',
        title: 'Data-Driven Retention Strategies',
        content: 'leveraging customer behavior analytics to re-engage inactive customers and maximize customer lifetime value.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/icon12.png',
        title: 'Effective Dispute Resolution Services',
        content: 'We manage disputes and complaints to maintain brand reputation and ensure customer satisfaction.',
        customClass: 'col-span-3'
    },
    {
        icon: '/temp/icon12.png',
        title: 'Personalized Delivery',
        content: 'As your business expands, Reliasourcing understands that support needs evolve. Our outsourcing solutions are designed to adapt precisely to the changing needs of your business, providing the flexibility necessary to sustain your growth.',
        customClass: 'col-span-3'
    },
]
</script>