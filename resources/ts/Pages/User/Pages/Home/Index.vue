<template>
    <user-layout>
        <section class="relative lg:h-screen">
            <div class="px-4 lg:px-20 pt-[141px] lg:pt-[169px] lg:absolute lg:top-0 lg:left-0 z-[2] lg:bg-transparent bg-primary-900">
                <div class="w-full lg:w-[36vw] text-white">
                    <h1 class="text-5xl leading-tight lg:text-[5.1vw] lg:leading-[5.1vw] mb-6 font-bold">
                        Free your<br>mind to <b class="text-primary-500">focus</b> on your core business
                    </h1>
                    <div class="max-w-[294px] mb-8 lg:mb-12">
                        <p>Let us guide you towards your goals and help you soar to new heights of success.</p>
                    </div>
                    <v-button custom-class="h-14 px-6 !text-base">
                        Outsource with Us
                    </v-button>
                </div>
            </div>
            <frame-one class="lg:w-full w-[150%] relative right-[50%] lg:right-0" />
        </section>

        <section class="relative">
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:p-20">
                <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-8">
                    <div class="flex items-center justify-center animateUp lg:pb-0 pb-20">
                        <p class="text-3xl font-bold">
                            Tailor-made Business Process Outsourcing Solutions.
                        </p>
                    </div>
                    <service-card
                        class="animateUp"
                        v-for="item in items1"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <section class="bg-primary-900 text-white">
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:px-20 lg:py-[120px]">
                <div class="max-w-[835px] m-auto text-center mb-20">
                    <p class="text-3xl font-bold reveal-type mb-8">Client-centric Custom Solutions</p>
                    <p class="text-xl font-bold reveal-type">Reliasourcing is your strategic partner for business success. Located in the Philippines' bustling business district, we’re ready to help you elevate your business to new heights.</p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-4 w-full gap-8 lg:gap-20">
                    <values-card
                        v-for="item in items2"
                        :item="item"
                    />
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:px-20 lg:py-[120px]">
                <div class="space-y-8">
                    <image-text 
                        :item="{
                            title: '<p><b>Better</b> and <b>Faster</b> Web Development Outsourcing</p>',
                            description: '<p>Elevate your digital footprint with our results-focused web development teams.<br><br>We work with you through an end-to-end process encompassing project initiation until successful launch. We leverage cutting-edge technologies to craft seamless and high-performing websites. Our experts transform your concepts into dynamic online solutions. Leverage the strength of a success driven team, diverse skills, efficient collaboration, and a steadfast commitment to achieving your business goals.</p>',
                            image: '/temp/image1.png',
                            buttonText: 'Learn More',
                            designColor: 'text-white'
                        }"
                    />
                    <image-text 
                        :item="{
                            title: '<p><b>Elevate Your Business</b> with High - Performance Sales Teams</p>',
                            description: '<p>Our collaborative, dynamic, and skilled professionals bring extensive expertise to boost your sales success. We prioritize surpassing targets and nurturing client relationships, as our team ensures a streamlined journey from prospecting to deal closure. <br><br>Experience exceptional sales performance through effective collaboration and strategic planning to reach your goals. Elevate your business with a sales team dedicated to delivering outstanding results. </p>',
                            image: '/temp/image2.png',
                            imageFirst: true,
                            buttonText: 'Learn More',
                            designColor: 'text-white'
                        }"
                    />
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto px-4 lg:px-20 counter-container">
                <div class="flex lg:flex-row flex-col lg:items-center space-x-0 lg:space-x-8 justify-between mb-12 lg:space-y-0 space-y-6">
                    <div class="lg:max-w-[363px] w-full image-text">
                        <p class="text-3xl font-bold title"><b>Reliable</b> Solutions.<br><b>Real</b> Results.</p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 lg:gap-8 w-[cacl(100%-395)]">
                        <div>
                            <p class="text-3xl font-bold">$<span class="counter" data-count="100" data-speed="100"></span>M+</p>
                            <p>Generated Revenue for Clients</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold"><span class="counter" data-count="1000000" data-speed="300"></span>+</p>
                            <p>Tickets Resolved Annually</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold"><span class="counter" data-count="71" data-speed="70"></span>%</p>
                            <p>Faster Time-to-Hire<br>(vs. Industry Standard)</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold"><span class="counter" data-count="500" data-speed="100"></span>+</p>
                            <p>Full-time Employees</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 lg:p-14 bg-primary-50 rounded-2xl flex lg:space-x-11 items-center lg:flex-row flex-col space-y-6 lg:space-y-0">
                    <img 
                        class="w-full lg:w-[340px] showLeft" 
                        src="/temp/ceo.png" 
                        alt="ceo"
                    >
                    <div class="lg:w-[calc(100%-384px)] relative">
                        <img
                            src="/icons/quote.svg" 
                            alt="quote"
                            class="absolute -top-4 lg:-top-8 left-0 lg:-left-8"
                        >
                        <p class="text-xl lg:text-2xl font-medium poppins mb-4 animateUp">Reliasourcing’s revenue optimization services are exceptional. Their team developed a customized strategy tailored to our goals, resulting in a significant increase in revenue. Regular updates and reports kept us informed and their expertise and commitment to quality make them a valuable partner. Highly recommended!</p>
                        <p class="text-sm font-bold animateUp">Edoardo Arnello, CEO</p>
                        <p class="text-sm animateUp">CEO, Accesiway</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="max-w-[1440px] m-auto px-4 py-16 lg:p-20 text-center">
                <p class="text-xl font-bold mb-8">Trusted by Companies Worldwide</p>
                <company-slider />
            </div>
        </section>

        <section class="bg-primary-900">
            <div class="max-w-[1440px] m-auto text-center px-4 py-16 lg:px-0 lg:py-[120px]">
                <div class="max-w-[715px] m-auto text-white">
                    <p class="text-5xl font-bold mb-4 animateUp">Collaborate With Us</p>
                    <p class="mb-12 text-xl animateUp">Reliasourcing goes above and beyond merely catering to your unique requirements. With our stellar specializations, we will help you move your business forward strategically and efficiently.</p>
                    <v-button class="animateUp">Outsource with Us</v-button>
                </div>
            </div>
        </section>

        <section class="relative">
            <img 
                class="absolute bottom-[1300px] lg:bottom-0 left-0 lg:scale-100 scale-[200%] -translate-x-[50%] z-1"
                src="/icons/contact-bg.svg" 
                alt="contact"
            >
            <div class="max-w-[1440px] m-auto lg:py-[120px] lg:px-20 px-4 py-16 relative z-[2]">
                <div class="flex lg:flex-row flex-col lg:space-y-0 space-y-8 lg:space-x-20 max-w-[1062px] m-auto mb-24">
                    <div class="w-full lg:w-1/2 image-text">
                        <p class="font-bold text-3xl mb-6 animateUp title reveal-type">The Reliasourcing<br>Framework for <b>Success</b></p>
                        <div class="text-xl mb-4 lg:mb-12 animateUp">
                            <p>Designed to meet the dynamic needs of our clients and drive sustainable business growth.</p>
                            <br>
                            <p>Our approach encompasses four key stages, each meticulously crafted to deliver solutions and foster long-term success.</p>
                        </div>
                        <v-button custom-class="h-14 px-6 !text-base animateUp" design-color="text-white">
                            About Us
                        </v-button>
                    </div>
                    <div class="w-full lg:w-1/2 space-y-4">
                        <div v-for="item in items3" class="animateUp">
                            <div class="p-6 lg:p-8 bg-primary-50 rounded-2xl group/tech hover:-translate-y-2 transition duration-300 hover:shadow-md">
                                <p class="text-xl font-bold mb-2">{{item.title}}</p>
                                <p>{{ item.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <home-contact-form />
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import { onMounted } from 'vue';
import FrameOne from './Components/FrameOne.vue';
import CompanySlider from './Components/CompanySlider.vue';
import HomeContactForm from './Components/ContactForm.vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const items1 = [
    { 
        title: 'Contact Center', 
        description: 'Revolutionize your customer service operations with our customized solutions to meet your business and customers’ needs.',
        image: '/temp/home1.png',
        link: '/'
    },
    { 
        title: 'Managed Services', 
        description: 'Easily access specialized professionals you need and avoid the costs of hiring new employees.',
        image: '/temp/home6.png',
        link: '/'
    },
    { 
        title: 'Staff Leasing', 
        description: 'Access a pool of external talent and resources. We’ll delegate administrative tasks from hiring, payroll, and benefits.',
        image: '/temp/home2.png',
        link: '/'
    },
    { 
        title: 'Workforce Management', 
        description: 'Optimize staffing and workload requirements and the scheduling processes needed to meet your business goals.',
        image: '/temp/home5.png',
        link: '/'
    },
]

const items2 = [
    { 
        title: 'Flexible Solutions', 
        description: 'We create custom-built solutions that guarantee the best  resource utilization based on your needs',
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
        title: 'Client Needs Assessment',
        description: 'Before jumpstarting the partnership, we make sure that we have a comprehensive understanding of the unique needs of each client. This involves collaborative discussions, assessment of existing processes, and identification of pain points.'
    },
    {
        title: 'Customized Solutions',
        description: 'Our team provides a detailed proposal outlining the scope of services, technology integration, and a transparent pricing model to ensure alignment with the client’s long-term goals.'
    },
    {
        title: 'Strategic Long-Term Planning',
        description: 'As we consistently improve our project satisfaction and adapt to the evolving industry trends, we engage in collaborative long-term planning with our clients. We provide continuous improvements and make proactive adjustments based on your business needs.'
    },
    {
        title: 'Monitoring & Optimization',
        description: 'We implement regular performance reporting to ensure continuous improvement. Our experts analyze data, measure key performance indicators (KPIs), and deliver transparent reports to clients.'
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
