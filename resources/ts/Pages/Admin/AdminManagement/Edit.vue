<template>
    <admin-layout
    title="Edit Admin"
    :show-back="true"
    :back-url="route('admin.admin-management.index')"
    >
        <div class="p-4 md:p-7">
            <FormSection 
            :form="form"
            :roles="roles">
                <jet-button @click="submit">
                    Save Changes
                </jet-button>
            </FormSection>
        </div>
    </admin-layout>
</template>

<script setup lang="ts">
// Packages
import { ref } from "vue";
import usePRXForm from "@/composables/usePRXForm";

// Components
import FormSection from "./FormSection.vue";

const props = defineProps([ 
    "admin", "roles"
])

/*---------------*
* Variables
*---------------*/

const formData = {
    first_name: props.admin.first_name,
    last_name: props.admin.last_name,
    email: props.admin.email,
    title: props.admin.title,
    role_id: props.admin.role_id
};

/*--------------*
* Functions
*--------------*/
const submitUrl = route("admin.admin-management.edit", props.admin.id);
const { form, submit } = usePRXForm(
    formData,
    submitUrl
);
</script>