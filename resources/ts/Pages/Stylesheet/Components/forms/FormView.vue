<template>
    
    <div>
        <div class="mb-4">
            <TextInput
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />

        </div>

        <div class="mb-4">
            <text-input
            label="Price"
            placeholder="Price"
            id="price"
            :add_on_left="true"
            add_on_text="₱"
            type="number"
            />

        </div>

        <div class="mb-4">
            <text-input
            label="Height"
            placeholder="Height"
            id="height"
            :add_on_right="true"
            add_on_text="cm"
            type="number"
            />
        </div>
        <div class="mb-4">
            <selector
                :options="sampleOptions"
                label="Sample Selector"
                id="selector-id"
                name="selector-name"
            />
        </div>
        <div class="mb-4">
            <TextInput
                textarea
                name="textarea-input"
                id="textarea-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />
        </div>

        <div class="mb-4">
            <dropzone
                label="Dropzone"
            />
        </div>

        <!-- <text-field
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />

        <text-field
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />


        <text-area
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />

        <text-area
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />

        <password
            placeholder="Sample Field"
            label="Sample Field"
            class="mb-5 dark"
        />
        <password
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
        />

        <text-editor
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark"
            required
            label-note="test"
        />

        <date-picker
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        />

        <selector
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        />

        <file-picker
            placeholder="Sample Field"
            label="Sample Field Required"
            class="mb-5 dark active"
            required
            label-note="test"
        /> -->
    </div>

</template>
<script>
import TextInput from "@/Components/TextInput.vue";
import Selector from "@/Components/Selector.vue";

// import TextField from 'Components/inputs/TextField.vue';
// import TextArea from 'Components/inputs/TextArea.vue';
// import TextEditor from 'Components/inputs/TextEditor.vue';
// import Password from 'Components/inputs/Password.vue';
// import DatePicker from 'Components/inputs/DatePicker.vue';
// import Selector from 'Components/inputs/Selector.vue';
import Dropzone from '@/Components/Dropzone.vue';

export default {
    components: {
        TextInput,
        Selector,
        // TextField,
        // Password,
        // TextArea,
        // TextEditor,
        // DatePicker,
        // Selector,
        Dropzone
    },
    data: () => ({
        sampleOptions: [
            { id: '1', value: 'Colors'},
            { id: '2', value: 'Typography'},
            { id: '3', value: 'Forms'},
            { id: '4', value: 'Buttons'},
            { id: '5', value: 'Cards'}
        ]
    })
}
</script>