<template>
    <user-layout>

        <!-- General Banner -->
        <general-banner 
            :item="{
                image: '/temp/specialization1.png',
                title: '<h1>Top-Notch Creative<br>Services</h1>'
            }"
        />  

        <offset-banner 
            :item="{
                title: '<h4>Innovative ICT and creative<br>outsourcing services for next-level<br>excellence.</h4>',
                description: '<p>Leverage the power of technology to optimize your business functions and make your venture more profitable with Reliasourcing’s ICT and creative outsourcing solutions.</p>'
            }"
        />

        <generic-block 
            class="pb-10 bg-primary-50"
            :item="{
                title: 'Why <b>Outsource ICT</b><br>and <b>Creative Services</b><br>to Reliasourcing?',
                description: '<p>Information and communication technology (ICT) and creative services are two key areas where outsourcing is advantageous. These departments greatly influence a company’s identity, digital footprint, and innovation. This is also why companies should consider working with a company and industry expert like Reliasourcing.</p>',
                image: '/temp/image1.png',
                imageFirst: true
            }"
        />

        <benefit-block 
            class="pb-[120px]"
            :items="[
                {
                    title: 'Operational Flexibility',
                    description: '<p>Staff leasing provides the adaptability and scalability businesses require as workloads and needs evolve. With the help of staff leasing, businesses can easily adjust their workforce size to meet fluctuating demand. Companies can quickly adapt to changes in the market, seasonal requests, or project-specific requirements without going through the time-consuming and costly processes of hiring and letting go of employees. Leasing personnel also allows businesses to maintain flexibility, efficiency, and sensitivity to customer needs.</p>',
                    icon: '/temp/icon1.png',
                },
                {
                    title: 'Cost-Efficient',
                    description: '<p>Staff leasing is attractive to businesses because it can help them reduce costs. By outsourcing to an external provider, companies eliminate the expenses associated with recruitment, onboarding, training, and maintaining a full-time workforce. Reliasourcing can take on these responsibilities, reducing overhead costs such as employee benefits, office space, and equipment. This allows you to allocate resources more efficiently and invest in strategic growth areas.</p>',
                    icon: '/temp/icon2.png',
                },
                {
                    title: 'Advanced Technology Availability',
                    description: '<p>To stay competitive, outsourcing firms frequently upgrade to newer technologies and equipment. Staff leasing allows businesses to use cutting-edge tools without significant financial commitments. Access to advanced technology helps companies to improve operations, streamline procedures, anticipate market shifts, and fuel innovation and expansion.</p>',
                    icon: '/temp/icon3.png',
                },
                {
                    title: 'Expert Access',
                    description: '<p>Today’s business world is complex and constantly changing, making specialized skills increasingly crucial for success. Leasing employees gives businesses access to skilled workers with varied backgrounds and areas of expertise. Whether IT, marketing, customer service, or finance, Reliasourcing can connect businesses with professionals with the necessary skills and knowledge to deliver exceptional results. This access to specialized talent significantly enhances the organization’s productivity, quality, and innovation.</p>',
                    icon: '/temp/icon4.png',
                },
                {
                    title: 'Better Employee Work-Life Balance',
                    description: '<p>Businesses can reduce internal employee workload by outsourcing non-core functions, allowing them to focus on their core responsibilities. This improves employee satisfaction and morale by promoting better work-life balance and reducing stress. When employees can concentrate on their key roles and responsibilities, they will likely be more engaged and productive, contributing to the organization’s overall success.</p>',
                    icon: '/temp/icon5.png',
                },
            ]"
        />

        <image-text-frame 
            :item="{
                image: '/temp/solution2.png',
                title: 'Leverage ICT and Creative Services with Reliasourcing',
                description: '<p>Take advantage of Reliasourcing’s ICT and creative service offerings to streamline operations, eliminate unnecessary steps, and maximize overall productivity.<br><br>Reliasourcing is committed to tailoring a solution to your needs so you only pay for what you use. Contact us right away to get things going.</p>',
                buttonText: 'Outsource with Us',
                buttonLink: '/contact-us'
            }"
        />

        <generic-block 
            class="pt-20 pb-10"
            :item="{
                title: 'Our <b>Specialties</b>',
                description: '<p>Use the power of outsourcing services to your advantage. Take a closer look at what we can offer under our ICT and Creative Services and see what solutions best meet your needs.</p>',
                image: '/temp/image1.png',
            }"
        />

        <specialty-block 
            class="pb-20 z-[2] relative"
            :items="[
                { 
                    title: 'Web Design', 
                    description: '<p>With our web design services, your venture gets access to experts in different specialties. And as a cost-effective solution, you get ongoing support and maintenance operations to ensure your website is always up and running.</p>',
                    image: '/temp/laptop.png',
                },
                { 
                    title: 'Web Development', 
                    description: '<p>With expert web development, you can embark on a digital journey of innovation and functionality. Streamline procedures, improve user experiences, and ensure your website works perfectly on any device. Our expertise in web development allows us to create engaging and intuitive websites for a variety of purposes, from e-commerce to informational portals.</p>',
                    image: '/temp/iso2.png',
                },
                { 
                    title: 'Software Development', 
                    description: '<p>Get the most out of your company with custom software developed to meet your specific demands. Creating an application is time-consuming and intricate, requiring careful thought, preparation, expertise, and self-discipline. Another factor is selecting a development partner, as most businesses need more in-house development expertise and resources. </p>',
                    image: '/temp/iso3.png',
                },
                { 
                    title: 'Graphic Design', 
                    description: '<p>Utilize captivating graphic design to tell stories visually to the highest degree. Engage your audience, convey your message, and create a recognizable brand that will take your business to new horizons. </p>',
                    image: '/temp/iso4.png',
                },
                { 
                    title: 'Animation', 
                    description: '<p>Use engaging animation to take your communication to the next level. Simplify complicated ideas, stimulate discussion, and give your brand a new lease on life with the help of our expert teams. Whether an explainer video or an interactive feature, Reliasourcing’s animation services breathe new life into your content, making it more engaging and likely to be shared.</p>',
                    image: '/temp/iso5.png',
                },
                { 
                    title: 'Content Creation', 
                    description: '<p>Fill your digital presence with engaging, resonant content. Our content creators produce captivating stories, detailed articles, and exciting multimedia to keep your audience interested. These strategies will raise your online profile, encourage interaction, and introduce your company as a pioneer in your field. </p>',
                    image: '/temp/iso6.png',
                },
            ]"
        />

        <contact-frame class="pb-10" />

    </user-layout>
</template>
<script lang="ts" setup>
</script>