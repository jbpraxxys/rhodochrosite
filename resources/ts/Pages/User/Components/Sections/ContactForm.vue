<template>
    <div class="flex items-center justify-between max-w-[1280px] m-auto p-10 pb-0">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
        >
        <div class="max-w-[656px] p-8 bg-primary-900 w-full rounded-2xl">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">Contact Us</p>
                <p>Let’s discuss your project, together we will find a solution to the most difficult task</p>
            </div>
            <form class="hm-contact grid grid-cols-2 gap-x-5 gap-y-4">
                <div>
                    <v-selector
                        :options="[{ id: '1', value: 'Contact Center'}]"
                        label="Interested Solutions"
                        placeholder="Select solutions here"
                        id="solution"
                        name="solution"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Roles to Outsource"
                        placeholder="Input Roles to Outsource here"
                        id="roles"
                        name="roles"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Full Name"
                        placeholder="Enter full name here"
                        id="fullname"
                        name="fullname"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Company"
                        placeholder="Enter company here"
                        id="company"
                        name="company"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Position"
                        placeholder="Enter position here"
                        id="position"
                        name="position"
                    />
                </div>
                <div>
                    <v-selector
                        :options="[{ id: '1', value: 'Information Technology'}]"
                        label="Industry"
                        placeholder="Select industry here"
                        id="industry"
                        name="industry"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Email"
                        placeholder="Enter email here"
                        type="email"
                        id="email"
                        name="email"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Phone"
                        placeholder="Enter phone number here"
                        type="number"
                        id="phone"
                        name="phone"
                        :add_on_left="true"
                        add_on_text="+63"
                    />
                </div>
                <div class="col-span-full flex justify-between pt-4">
                    <div>
                        <vue-recaptcha
                            :sitekey="sitekey"
                            @verify="verifySubmission"
                            @expired="expiredRecaptcha"
                            ref="grecaptcha"
                        ></vue-recaptcha>
                    </div>
                    <div>
                        <v-button custom-class="h-12 px-6 !text-base">
                            Submit
                        </v-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { VueRecaptcha } from 'vue-recaptcha';

const form = useForm({
    first_name: null,
    last_name: null,
    email: null,
    subject: null,
    message: null,
    recaptcha_response: null,
});

const verifySubmission = () => {
    form.recaptcha_response = true;
};

const expiredRecaptcha = () => {
    form.recaptcha_response = null;
};

const sitekey = "6Leg04gpAAAAAJvzhxc0KaQU-KvKrnWFWx3u9Gi7";

onMounted(() => {

});
</script>