<template>
    <Head title="Log in" />

    <div class="flex flex-wrap items-center h-screen">
        <div class="w-1/2 text-center px-10">
            <jet-authentication-card-logo />
        </div>

        <div class="w-1/2">
            <jet-authentication-card>
                <template #title>
                    <h3 class="text-lg font-bold mt-4">Admin</h3>
                    <p class="text-sm text-gray-500">Kindly input your credentials to continue</p>
                </template>

                <jet-validation-errors class="mb-4" />

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <jet-label for="email" value="Email Address" />
                        <jet-input
                            id="email"
                            type="email"
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
                            required autocomplete="current-password"
                        />
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center">
                            <jet-checkbox name="remember" v-model:checked="form.remember" />
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <Link
                                v-if="canResetPassword"
                                :href="route('admin.password.request')"
                                class="font-semi-bold text-gray-800 hover:text-gray-500"
                            >
                                Forgot your password?
                            </Link>
                        </div>
                    </div>

                    <div class="flex items-center mt-4">
                        <jet-button
                            class="w-full flex justify-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </jet-button>
                    </div>
                </form>
            </jet-authentication-card>
        </div>
    </div>
</template>

<script>
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetValidationErrors from "@/Components/Inputs/ValidationErrors.vue";
import PasswordInput from "@/Components/Inputs/PasswordInput.vue";
import { Head, Link } from "@inertiajs/vue3";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
    components: {
        Head,
        JetAuthenticationCard,
        JetAuthenticationCardLogo,
        JetValidationErrors,
        PasswordInput,
        Link,
        EyeIcon,
        EyeSlashIcon,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false,
            }),
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("admin.login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
};
</script>
