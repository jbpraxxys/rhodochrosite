<template>
    <div class="flex lg:flex-row flex-col items-center justify-between max-w-[1280px] m-auto lg:p-10 pb-0 z-[10] relative">
        <img
            class="w-[483px]" 
            src="/icons/contact-img.svg" 
            alt="contact"
        >
        <div class="max-w-[656px] p-6 lg:p-8 bg-primary-900 w-full rounded-2xl">
            <div class="text-white mb-6">
                <p class="font-semibold text-3xl mb-3">Submit Application</p>
                <p>Please submit your comprehensive resumé via online form.</p>
            </div>
            <form @submit.prevent="submit" class="hm-contact grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-4">
                <div>
                    <v-text-input
                        label="Name"
                        placeholder="Your name"
                        id="roles"
                        name="roles"
                        v-model="form.role"
                        :error="form.errors.role"
                    />
                </div>
                <div>
                    <v-text-input
                        label="Email"
                        placeholder="Enter email here"
                        type="email"
                        id="email"
                        name="email"
                        v-model="form.email"
                        :error="form.errors.email"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        label="Contact Number"
                        placeholder="Enter contact number here"
                        type="number"
                        id="phone"
                        name="phone"
                        :add_on_left="true"
                        add_on_text="+63"
                        v-model="form.phone"
                        :error="form.errors.phone"
                    />
                </div>
                <div class="col-span-full">
                    <v-text-input
                        label="Position"
                        placeholder="Enter position here"
                        id="position"
                        name="position"
                        v-model="form.position"
                        :error="form.errors.position"
                    />
                </div>
                <div class="col-span-full">
                    <label class="block text-sm text-gray-900 mb-1">Your Resume</label>
                    <div class="flex items-center space-x-6">
                        <div class="w-[calc(100%-134px)] bg-white text-gray-400 text-sm px-4 h-11 flex items-center justify-center rounded-md">
                            <p class="w-full">No file chosen</p>
                        </div>
                        <div class="relative text-primary-500 font-medium cursor-pointer">
                            <img 
                                class="h-11" 
                                src="/icons/export.svg" 
                                alt="button"
                            >
                            <p class="absolute top-1/2 w-full text-center -translate-y-1/2 text-sm">Choose File</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-full">
                    <v-text-input
                        label="Cover Letter"
                        placeholder="Enter Cover Letter"
                        id="cover"
                        name="cover"
                        v-model="form.cover"
                        :error="form.errors.cover"
                        :textAreaRows="7"
                        textarea
                    />
                </div>
               
                <div class="col-span-full">
                    <vue-recaptcha
                        :sitekey="sitekey"
                        @verify="verifySubmission"
                        @expired="expiredRecaptcha"
                        ref="grecaptcha"
                    ></vue-recaptcha>
                </div>
                    
                <div class="col-span-full">
                    <v-button 
                        size="md"
                        @click="submit"
                        :disabled="!form.recaptcha_response"
                    >
                        Submit Application
                    </v-button>
                </div>
            </form>
        </div>
    </div>

    <v-success-modal
        :show="showSuccessModal"
        @close="showSuccessModal = false"
        title="Inquiry Submitted!"
        description="Inquiry has been successfully submitted"
    >
        <template #button>
            <div class="flex items-center justify-end">
                <v-button 
                    @click="reload"
                    design-color="text-white"
                >
                    Confirm
                </v-button>
            </div>
        </template>
    </v-success-modal>
</template>
<script lang="ts" setup>
import { useForm } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";
import { VueRecaptcha } from 'vue-recaptcha';

const form = useForm({
    name: null,
    email: null,
    phone: null,
    position: null,
    resume: null,
    cover: null,
    recaptcha_response: null,
});

const emit = defineEmits(['close', 'showSuccess'])

const verifySubmission = () => {
    form.recaptcha_response = true;
};

const expiredRecaptcha = () => {
    form.recaptcha_response = null;
};

const showSuccessModal = ref(false);

const reload = () => {
    showSuccessModal.value = false;
    location.reload();
}

const submitUrl = route("web.subscription.submit");
const submit = () => {
    form.post(submitUrl, {
        preserveScroll: true,
        onSuccess: () => {
        emit('showSuccess')
        showSuccessModal.value = true;
        form.reset();
        },
    });
};

const sitekey = "6Leg04gpAAAAAJvzhxc0KaQU-KvKrnWFWx3u9Gi7";

onMounted(() => {

});
</script>