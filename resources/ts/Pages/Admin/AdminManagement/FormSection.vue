<template>
    <jet-form-section>
        <template #title>
            Admin Information
        </template>

        <template #description>
            Upon saving, the new user will receive an email notification for registration steps.
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-input
                    v-model="form.first_name"
                    label="First Name"
                    id="first_name"
                    :error="form.errors.first_name"
                />
            </div>
            <div class="col-span-6">
                <jet-input
                    v-model="form.last_name"
                    label="Last Name"
                    id="last_name"
                    name="last_name"
                    :error="form.errors.last_name"
                />
            </div>
            <div class="col-span-6">
                <jet-input
                    type="email"
                    v-model="form.email"
                    label="Email"
                    id="email"
                    name="email"
                    :error="form.errors.email"
                />
            </div>

            <div class="col-span-6">
                <jet-input
                    v-model="form.title"
                    label="Job Title"
                    id="title"
                    name="title"
                    :error="form.errors.title"
                />
            </div>

            <div class="col-span-6">
                <selector
                    v-model="form.role_id"
                    :options="roles"
                    label="Role"
                    id="title"
                    name="title"
                    :error="form.errors.role_id"
                />
            </div>
        </template>

        <template #actions>
            <slot />
        </template>
    </jet-form-section>
</template>

<script setup lang="ts">
defineProps ({
    form: {
        type: Object,
        required: true
    },
    roles: {
        type: Object
    }
});
</script>
