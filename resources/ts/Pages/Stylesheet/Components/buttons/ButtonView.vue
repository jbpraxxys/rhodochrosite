<template>
    <div>
        <div class="w-full">
            <h4 class="mb-4 text-gray-600 font-medium">Admin Buttons</h4>
            <div class="mb-8">
                <EditButton />
                <DeleteButton />
                <RestoreButton />
            </div>
            <div class="mb-4">
                <CreateButton/>
            </div>
            <div class="mb-4 space-x-4">
                <ExportButton />
                <ImportButton />
                
            </div>
            <div class="mb-4 flex space-x-4">
                <jet-button
                type="button"

                >
                    Primary
                </jet-button>
                <jet-button
                type="button"
                secondary
                >
                    Secondary
                </jet-button>
                <jet-button
                type="button"
                textButton
                >
                    Text
                </jet-button>
            </div>
            <div class="mb-4 flex space-x-4">
                <jet-button
                type="button"
                arrowIcon
                >
                    Primary
                </jet-button>
                <jet-button
                type="button"
                checkCircleIcon
                >
                    Secondary
                </jet-button>
            </div>
        </div>

        <!-- <div class="w-full border-t border-gray-200 my-20"></div>

        <h4 class="mb-4 text-gray-600 font-medium">User Buttons</h4>
        <div class="w-full grid grid-cols-1 gap-8 mb-8">
            <div class="col-span-1">
                <p class="font-semibold mb-4">Button Colors</p>
                <div class="flex space-x-3">
                    <v-button>
                        Button Default
                    </v-button>
                    <v-button fillColor="gray">
                        Button Gray
                    </v-button>
                    <v-button fillColor="blue">
                        Button Yellow
                    </v-button>
                </div>
            </div>
            <div class="col-span-1">
                <p class="font-semibold mb-4">Button Size</p>
                <div class="flex space-x-3">
                    <v-button>
                        Button Default
                    </v-button>
                    <v-button size="md">
                        Button Medium
                    </v-button>
                    <v-button size="sm">
                        Button Small
                    </v-button>
                </div>
            </div>
            <div class="col-span-1">
                <p class="font-semibold mb-4">Button Fill</p>
                <div class="flex space-x-3">
                    <v-button>
                        Button Fill
                    </v-button>
                    <v-button :fill="false" fillColor="primary-outline">
                        Button Outline
                    </v-button>
                </div>
            </div>
            <div class="col-span-1">
                <p class="font-semibold mb-4">Button Mode</p>
                <div class="flex flex-col space-y-3">
                    <v-button block>
                        Button Block
                    </v-button>
                    <v-back-button
                        routeLink="/"
                    >
                        Back to Home
                    </v-back-button>
                </div>
            </div>
        </div> -->
    </div>
    

</template>
<script setup lang="ts">
import CreateButton from "@/Components/ActionButtons/CreateButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import ExportButton from "@/Components/ActionButtons/ExportButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import JetButton from "@/Components/ActionButtons/JetButton.vue";
import ImportButton from "@/Components/ActionButtons/ImportButton.vue";

</script>