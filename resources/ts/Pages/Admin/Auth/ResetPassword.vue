<template>
    <Head title="Reset Password" />

    <div class="flex flex-wrap items-center h-screen">
        <div class="w-1/2 text-center px-10">
            <jet-authentication-card-logo />
        </div>

        <div class="w-1/2">

            <jet-authentication-card>
                <template #title>
                    <h3 class="text-lg font-bold mt-4">New Password</h3>
                    <p class="text-sm text-gray-500">Kindly provide your new password</p>
                </template>

                <jet-validation-errors class="mb-4" />

                <form @submit.prevent="submit">
                    <div>
                        <jet-input
                            id="email"
                            type="email"
                            label="Email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autofocus
                        />
                    </div>

                    <div class="mt-4">
                        <password-input 
                            v-model="form.password"
                            label="Password"
                            placeholder="Your password"
                            id="password"
                            name="password"
                            required autocomplete="new-password"
                        />
                    </div>

                    <div class="mt-4">
                        <password-input 
                            v-model="form.password_confirmation"
                            label="Confirm Password"
                            placeholder="Your password"
                            id="password_confirmation"
                            name="password_confirmation"
                            required autocomplete="confirm-password"
                        />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Reset Password
                        </jet-button>
                    </div>
                </form>
            </jet-authentication-card>
        </div>
    </div>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetValidationErrors,
        PasswordInput,
        EyeIcon,
        EyeSlashIcon
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: "",
                password_confirmation: "",
            }),
            hidden: true,
            hidden2: true,
        };
    },

    methods: {
        submit() {
            this.form.post(this.route("admin.password.update"), {
                onFinish: () => this.form.reset("password", "password_confirmation"),
            });
        },
    },
};
</script>
