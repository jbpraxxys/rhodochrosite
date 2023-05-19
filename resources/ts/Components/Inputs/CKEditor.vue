<template>
    <div>
        <label :for="id" class="block text-sm text-gray-900 mb-1">{{
            label
        }}</label>
        <div class="relative rounded-md shadow-sm">
            <CKEditor
                :editor="editor"
                :model-value="modelValue"
                @input="$emit('update:modelValue', $event)"
                :config="editorConfig"
                class="h-40"
            ></CKEditor>
            <div
                v-if="error"
                class="
                    absolute
                    inset-y-0
                    right-0
                    pr-3
                    flex
                    items-center
                    pointer-events-none
                "
            >
                <ExclamationCircleIcon
                    class="h-5 w-5 text-red-500"
                    aria-hidden="true"
                />
            </div>
        </div>
        <p
            v-if="error"
            class="mt-2 text-sm"
            :class="error ? 'text-red-600' : 'text-gray-800'"
            id="email-error"
        >
            {{ error }}
        </p>
    </div>
</template>

<style>
.ck-editor ul {
    display: block;
    list-style-type: disc;
    margin-top: 1em;
    margin-bottom: 1 em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
}
.ck-editor ol {
    counter-reset: item;
    display: block;
    list-style-type: decimal;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
    padding-left: 40px;
}

.ck-editor ol > li {
    display: table;
    counter-increment: item;
    margin-bottom: 0.6em;
}

.ck-editor ol > li:before {
    content: counters(item, ".") ". ";
    display: table-cell;
    padding-right: 0.6em;
}

.ck-editor li ol > li:before {
    content: counters(item, ".") " ";
}
</style>

<script>
import { ExclamationCircleIcon } from "@heroicons/vue/24/solid";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { UploadAdapter } from '../../plugins/ckeditor/UploadAdapter';
export default {
    components: {
        ExclamationCircleIcon: ExclamationCircleIcon,
        ckeditor: CKEditor.component,
    },
    props: {
        modelValue: {
            default: '',
            required: true,
        },
        error: {
            type: String,
            default: null,
        },
        placeholder: {
            type: String,
            default: null,
        },
        name: {
            type: String,
            default: null,
        },
        id: {
            type: String,
            default: null,
        },
        label: {
            type: String,
            default: null,
        },
        config: {
            type: Object,
            default: {},
        },
    },
    data() {
        return {
            editor: ClassicEditor,
        };
    },
    computed: {
        editorConfig() {
            return Object.entries(this.config).length
                ? this.config
                : {
                    name: this.name,
                    height: 500,
                    mediaEmbed: { previewsInData: true },
                    extraPlugins: [ this.uploadAdapterPlugin ],
                    link: {
                        addTargetToExternalLinks: true,
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                            { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                            { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                            { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
                            {
                                model: 'small',
                                view: {
                                    name: 'h6',
                                    classes: 'small'
                                },
                                title: 'Small',
                                class: 'ck-heading_heading6_small',

                                // It needs to be converted before the standard 'heading2'.
                                converterPriority: 'high'
                            }
                        ]
                    }
                };
        },
    },

     methods: {
        uploadAdapterPlugin(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return new UploadAdapter(loader);
                };
        },
    }

};
</script>
