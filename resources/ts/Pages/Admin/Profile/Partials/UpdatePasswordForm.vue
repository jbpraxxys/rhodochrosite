<template>
    <JetFormSection @submitted="showModal = true">
        <template #title> Security Information </template>

        <template #description> Relevant data and other information. </template>

        <template #form>
            <div class="col-span-6">
                <div class="relative">
                    <JetInput
                        id="password"
                        :type="hidden2 ? 'text' : 'password'"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        autocomplete="new-password"
                        label="New Password"
                    />
                    <div class="absolute right-0 bottom-0">
                        <button type="button" tabindex="-1" class="border-0 h-11 w-11" @click="hidden2 = !hidden2">
                            <EyeIcon v-if="hidden2" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                            <EyeSlashIcon v-if="!hidden2" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                        </button>
                    </div>
                </div>
                <JetInputError :message="form.errors.password" class="mt-2" />
            </div>

            <div class="col-span-6">
                <div class="relative">
                    <JetInput
                        id="password_confirmation"
                        :type="hidden3 ? 'text' : 'password'"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                        label="Confirm Password"
                    />
                    <div class="absolute right-0 bottom-0">
                        <button type="button" tabindex="-1" class="border-0 h-11 w-11" @click="hidden3 = !hidden3">
                            <EyeIcon v-if="hidden3" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                            <EyeSlashIcon v-if="!hidden3" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                        </button>
                    </div>
                </div>
                <JetInputError :message="form.errors.password_confirmation" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"> Save Changes </JetButton>

            <JetActionMessage :on="form.recentlySuccessful" class="ml-3"> Saved! </JetActionMessage>
        </template>
    </JetFormSection>

    <ConfirmationModal
        :show="showModal"
        @cancel="showModal = false"
        title="Update Password"
        description="Are you sure you wish to update your password?"
    >
        <template #content>
            <div class="mb-4">
                <JetLabel for="current_password" value="Current Password" />
                <div class="relative">
                    <JetInput
                        id="current_password"
                        :type="hidden ? 'text' : 'password'"
                        class="mt-1 block w-full"
                        v-model="form.current_password"
                        autocomplete="current-password"
                    />
                    <div class="absolute right-0 top-0">
                        <button type="button" tabindex="-1" class="border-0 h-11 w-11" @click="hidden = !hidden">
                            <EyeIcon v-if="hidden" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                            <EyeSlashIcon v-if="!hidden" class="h-5 w-5 my-auto mx-auto text-gray-500" />
                        </button>
                    </div>
                </div>
                <JetInputError :message="form.errors.current_password" class="mt-2" />
            </div>
        </template>

        <template #button>
            <div class="flex items-center justify-end">
                <JetButton @click="showModal = false" secondary class="mr-2">Cancel</JetButton>
                <JetButton @click="submit()">Proceed</JetButton>
            </div>
        </template>
    </ConfirmationModal>
</template>

<script lang="ts" setup>
import JetActionMessage from "@/Components/Modals/JetActionMessage.vue";
import JetInputError from "@/Components/Inputs/InputError.vue";
import ConfirmationModal from "@/Components/Modals/ConfirmationModal.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

/*--------------*
 * VARS
 *--------------*/
const showModal = ref<boolean>(false);
const hidden = ref<boolean>(false);
const hidden2 = ref<boolean>(false);
const hidden3 = ref<boolean>(false);

const form = useForm({
    current_password: null,
    password: null,
    password_confirmation: null,
});

/*--------------*
 * METHODS
 *--------------*/
const submit = () => {
    form.put(route("admin.user-password.update"), {
        errorBag: "updatePassword",
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            showModal.value = false;
        },
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
            }

            if (form.errors.current_password) {
                form.reset("current_password");
            }
        },
    });
};
</script>
