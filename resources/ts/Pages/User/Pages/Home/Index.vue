<template>
    <user-layout>
        <section class="relative h-screen">
            <div class="px-20 pt-[169px] absolute top-0 left-0">
                <div class="w-[36vw] text-white">
                    <h1 class="text-[5.1vw] leading-[5.1vw] mb-6 font-bold">
                        Free your<br>mind to <b class="text-primary-500">focus</b> on your core business
                    </h1>
                    <div class="max-w-[294px] mb-12">
                        <p>Let us guide you towards your goals and help you soar to new heights of success.</p>
                    </div>
                    <v-button custom-class="h-14 px-6 !text-base">
                        Outsource with Us
                    </v-button>
                </div>
            </div>
            <frame-one />
        </section>

        <section class="relative">
            <div class="max-w-[1440px] m-auto p-20">
                <div class="w-full grid grid-cols-3 gap-8">
                    <div class="flex items-center justify-center">
                        <p class="text-3xl font-bold">
                            Reliasourcing delivers business process solutions tailor-made for your needs.
                        </p>
                    </div>
                    <service-card
                        v-for="item in items1"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <section class="bg-primary-900 text-white">
            <div class="max-w-[1440px] m-auto px-20 py-[120px]">
                <div class="max-w-[835px] m-auto text-center mb-20">
                    <p class="text-3xl font-bold reveal-type">Client-oriented and flexible, Reliasourcing strives<br>to provide diverse, tailored solutions to help<br>businesses reach the pinnacle of success.</p>
                </div>
                <div class="grid grid-cols-4 w-full gap-20">
                    <values-card
                        v-for="item in items2"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto px-20 py-[120px]">
                <div>
                    <image-text 
                        :item="{
                            title: 'Performance-driven<br><b>Customer Service</b> Teams',
                            description: '<p>You’re busy. We get it. Your customers are important to you, but you can’t do everything yourself.<br><br>That’s where we come in. Performance Customer Service Teams provides the perfect solution for businesses who want to focus on their core competencies and leave customer service to the experts.</p>',
                            image: '/temp/image1.png',
                        }"
                    />
                    <image-text 
                        :item="{
                            title: '<b>Performance</b> Sales Team',
                            description: '<p>You’ve put a lot of hard work into your business, and you deserve the best sales team possible to take it to the next level. Sales teams are the lifeblood of any company, but building and maintaining a world-class sales team is hard.</p>',
                            image: '/temp/image1.png',
                            imageFirst: true
                        }"
                    />
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto px-20 counter-container">
                <div class="flex items-center justify-between mb-12">
                    <div class="max-w-[407px]">
                        <p class="text-3xl font-bold">How they are satisfied<br>with our service</p>
                    </div>
                    <div class="flex space-x-24">
                        <div>
                            <p class="text-h1 font-bold"><span class="counter" data-count="800" data-speed="175"></span>+</p>
                            <p>Project done</p>
                        </div>
                        <div>
                            <p class="text-h1 font-bold"><span class="counter" data-count="500" data-speed="250"></span>+</p>
                            <p>Satisfied clients</p>
                        </div>
                    </div>
                </div>
                <div class="p-14 bg-primary-50 rounded-2xl flex space-x-11 items-center">
                    <img 
                        class="w-[340px] showLeft" 
                        src="/temp/ceo.png" 
                        alt="ceo"
                    >
                    <div class="w-[calc(100%-384px)] relative">
                        <img
                            src="/icons/quote.svg" 
                            alt="quote"
                            class="absolute -top-8 -left-8"
                        >
                        <p class="text-2xl font-medium poppins mb-4 animateUp">Reliasourcing’s revenue optimization services are exceptional. Their team developed a customized strategy tailored to our goals, resulting in a significant increase in revenue. Regular updates and reports kept us informed and their expertise and commitment to quality make them a valuable partner. Highly recommended!</p>
                        <p class="text-sm font-bold animateUp">Edoardo Arnello, CEO</p>
                        <p class="text-sm animateUp">CEO, Accesiway</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto p-20 text-center">
                <p class="text-xl font-bold mb-8">Trusted by Companies Worldwide</p>
                <div class="flex justify-between space-x-10 px-20">
                    <a 
                        v-for="i,index in 6"
                        href="/" 
                        target="_blank" 
                        rel="noreferrer"
                        class="popAnimate"
                    >
                        <img 
                            class="w-[114px] grayscale transition hover:grayscale-0 hover:scale-125 duration-500"
                            :src="'/temp/logo' + (index+1) + '.png'" 
                            alt="logo"
                        >
                    </a>
                    
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto bg-primary-900 text-center py-[120px]">
                <div class="max-w-[715px] m-auto text-white">
                    <p class="text-5xl font-bold mb-4 animateUp">Collaborate With Us</p>
                    <p class="mb-12 text-xl animateUp">Reliasourcing goes above and beyond merely catering to your unique requirements. With our stellar specializations, we will help you move your business forward strategically and efficiently.</p>
                    <v-button class="animateUp">Outsource with Us</v-button>
                </div>
            </div>
        </section>

        <section class="relative">
            <img 
                class="absolute bottom-0 left-0 -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto py-[120px] px-20 relative z-[2]">
                <div class="flex space-x-20 max-w-[1062px] m-auto mb-24">
                    <div class="w-1/2">
                        <p class="font-bold text-3xl mb-6 animateUp">Why Choose Reliasourcing?</p>
                        <div class="text-xl mb-12 animateUp">
                            <p>Reliasourcing goes above and beyond merely catering to your unique requirements. With our stellar specializations, we will help you move your business forward strategically and efficiently.</p>
                            <br>
                            <p>Interested in our specializations? Get in touch with our specialists right away to get started on your project.</p>
                        </div>
                        <v-button custom-class="h-14 px-6 !text-base animateUp" design-color="text-white">
                            About Us
                        </v-button>
                    </div>
                    <div class="w-1/2 space-y-4">
                        <div v-for="item in items3" class="p-8 bg-primary-50 rounded-2xl group/tech hover:bg-primary-500 hover:-translate-y-2 transition duration-500 hover:shadow-lg">
                            <p class="text-xl font-bold mb-2 group-hover/tech:text-white transition">{{item.title}}</p>
                            <p class="group-hover/tech:text-white transition">{{ item.description }}</p>
                        </div>
                    </div>
                </div>

                <contact-form />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import { onMounted } from 'vue';
import FrameOne from './Components/FrameOne.vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import SplitType from 'split-type';

gsap.registerPlugin(ScrollTrigger);

const items1 = [
    { 
        title: 'Contact Center', 
        description: 'Elevate your customer experience with Reliasourcing’s call center outsourcing solutions.',
        image: '/temp/home1.png',
        link: '/'
    },
    { 
        title: 'Managed Services', 
        description: 'Prioritize your company’s core competencies while simultaneously reducing costs, maximizing revenue, and dedicating your efforts to business growth by leveraging Reliasourcing’s managed services.',
        image: '/temp/home6.png',
        link: '/'
    },
    { 
        title: 'Staff Leasing', 
        description: 'Scale your team without diverting attention from your primary goals with Reliasourcing’s staff leasing solutions.',
        image: '/temp/home2.png',
        link: '/'
    },
    { 
        title: 'Workforce Management', 
        description: 'Optimize staffing and workload requirements and the scheduling processes needed to meet your business goals with Reliasourcing’s workforce management services.',
        image: '/temp/home5.png',
        link: '/'
    },
]

const items2 = [
    { 
        title: 'Bespoke Solutions', 
        description: 'Each project is tailored made to ensure resources optimization',
        image: '/temp/iso3.png',
    },
    { 
        title: 'Performance Oriented', 
        description: 'Our agents are trained to provide the best quality customer service for your brand',
        image: '/temp/iso2.png',
    },
    { 
        title: 'Tech-Driven', 
        description: 'We commit ourselves to the highest SLA industry standards',
        image: '/temp/iso6.png',
    },
    { 
        title: 'Responsive Team', 
        description: 'We analyze performance and provide improvement suggestions',
        image: '/temp/iso4.png',
    },
]

const items3 = [
    {
        title: 'Strategize',
        description: 'Forming the best strategy for your organization’s objectives'
    },
    {
        title: 'Execute',
        description: 'Performing operations according to strategy'
    },
    {
        title: 'Update',
        description: 'Real-time measurement and analysis of performance & KPIs'
    },
    {
        title: 'Measure',
        description: 'Fast adaptation of strategy, and procedures according to results'
    },
]



onMounted(() => {
    const counterContainer = document.querySelector(".counter-container");
    let animationPlayed = false;

    window.addEventListener('scroll', function() {
    if (!animationPlayed) {
        if (isScrolledIntoView(counterContainer)) {
                animateCounter();
                animationPlayed=true;
        }
    }
    });

    const animateCounter = () => {
        const counter = document.querySelectorAll(".counter");

    counter.forEach((myCount) => {
        let target_count = myCount.dataset.count ? myCount.dataset.count : 0;
        let speed = myCount.dataset.speed ? myCount.dataset.speed : 500;
        let init_count = +myCount.innerText;

        let new_increment_num = Math.floor(target_count / speed);

        const updateNumber = () => {
            init_count +=  new_increment_num;
            myCount.innerText = formatCash(init_count);

            if(init_count < target_count) {
                setTimeout(() => { updateNumber() }, 5);
            }
            else {
                myCount.innerText = formatCash(init_count);
            }
        }

        updateNumber();
    });
    }

    const isScrolledIntoView = elem => {
        let rect = elem.getBoundingClientRect();
        let elemTop = rect.top;
        let elemBottom = rect.bottom;

        let isVisible = (elemTop >= 0) && (elemTop <= window.innerHeight);

        return isVisible;
    }

    const formatCash = n => {
        if (n < 1e3) return n;
        if (n >= 1e3 && n < 1e6) return +(n / 1e3).toFixed(1) + "K";
        if (n >= 1e6 && n < 1e9) return +(n / 1e6).toFixed(1) + "M";
        if (n >= 1e9 && n < 1e12) return +(n / 1e9).toFixed(1) + "B";
        if (n >= 1e12) return +(n / 1e12).toFixed(1) + "T";
    };

    setTimeout(() => {
        const splitTypes = document.querySelectorAll('.reveal-type')

        splitTypes.forEach((char,i) => {

            const text = new SplitType(char, { types: 'chars'})

            gsap.from(text.chars, {
                scrollTrigger: {
                    trigger: char,
                    start: 'top 80%',
                    end: 'top 20%',
                    scrub: true,
                    markers: false,
                },
                y: 20,
                opacity: 0,
                stagger: 0.1
            })
        })

        gsap.from(".popAnimate", {
            scrollTrigger: ".popAnimate", // start the animation when ".box" enters the viewport (once)
            scale: 0.5,
            opacity: 0,
            duration: 1,
            stagger: 0.2, // 0.
        });

        
    }, 500)


    


})
</script>
