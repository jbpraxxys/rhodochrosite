<template>
    <div>
        <div class="mb-8">
            <p class="font-semibold mb-4">Action Buttons</p>
            <EditButton />
            <DeleteButton />
            <RestoreButton />
        </div>
        <div class="mb-4">
            <CreateButton />
        </div>
        <div class="mb-4">
            <ExportButton />
        </div>

        <div class="mb-4">
            <jet-button
            type="button"
            >
                Save Changes
            </jet-button>
        </div>
    </div>
    

</template>
<script>
import CreateButton from "@/Components/ActionButtons/CreateButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import ExportButton from "@/Components/ActionButtons/ExportButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import JetButton from "@/Jetstream/Button.vue";
export default {
    components: {
        CreateButton,
        DeleteButton,
        EditButton,
        ExportButton,
        RestoreButton,
        JetButton
    },
}
</script>