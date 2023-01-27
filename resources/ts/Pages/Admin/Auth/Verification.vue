<template>
  <Head title="Reset Password" />
  <div class="flex flex-wrap items-center h-screen">
    <div class="w-1/2 text-center px-10">
      <jet-authentication-card-logo />
    </div>

    <div class="w-1/2">
      <jet-authentication-card>
        <template #title>
          <h3 class="text-lg font-bold mt-4">Reset Password</h3>
          <p class="text-sm text-gray-500">6-digit code has been sent to sample@email.com</p>
        </template>

        <jet-validation-errors class="mb-4" />

        <form @submit.prevent="submit">
          <div class="flex space-x-3">
            <div>
              <jet-input
                id="otp1"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
            <div>
              <jet-input
                id="otp2"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
            <div>
              <jet-input
                id="otp3"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
            <div>
              <jet-input
                id="otp4"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
            <div>
              <jet-input
                id="otp5"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
            <div>
              <jet-input
                id="otp6"
                type="text"
                class="mt-1 block w-full text-center"
                required
                autofocus
              />
            </div>
          </div>
          <p class="text-sm text-gray-500 text-center mt-6">Didn't receive a code? <a href="" class="font-bold text-primary-500">Resend</a></p>
          <div class="flex items-center mt-6">
            <jet-button
              class="w-full flex justify-center"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Verify
            </jet-button>
          </div>
          <a href="/admin/login" class="text-primary-500 text-sm text-center block mt-6">Return to Login</a>
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

export default {
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetLabel,
    JetValidationErrors,
  },

  props: {
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        otp1: "",
        otp2: "",
        otp3: "",
        otp4: "",
        otp5: "",
        otp6: "",
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("admin.password.email"));
    },
  },
};
</script>
