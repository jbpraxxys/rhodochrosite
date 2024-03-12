<template>
    <div class="flex lg:flex-row flex-col items-center justify-between max-w-[1280px] m-auto lg:p-10 pb-0">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
        >
        <div class="max-w-[656px] p-6 lg:p-8 bg-primary-900 w-full rounded-2xl">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">Let's Chat!</p>
                <p>Drop us a line and access reliable solutions.</p>
            </div>
            <form class="hm-contact grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-4">
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
                        label="Phone"
                        placeholder="Enter phone number here"
                        type="number"
                        id="phone"
                        name="phone"
                        :add_on_left="true"
                        add_on_text="+63"
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
                        label="Company"
                        placeholder="Enter company here"
                        id="company"
                        name="company"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        textarea
                        label="Message"
                        placeholder="Enter message (optional)"
                        id="message"
                        name="message"
                        text-area-rows="5"
                    />
                </div>
                <div class="col-span-full flex lg:flex-row flex-col lg:space-y-0 space-y-4 justify-between pt-2">
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