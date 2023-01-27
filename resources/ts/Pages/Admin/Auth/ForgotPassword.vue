<template>
  <Head title="Forgot Password" />
  <div class="flex flex-wrap items-center h-screen">
    <div class="w-1/2 text-center px-10">
      <jet-authentication-card-logo />
    </div>

    <div class="w-1/2">
      <jet-authentication-card>
        <template #title>
          <h3 class="text-lg font-bold mt-4">Forgot Password</h3>
          <p class="text-sm text-gray-500">Kindly provide your email address</p>
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
          {{ status }}
        </div>

        <jet-validation-errors class="mb-4" />

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

          <div class="flex items-center mt-4">
            <jet-button
              class="w-full flex justify-center"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Submit
            </jet-button>
          </div>
          <a href="/admin/login" class="text-primary-500 text-sm text-center block mt-6">Return to Login</a>
        </form>
      </jet-authentication-card>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";
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
        email: "",
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
