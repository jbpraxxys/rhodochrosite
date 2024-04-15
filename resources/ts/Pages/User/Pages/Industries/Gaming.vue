<template>
    <user-layout custom-class="gaming">
        <div class="spacer h-[100px]"></div>
        <section class="relative">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[250px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[70vw]">
                    <img 
                        class="-translate-x-16 mb-4"
                        src="/temp/gameon.png" 
                        alt="game"
                    >
                    <div class="max-w-[566px] mb-8 lg:mb-12">
                        <h1 class="text-base">Team-up with us for unrivaled Entertainment & Gaming excellence. Our specialized Business Process Outsourcing (BPO) solutions are meticulously crafted to elevate your gaming ventures to new heights of success.</h1>
                    </div>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
            <img 
                class="absolute bottom-0 w-full"
                src="/temp/footer.svg" 
                alt="footer"
            >
        </section>
        <section class="bg-[#11CEBB] relative gaming-frame2">
            <div class="max-w-[1440px] m-auto px-20 flex items-center space-x-20 py-20 w-full">
                <div class="w-[540px]">
                    <img 
                        class="w-full"
                        src="/temp/gaming-f2.png" 
                        alt="saas"
                    >
                </div>
                <div class="w-[calc(100%-620px)]">
                    <div class="text-white text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-4" v-html="'<p>Level up your efficiency and <strong>player satisfaction</strong> with our <strong>industry-leading expertise.</strong></p>'"></div>
                    <p class="text-white">At Reliasourcing, we specialize in providing comprehensive BPO services tailored for the Entertainment and Gaming Industry. Our suite of offerings is designed to take your gaming endeavors to the next level.</p>
                </div>
            </div>
        </section>
        <section class="relative">
            <div class="max-w-[1440px] m-auto px-20 pt-20 pb-[154px]">
                <div class="grid grid-cols-6 gap-10 w-full">
                    <div class="col-span-2 flex items-center">
                        <div class="text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-10" v-html="'<p>Outsourcing <strong>Solutions</strong></p>'"></div>
                    </div>
                    <div 
                        v-for="solution in solutions" 
                        class="p-8 rounded-lg bg-[#2D4959] text-white space-y-2.5 flex flex-col justify-end" 
                        :class="solution.customClass"
                    >
                        <div class="w-24 h-24 relative">
                            <img
                                class="w-full h-full object-contain" 
                                :src="solution.icon" 
                                alt="icon"
                            >
                        </div>
                        <p class="font-semibold text-2xl">{{ solution.title }}</p>
                        <p>{{ solution.content }}</p>
                    </div>
                </div>
            </div>
            <img 
                class="absolute bottom-0 w-full"
                src="/temp/footer.svg" 
                alt="footer"
            >
        </section>
        <section class="bg-[#11CEBB]">
            <div class="max-w-[1440px] m-auto px-20 py-20 flex space-x-20">
                <div class="w-1/2">
                    <div class="text-white text-[3.34vw] leading-[4vw] gaming-highlight ck-editor mb-12" v-html="'<p>What to <strong>Expect</strong></p>'"></div>
                    <div class="space-y-4">
                        <div v-for="expectation in expectations" class="flex space-x-4 bg-[#182731]/[0.60] p-6 rounded-lg">
                            <div class="w-11 h-11 bg-primary-700 flex items-center rounded-full justify-center">
                                <img 
                                    class="w-6 h-6 group-hover/benefit:scale-125 transition" 
                                    :src="expectation.icon" 
                                    alt="icon"
                                >
                            </div>
                            <div class="w-[calc(100%-60px)] text-white">
                                <p class="font-semibold text-lg mb-4">{{ expectation.title  }}</p>
                                <p class="opacity-[0.65]">{{expectation.content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-1/2">
                    <img 
                        class="w-full"
                        src="/temp/gaming.png" 
                        alt="gaming"
                    >
                </div>
            </div>
        </section>
        <section>
            <div class="flex items-center lg:flex-row flex-col">
                <div class="w-full lg:w-1/2 h-full bg-white">
                    <img 
                        class="w-full h-full object-cover" 
                        src="/temp/game2.png" 
                        alt="gaming"
                    >
                </div>
                <div class="w-full lg:w-1/2 px-4 lg:px-20 py-6 lg:py-[100px]">
                    <p class="text-5xl font-bold mb-6 animateUp" v-html="'Ready to Level Up Your Gaming Business? Talk to Us!'"></p>
                    <div class="text-lg mb-12 animateUp" v-html="'Transform your business operations with Reliasourcing. Contact us to discuss how our services can power up your success in the dynamic entertainment and gaming industry.'" />
                    <a href="/#contact-us">
                        <v-button class="animateUp" design-color="text-white">
                            Outsource with Us
                        </v-button>
                    </a>
                </div>
            </div>
        </section>
        <section class="relative z-1 overflow-hidden">
            <div id="contact-form" class="-translate-y-20"></div>
            <img 
                class="absolute lg:top-0 top-[150px] lg:scale-100 scale-[200%] lg:bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto relative z-[2] lg:px-0 px-4 py-10">
                <contact-form 
                    custom-class="!bg-[#2D4959]"
                    title="Let's Chat! "
                    description="Drop us a line and access reliable solutions."
                />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import FrameOne from './Components/GamingFrameOne.vue';

const solutions = [
    {
        icon: '/temp/gaming1.png',
        title: 'Customer and Gamer Support',
        content: 'Boost your online presence through positive interactions. Engage and retain your player base with our top-notch support services. We level up your customer satisfaction through responsive and personalized assistance.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/gaming2.png',
        title: 'VIP Customer Support',
        content: 'Our commitment to providing the royal treatment extends beyond gameplay. Elevate the gaming experience for your VIP players with our dedicated support experts.',
        customClass: 'col-span-2'
    },
    {
        icon: '/temp/gaming3.png',
        title: 'Account Management',
        content: 'Let us manage the complexities, so you can level up your business effortlessly. From player accounts to backend processes, we streamline your gaming business for success. Our account management experts will enhance your efficiency.',
        customClass: 'col-span-3'
    },
    {
        icon: '/temp/gaming1.png',
        title: 'Technical Troubleshooting',
        content: 'Encounter a glitch? Our seasoned experts are at your service 24/7 for swift technical troubleshooting. We optimize your customers’ gaming experience, ensuring uninterrupted gameplay.',
        customClass: 'col-span-3'
    },
    {
        icon: '/temp/gaming4.png',
        title: 'QA Testing ',
        content: 'Ensure a flawless gaming adventure. Let us take the reins on Quality Assurance (QA) testing, allowing you to concentrate on crafting exceptional gaming content. Enjoy a polished product and increase user-satisfaction with a gaming experience like no other.',
        customClass: 'col-span-3'
    },
    {
        icon: '/temp/gaming5.png',
        title: 'Product and Game Launch Support',
        content: 'Launch with confidence! Benefit from our strategic planning and execution expertise to ensure a triumphant game release. Our tailored product and game launch support sets the stage for a seamless player experience.',
        customClass: 'col-span-3'
    },
]
const expectations = [
    {
        icon: '/temp/icon2.png',
        title: 'Optimized Spending',
        content: 'Outsourcing support services unlocks substantial cost savings for your operations. Leverage on Reliasourcing’s expertise and infrastructure to streamline your business savings.',
    },
    {
        icon: '/temp/icon3.png',
        title: 'Flexibility in Growth',
        content: 'Reliasourcing specializes in crafting tailor-made solutions. We dive deep into understanding your unique requirements and customize processes to improve business efficiency. Our commitment to open communication channels allows us to adapt to your evolving needs seamlessly.',
    },
    {
        icon: '/temp/icon1.png',
        title: 'Personalized Delivery',
        content: 'As your business expands, Reliasourcing understands that support needs evolve. Our outsourcing solutions are designed to adapt precisely to the changing needs of your business, providing the flexibility necessary to sustain your growth.',
    },
    {
        icon: '/temp/icon12.png',
        title: 'Operational Excellence',
        content: 'Outsource functions with Reliasourcing and re-calibrate your support processes. Our expertise can optimizes your operations and offer a more streamlined operational experience for your customers.',
    },
]
</script>