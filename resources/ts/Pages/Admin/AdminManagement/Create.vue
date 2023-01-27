<template>
  <admin-layout
    title="Create Admin"
    :breadcrumb-pages="breadcrumbs"
    :show-back="true"
  >
    <div class="space-y-6">
      <div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Admin Information
            </h3>
            <p class="mt-1 text-sm text-gray-500">
              Upon saving, the new user will receive an email notification for
              registration steps.
            </p>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <text-input
                    v-model="form.first_name"
                    label="First Name"
                    id="first_name"
                    :error="form.errors.first_name"
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <text-input
                    v-model="form.last_name"
                    label="Last Name"
                    id="last_name"
                    name="last_name"
                    :error="form.errors.last_name"
                  />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <text-input
                    type="email"
                    v-model="form.email"
                    label="Email"
                    id="email"
                    name="email"
                    :error="form.errors.email"
                  />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <text-input
                    v-model="form.title"
                    label="Job Title"
                    id="title"
                    name="title"
                    :error="form.errors.title"
                  />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <selector
                    v-model="form.department_id"
                    :options="departments"
                    label="Department"
                    id="title"
                    name="title"
                    :error="form.errors.department_id"
                  />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <button
                    @click="submit"
                    type="button"
                    class="
                      inline-flex
                      items-center
                      px-3
                      py-1.5
                      border border-transparent
                      text-xs
                      font-medium
                      rounded-full
                      shadow
                      text-gray-800
                      bg-primary-300
                      hover:bg-primary-300
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-primary-300
                    "
                  >
                    <PlusIcon class="-ml-0.5 mr-2 h-4 w-4" aria-hidden="true" />
                    Create
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import Selector from "@/Components/Selector.vue";
import { PlusIcon } from "@heroicons/vue/24/solid";
import usePRXForm from "@/composables/usePRXForm";

export default {
  components: {
    AdminLayout,
    PlusIcon,
    TextInput,
    Selector,
  },
  props: ["departments"],
  setup() {
    // Breadcrumbs
    const breadcrumbs = [
      {
        name: "Admin Management",
        href: route("admin.admin-management.index"),
      },
      { name: "Create", href: "#" },
    ];

    const formData = {
      first_name: null,
      last_name: null,
      email: null,
      title: null,
      department_id: null,
    };

    const submitUrl = route("admin.admin-management.store");

    const { form, submit } = usePRXForm(formData, submitUrl);
    return {
      breadcrumbs,
      form,
      submit,
    };
  },
};
</script>
