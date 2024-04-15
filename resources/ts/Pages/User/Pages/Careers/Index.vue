<template>
    <user-layout>
        <general-banner 
            :item="{
                image: '/temp/contact1.png',
                title: 'Careers'
            }"
        />  
        <offset-banner 
            :item="{
                title: 'Be part of our team!',
                description: 'Join our growing pool of talented experts and take your career to the next level.'
            }"
        />
        <div class="px-20 pb-[120px] max-w-[1440px] m-auto bg-primary-50">
            <div class="grid grid-cols-3 gap-6">
                <career-card 
                    v-for="item in careers"
                    :item="item"
                />
            </div>
        </div>
        <div class="bg-primary-900">
            <div class="max-w-[1440px] m-auto px-20 py-32">
                <div class="text-center text-white mb-10">
                    <p class="text-28 font-bold">What to expect on your journey</p>
                </div>
                <div class="grid grid-cols-4 gap-20">
                    <div v-for="i in journey" class="text-white">
                        <div class="w-24 m-auto mb-6">
                            <img
                                class="w-full h-full object-contain"
                                :src="i.image" 
                                alt="iso"
                            >
                        </div>
                        <div class="text-center">
                            <p class="font-bold text-xl mb-2">{{i.title}}</p>
                            <p>{{ i.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <section class="relative z-[2] bg-primary-50">
            
            <div class="max-w-[1440px] m-auto lg:pb-20 px-4 py-16 lg:px-20">
                <div class="text-center mb-10 lg:mb-10">
                    <p class="text-5xl font-bold">Life at Reliasourcing</p>
                </div>
                <div>
                    <Lightgallery
                        :settings="{ 
                            speed: 500,
                            plugins: plugins
                        }"
                    >
                        <a 
                            href="/"
                        >
                            <img 
                                class="image image-thumb w-full h-full object-cover" 
                                src="/temp/video-thumbnail.png" 
                                alt="thumbnail"
                            >
                        </a>
                    </Lightgallery>
                </div>
                <div class="relative pt-20">
                    <img 
                        class="absolute bottom-[1300px] lg:bottom-0 left-0 lg:scale-100 scale-[200%] -translate-x-[50%] z-1"
                        src="/icons/contact-bg.svg" 
                        alt="contact"
                    >
                    <career-form />
                </div>
            </div>
        </section>
    </user-layout>
</template>
<script lang="ts" setup>
import Lightgallery from 'lightgallery/vue';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';
import lgVideo from 'lightgallery/plugins/video';

const plugins: {} [] = [lgThumbnail, lgZoom, lgVideo];

const careers = [
    {
        title: 'Content Marketing Associate/Marketing Assistant',
        description: 'Bonifacio Global City, Metro Manila <br>₱25,000 - ₱30,000 per month <br>Marketing Assistants/Coordinators <br> (Marketing & Communications)'
    },
    {
        title: 'Marketing Officer',
        description: 'Bonifacio Global City, Metro Manila <br>₱25,000 - ₱30,000 per month <br>Marketing Assistants/Coordinators <br> (Marketing & Communications)'
    },
    {
        title: 'Outbound Sales Agent',
        description: 'Bonifacio Global City, Metro Manila <br>₱25,000 - ₱30,000 per month <br>Marketing Assistants/Coordinators <br> (Marketing & Communications)'
    },
    {
        title: 'Admission Advisor',
        description: 'Pasay City, Metro Manila<br>Customer Service - Call Centre<br>(Call Center & Customer Service)'
    },
]

const journey = [
    {
        title: 'Find the perfect role',
        description: 'Explore roster of open positions to ind the best fit for you.',
        image: '/temp/is1.png'
    },
    {
        title: 'Reach out and apply',
        description: 'Submit all necessary documents for your application.',
        image: '/temp/is2.png'
    },
    {
        title: 'Ace your interview',
        description: 'Submit all necessary documents for your application.',
        image: '/temp/is3.png'
    },
    {
        title: 'Get ready for day one',
        description: 'We’ll ensure your smooth transition to your new role.',
        image: '/temp/is4.png'
    },
]
</script>