<template>
    
    <div>
        <div class="mb-4">
            <v-input
                type="text"
                name="text-input"
                id="text-input"
                placeholder="Sample Placeholder"
                label="Sample Label"
            />

        </div>

        <div class="mb-4">
            <v-input
                label="Price"
                placeholder="Price"
                id="price"
                :add_on_left="true"
                add_on_text="₱"
                type="number"
            />

        </div>

        <div class="mb-4">
            <v-input
                label="Height"
                placeholder="Height"
                id="height"
                :add_on_right="true"
                add_on_text="cm"
                type="number"
            />
        </div>
        <div class="mb-4">
            <v-selector
                :options="sampleOptions"
                label="Sample Selector"
                id="selector-id"
                name="selector-name"
            />
        </div>
        <div class="mb-4">
            <v-input
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

export default {
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