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
            <jet-label for="email" value="Email" />
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
                autocomplete="new-password"
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

          <div class="mt-4">
            <jet-label for="password_confirmation" value="Confirm Password" />
            <div class="relative">
              <jet-input
                id="password_confirmation"
                :type="hidden2 ? 'password' : 'text'"
                class="mt-1 block w-full pr-11"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
              />
              <div class="absolute right-0 top-0">
                <button
                    type="button"
                    tabindex="-1"
                    class="border-0 h-11 w-11"
                    @click="hidden2 = !hidden2"
                >
                    <EyeIcon
                      v-if="hidden2"
                      class="h-5 w-5 my-auto mx-auto text-gray-500"
                      aria-hidden="true"
                    />
                    <EyeSlashIcon
                      v-if="!hidden2"
                      class="h-5 w-5 my-auto mx-auto text-gray-500"
                      aria-hidden="true"
                    />
                </button>
              </div>
            </div>
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
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
export default {
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetLabel,
    JetValidationErrors,
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
