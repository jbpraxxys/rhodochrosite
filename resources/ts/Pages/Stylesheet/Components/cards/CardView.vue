<template>
    <div>
        <h4 class="mb-4 text-gray-600 font-medium">Cards</h4>

        <div class="w-full border-t border-gray-200 my-20"></div>

        <h4 class="mb-4 text-gray-600 font-medium">Modals</h4>
        <div class="flex flex-col space-y-3">
            <v-button
                @click="showConfirmModal = true">
                Show Confirmation
            </v-button>
            <v-button
                @click="showDeleteModal = true">
                Show Delete
            </v-button>
            <v-button
                @click="showDialogModal = true">
                Show Dialog
            </v-button>
            <v-button
                @click="showSuccessModal = true">
                Show Success
            </v-button>
        </div>
        <v-confirmation-modal 
            :show="showConfirmModal"
            @cancel="showConfirmModal = false"
            title="Submit Inquiry"
            description="Are you sure you wish to submit this inquiry?" 
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="showConfirmModal = false" fill="outline" class="mr-2">Cancel</v-button>
                    <v-button @click="openSuccessModal()">Proceed</v-button>
                </div>
            </template>

        </v-confirmation-modal>
        <v-delete-modal 
            :show="showDeleteModal"
            @cancel="showDeleteModal = false"
            title="Delete Inquiry"
            description="Are you sure you wish to delete this inquiry?" 
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="showDeleteModal = false" fill="outline" class="mr-2">Cancel</v-button>
                    <v-button @click="openSuccessModal()">Proceed</v-button>
                </div>
            </template>

        </v-delete-modal>
        <v-dialog-modal 
            :show="showDialogModal"
            @cancel="showDialogModal = false"
        >
            <template #title>
                <h4 class="mb-4 text-gray-600 font-medium">Sample Dialog</h4>
            </template>
            <template #content>
                <p class="mb-4">Sample content here</p>
            </template>
            <template #footer>
                <div class="flex items-center justify-end">
                    <v-button @click="closeSuccessModal()">Confirm</v-button>
                </div>
            </template>
        </v-dialog-modal>
        <v-success-modal 
            :show="showSuccessModal"
            @cancel="showSuccessModal = false"
            title="Inquiry Submitted!"
            description="Inquiry has been successfully submitted"
        >
            <template #button>
                <div class="flex items-center justify-end">
                    <v-button @click="closeSuccessModal()">Confirm</v-button>
                </div>
            </template>
        </v-success-modal>
    </div>
</template>
<script setup lang="ts">
import { ref, onMounted } from 'vue';

const showSuccessModal = ref(false);
const showDeleteModal = ref(false);
const showDialogModal = ref(false);
const showConfirmModal = ref(false);

const openSuccessModal = () => {
    showConfirmModal.value = false;
    showDeleteModal.value = false;
    showDialogModal.value = false;
    showSuccessModal.value = true;
}

const closeSuccessModal = () => {
    showSuccessModal.value = false;
    window.location.reload()
}
</script>