<template>
  <div>
    <label :for="id" class="block text-sm font-medium text-gray-700">{{
      label
    }}</label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <ckeditor
        :editor="editor"
        :model-value="modelValue"
        @input="$emit('update:modelValue', $event)"
        :config="editorConfig"
        class="h-40"
      ></ckeditor>
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
import { UploadAdapter } from '../plugins/ckeditor/UploadAdapter.js';
export default {
  components: {
    ExclamationCircleIcon: ExclamationCircleIcon,
    ckeditor: CKEditor.component,
  },
  props: {
    modelValue: {
      default: null,
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
