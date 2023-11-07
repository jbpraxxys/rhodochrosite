<template>
  <admin-layout title="Profile Settings" :breadcrumb-pages="breadcrumbs">
    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div v-if="$page.props.jetstream.canUpdateProfileInformation">
          <update-profile-information-form :user="$page.props.auth.user" />

                  <JetSectionBorder />
              </div>

              <div v-if="$page.props.jetstream.canUpdatePassword">
                  <update-password-form class="mt-10 sm:mt-0" />

              </div>

              <!-- <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                  <two-factor-authentication-form class="mt-10 sm:mt-0" />

                  <JetSectionBorder />
              </div>

              <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

              <template v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                  <JetSectionBorder />

                  <delete-user-form class="mt-10 sm:mt-0" />
              </template> -->
          </div>
      </div>
  </admin-layout>
</template>

<script>
  import AdminLayout from '@/Layouts/AdminLayout.vue'
  import DeleteUserForm from '@/Pages/Admin/Profile/Partials/DeleteUserForm.vue'
  import JetSectionBorder from '@/Components/Partials/SectionBorder.vue'
  import LogoutOtherBrowserSessionsForm from '@/Pages/Admin/Profile/Partials/LogoutOtherBrowserSessionsForm.vue'
  import TwoFactorAuthenticationForm from '@/Pages/Admin/Profile/Partials/TwoFactorAuthenticationForm.vue'
  import UpdatePasswordForm from '@/Pages/Admin/Profile/Partials/UpdatePasswordForm.vue'
  import UpdateProfileInformationForm from '@/Pages/Admin/Profile/Partials/UpdateProfileInformationForm.vue'

  export default {
      props: ['sessions'],

      components: {
          AdminLayout,
          DeleteUserForm,
          JetSectionBorder,
          LogoutOtherBrowserSessionsForm,
          TwoFactorAuthenticationForm,
          UpdatePasswordForm,
          UpdateProfileInformationForm,
      },
  }
</script>
