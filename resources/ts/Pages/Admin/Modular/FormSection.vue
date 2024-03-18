<template>
    <div class="space-y-6 divide-y">
        <jet-form-section>
            <template #title>
                Activity
            </template>

            <template #description>
                Relevant data and other details
            </template>

            <template #form>
                <div class="col-span-12">
                    <selector
                        :modelValue="form.language_id"
                        :options="languages"
                        label="Select Language"
                        id="language"
                        name="language"
                        :error="form.errors.language_id"
                        @update:modelValue="
                            (newValue) => (form.language_id = newValue)
                        "
                    />
                </div>
                <div class="col-span-12">
                    <text-input
                        v-model="form.title"
                        label="Title"
                        id="title"
                        :error="form.errors.title"
                    />
                </div>
                <div class="col-span-12">
                    <ck-editor
                        v-model="form.content"
                        label="Content"
                        id="content"
                        name="content"
                        :error="form.errors.content"
                    />
                </div>
                <div class="col-span-12">
                    <dropzone
                        label="Thumbnail"
                        v-model:path="form.thumbnail"
                        v-model:file="form.thumbnail"
                        description="Max file size: 10MB | Dimension: 395px x 395px"
                        :error="form.errors.thumbnail_path"
                    ></dropzone>
                </div>
                <div class="col-span-12">
                    <dropzone
                        label="Activity Images"
                        v-model:path="item.images"
                        v-model:file="form.activity_images"
                        description="Drag or Select Multiple Images (.png, .jpg, .jpeg) | Dimension: 395px x 395px"
                        :accept="['image/*']"
                        :multiple="true"
                        :allow-delete="true"
                        :error="form.errors.activity_images"
                        @delete:file="deleteImage($event)"
                    ></dropzone>
                </div>
            </template>

            <template #actions>
                <slot />
            </template>
        </jet-form-section>
    </div>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3';

const props = defineProps ({
    form: {
        type: Object,
        required: true
    },
    item: {
        type: Object,
        default: ({})
    },
    languages: {
        type: Object
    }
});

const deleteImage =(value)=> {
    router.delete(
        route('admin.activities.delete-image', value),
        { preserveState: true }
    )
}

</script>
