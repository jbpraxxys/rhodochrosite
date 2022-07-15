<template>
  <admin-layout
    :breadcrumb-pages="breadcrumbs"
    title="Update Role"
    :show-back="true"
    :back-url="route('admin.role-permission-management.index')"
  >
    <div class="mb-6">
      <tabs
        :tabs="tabs"
        :active-tab="activeTab"
        @update:activeTab="(newValue) => (activeTab = newValue)"
        :tab-route="route('admin.role-permission-management.edit', role.id)"
      >
      </tabs>
    </div>

    <div class="space-y-6" v-show="!activeTab">
      <div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Basic Information
            </h3>
            <p class="mt-1 text-sm text-gray-500">
              Upon saving, the new role will have the selected permissions.
            </p>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <TextInput
                  v-model="form.name"
                  label="Name"
                  id="name"
                  :error="form.errors.name"
                />
              </div>
              <div class="col-span-6 sm:col-span-4">
                <TextInput
                  v-model="form.description"
                  label="Description"
                  id="description"
                  :error="form.errors.description"
                />
              </div>
              <div class="col-span-6">
                <jet-button @click="submit" type="button">
                  Save Changes
                </jet-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-6" v-show="activeTab == 'permissions'">
      <div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Role Permissions
            </h3>
            <p class="mt-1 text-sm text-gray-500">
              Abilities for different pages.
            </p>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6">
                <div
                  v-for="permission in permissions"
                  :key="permission.id"
                  class="
                    flex
                    justify-between
                    items-center
                    py-4
                    px-5
                    rounded-lg
                    mb-4
                  "
                >
                  <div>
                    <h5 class="font-bold leading-6">{{ permission.label }}</h5>
                    <p class="mt-1 text-sm text-gray-500">
                      {{ permission.description }}
                    </p>
                  </div>
                  <div class="flex items-center">
                    <Switch
                      v-model="form.permissions[permission.id]"
                      :class="
                        form.permissions[permission.id]
                          ? 'bg-yellow-300'
                          : 'bg-gray-300'
                      "
                      class="
                        relative
                        inline-flex
                        h-6
                        w-11
                        items-center
                        rounded-full
                      "
                    >
                      <span class="sr-only">{{ permission.label }}</span>
                      <span
                        :class="
                          form.permissions[permission.id]
                            ? 'translate-x-6'
                            : 'translate-x-1'
                        "
                        class="
                          inline-block
                          h-4
                          w-4
                          transform
                          rounded-full
                          bg-white
                        "
                      />
                    </Switch>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <activity-logs
      :logs="logs"
      :result-route="route('admin.role-permission-management.edit', role.id)"
      :query="searchText"
      :event="filterEvent"
      v-if="activeTab == 'activity-logs'"
    />
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { PencilAltIcon } from "@heroicons/vue/solid";
import Tabs from "@/Components/Tabs.vue";
import ActivityLogs from "@/Components/ActivityLogs.vue";
import usePRXForm from "@/composables/usePRXForm";
import { computed, ref } from "vue";
import Selector from "@/Components/Selector.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Switch } from "@headlessui/vue";
import JetButton from "@/Jetstream/Button.vue";

export default {
  components: {
    AdminLayout,
    PencilAltIcon,
    Link,
    Tabs,
    ActivityLogs,
    usePRXForm,
    Selector,
    TextInput,
    Switch,
    JetButton
  },
  props: [
    "role",
    "selectedTab",
    "permissions",
    "savedPermissions",
    "logs",
    "logsCount",
    "logQuery",
    "selectedEvent",
  ],
  setup(props) {
    const role = ref(props.role);
    const permissions = ref(props.permissions);
    const activeTab = ref(props.selectedTab);

    const tabs = [
      {
        name: "Information",
        href: "#",
        value: null,
      },
      {
        name: "Permissions",
        href: "#",
        value: "permissions",
      },
      {
        name: "Activity Logs",
        href: "#",
        value: "activity-logs",
        count: props.logsCount,
      },
    ];

    /*---------------*
     * Breadcrumbs
     *---------------*/
    const breadcrumbs = [
      {
        name: "Role",
        href: route("admin.role-permission-management.index"),
        current: true,
      },
    ];

    const formData = {
      name: role.value.name,
      description: role.value.description,
      permissions: props.savedPermissions,
    };

    const submitUrl = route(
      "admin.role-permission-management.edit",
      role.value.id
    );

    const { form, submit } = usePRXForm(formData, submitUrl);

    /*--------------*
     * Activity Logs
     *--------------*/
    const filterEvent = ref(props.selectedEvent);
    const searchText = ref(props.logQuery);
    const logs = computed(() => props.logs);

    return {
      role,
      breadcrumbs,
      // Tabs
      tabs,
      activeTab,
      // Form
      form,
      submit,
      // Permissions
      permissions,
      // Logs
      filterEvent,
      searchText,
      logs,
    };
  },
};
</script>
