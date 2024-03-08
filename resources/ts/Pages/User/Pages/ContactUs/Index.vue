<template>
    <user-layout>

        <general-banner 
            :item="{
                image: '/temp/solution1.png',
                title: '<h1>Contact Us</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Experience unique advantages when<br>you work with Reliasourcing</h4>',
                description: '<p>With Reliasourcing, you get the benefits of a reliable onsite team that fits your company’s culture and understands your business goals. We free your mind from the stresses of the hiring process and find the perfect fit for your company. Reliasourcing handles everything from hiring, training, and developing your sales agents so you can focus on the core of your business.</p>'
            }"
        />

        <contact-frame class="py-10 bg-primary-50" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>