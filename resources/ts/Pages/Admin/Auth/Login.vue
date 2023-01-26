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
            <jet-label for="password" value="Password" />
            <div class="relative">
              <jet-input
                id="password"
                :type="hidden ? 'password' : 'text'"
                class="mt-1 block w-full pr-11"
                v-model="form.password"
                required
                autocomplete="current-password"
              />
              <div class="absolute right-0 top-0">
                <button
                    type="button"
                    tabindex="-1"
                    class="border-0 h-11 w-11"
                    @click="hidden = !hidden"
                >
                    <EyeIcon
                      v-if="hidden"
                      class="h-5 w-5 my-auto mx-auto text-gray-500"
                      aria-hidden="true"
                    />
                    <EyeSlashIcon
                      v-if="!hidden"
                      class="h-5 w-5 my-auto mx-auto text-gray-500"
                      aria-hidden="true"
                    />
                </button>
              </div>
            </div>
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
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
    EyeIcon,
    EyeSlashIcon
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
      hidden: true,
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
