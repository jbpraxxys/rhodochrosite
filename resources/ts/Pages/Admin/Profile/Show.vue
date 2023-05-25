<template>
  <admin-layout title="Profile Settings" :breadcrumb-pages="breadcrumbs">
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div v-if="$page.props.jetstream.canUpdateProfileInformation">
          <update-profile-information-form :user="$page.props.user" />

          <section-border />
        </div>

        <div v-if="$page.props.jetstream.canUpdatePassword">
          <update-password-form class="mt-10 sm:mt-0" />

          <section-border />
        </div>

        <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
          <two-factor-authentication-form class="mt-10 sm:mt-0" />

          <section-border />
        </div>

        <logout-other-browser-sessions-form
          :sessions="sessions"
          class="mt-10 sm:mt-0"
        />

        <!-- <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
          <section-border />

          <delete-user-form class="mt-10 sm:mt-0" />
        </template> -->
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import SectionBorder from '@/Components/Partials/SectionBorder.vue'
import LogoutOtherBrowserSessionsForm from "./Partials/LogoutOtherBrowserSessionsForm.vue";
import TwoFactorAuthenticationForm from "./Partials/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";

export default {
  props: ["sessions"],

  components: {
    AdminLayout,
    DeleteUserForm,
    SectionBorder,
    LogoutOtherBrowserSessionsForm,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    UpdateProfileInformationForm,
  },

  setup() {
    const breadcrumbs = [
      // { name: "Settings", href: "#", current: false },
      { name: "Profile Settings", href: "#", current: true },
    ];

    return {
      breadcrumbs,
    };
  },
};
</script>
