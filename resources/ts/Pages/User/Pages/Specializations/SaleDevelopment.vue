<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/specialization1.png',
                title: '<h1>Top-Notch ICT and<br>Creative Services</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Generate New Business Leads with<br>our SDR Services.</h4>',
                description: '<p>Our sales development representative (SDR) services are the fuel pumps for your sales engine. SDRs are your frontline troops, diving into the trenches of lead generation. We employ a dynamic arsenal of strategies, from laser-focused emails to magnetic cold calls, captivating social media outreach, and beyond.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: '<b>SDR Services </b>We Offer',
                description: '<p>Information and communication technology (ICT) and creative services are two key areas where outsourcing is advantageous. These departments greatly influence a company’s identity, digital footprint, and innovation. This is also why companies should consider working with a company and industry expert like Reliasourcing.</p>',
                image: '/temp/image1.png',
                imageFirst: true
            }"
        />

        <offer-block 
            :items="[
                {
                    title: 'Market Expansion and Increased Customer Reach',
                    description: '<p>Outsourcing call center operations offers the advantage of a larger workforce and presents a unique opportunity for market expansion. With multilingual operations, for instance, your business can effectively cater to diverse clients, expanding its customer reach and operating round-the-clock to accommodate different time zones.</p>',
                    image: '/temp/specialization2.png',
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                    image: '/temp/specialization3.png',
                    accent: true
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                    image: '/temp/specialization4.png',
                    accent: true
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                    image: '/temp/specialization5.png',
                },
            ]"
        />


        <generic-block 
            class="pt-20 pb-10"
            :item="{
                title: 'Benefits of SDR Services',
                description: '<p>SDR services offer numerous advantages to organizations. Here are some key benefits:</p>',
                image: '/temp/image1.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative"
            :items="[
                { 
                    title: 'Increased Sales', 
                    description: '<p>SDRs work to increase the company’s revenue and sales by finding new prospects for the sales team to pursue.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Efficient Sales Process', 
                    description: '<p>Lead qualification involves assessing prospects to identify the ones with the highest likelihood of converting into paying customers. This strategic process streamlines sales operations, enabling account executives to dedicate their valuable time and effort to the most promising leads, optimizing overall efficiency and effectiveness.</p>',
                    image: '/temp/iso2.png',
                },
                { 
                    title: 'Better Customer Experience', 
                    description: '<p>Discovering the pain points and needs of potential customers lays the groundwork for delivering personalized and relevant information. This not only enhances the customer experience but also boosts the chances of sealing the deal.</p>',
                    image: '/temp/iso3.png',
                },
                { 
                    title: 'Cost-Effective', 
                    description: '<p>Sales development representatives are generally more cost-effective than account executives, enabling organizations to optimize resource allocation.</p>',
                    image: '/temp/iso4.png',
                },
                { 
                    title: 'Scalable', 
                    description: '<p>Organizations can effortlessly tailor their sales efforts to align with shifting market conditions or demand fluctuations by utilizing scalable SDR services. This remarkable flexibility empowers businesses to optimize their sales strategies per their unique requirements, ensuring adaptability and continued success.</p>',
                    image: '/temp/iso5.png',
                },
            ]"
        />
    </user-layout>
</template>
<script lang="ts" setup>
</script>