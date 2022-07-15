<template>
  <div>
    <!-- Display file -->
    <img v-if="display_src" class="mb-2" :src="display_src" alt="" width="120"/>
    <div
      class="
        w-full
        flex
        justify-center
        px-6
        pt-5
        pb-6
        border-2 border-dashed
        rounded-md
      "
      :class="isDragActive ? 'border-gray-900' : 'border-gray-300'"
      v-bind="getRootProps()"
    >
      <div class="space-y-1 text-center">
        <svg
          class="mx-auto h-12 w-12"
          :class="isDragActive ? 'text-gray-900' : 'text-gray-400'"
          stroke="currentColor"
          fill="none"
          viewBox="0 0 48 48"
          aria-hidden="true"
        >
          <path
            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
        <div class="flex text-sm text-gray-600">
          <label
            for="file-upload"
            class="
              relative
              cursor-pointer
              bg-white
              rounded-md
              font-medium
              text-gray-900
              hover:text-gray-900
              focus-within:outline-none
              focus-within:ring-2
              focus-within:ring-offset-2
              focus-within:ring-gray-900
            "
          >
            <span>Select {{ multiple ? "files" : "a file" }}</span>
            <input
              v-bind="getInputProps()"
              :id="id"
              :name="name"
              type="file"
              class="sr-only"
            />
          </label>
          <p class="pl-1">or drag and drop</p>
        </div>
        <p class="text-xs text-gray-500">{{ description }}</p>
      </div>
    </div>
    <!-- External error -->
    <p
      v-if="error"
      class="mt-2 text-sm"
      :class="error ? 'text-red-600' : 'text-gray-800'"
      id="email-error"
    >
      {{ error }}
    </p>
    <!-- Reject error -->
    <p
      v-for="(rejectError, index) in rejectErrors"
      :key="index"
      class="mt-2 text-sm text-red-600"
    >
      {{ rejectError.filename }}: {{ rejectError.errors.join(", ") }}
    </p>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { ExclamationCircleIcon } from "@heroicons/vue/solid";
import { useDropzone } from "vue3-dropzone";
export default {
  components: {
    ExclamationCircleIcon,
  },
  props: {
    path: {
      type: String,
      default: "",
    },
    file: {
      type: String,
    },
    error: {
      type: String,
      default: null,
    },
    description: {
      type: String,
      default: "PNG, JPG, GIF up to 10MB",
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
    // Dropzone props
    multiple: {
      type: Boolean,
      default: false,
    },
    maxSize: {
      type: Number,
      default: 2,
    },
    maxFiles: {
      type: Number,
      default: 0,
    },
    accept: {
      type: String,
      default: "image/*",
    },
    overwritePath: {
      type: Boolean,
      default: false,
    },
  },
  setup(props, { emit }) {
    const rejectErrors = ref([]);
    const acceptedFileSrcs = ref([]);

    // Triggers when file is dropped or selected
    function onDrop(acceptFiles, rejectReasons) {
      // console.log(acceptFiles);
      // console.log(rejectReasons);
      // process errors
      rejectErrors.value = rejectReasons.length
        ? renderErrors(rejectReasons)
        : [];

      // process SRCs
      acceptedFileSrcs.value = [];
      if (acceptFiles.length) {
        acceptFiles.forEach((file) => {
          processFileSrc(file).then((base64) => {
            acceptedFileSrcs.value.push(base64);
            if (props.overwritePath) {
              emit("update:path", base64);
            }
          });
        });
        // emit v-model change event
        let payload = props.multiple
          ? acceptedFiles.value
          : acceptedFiles.value[0];
        emit("update:file", payload);
      } else {
        emit("update:file", null);
      }
    }

    function processFileSrc(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
      });
    }

    function renderErrors(rejectReasons) {
      const errors = rejectReasons.map((reason) => {
        return {
          filename: reason.file.name,
          errors: reason.errors.map((error) => {
            switch (error.code) {
              case "file-invalid-type":
                return "Invalid file type";
              case "file-too-large":
                return `File too large (${reason.file.size / 1000 / 1000} MB)`;
            }
          }),
        };
      });
      return props.multiple ? errors : [errors[0]];
    }

    const { getRootProps, getInputProps, isDragActive, acceptedFiles } =
      useDropzone({
        onDrop,
        maxSize: props.maxSize * 1000 * 1000, // convert to MB
        maxFiles: props.maxFiles,
        multiple: props.multiple,
        accept: props.accept,
      });

    // displayed image
    const storage_url = computed(() => usePage().props.value.storage_url);
    const display_src = computed(() => {
      if (acceptedFileSrcs.value.length) {
        return acceptedFileSrcs.value[0];
      } else if (props.path) {
        return storage_url.value + props.path;
      }
      return null;
    });

    return {
      getRootProps,
      getInputProps,
      isDragActive,
      rejectErrors,
      acceptedFileSrcs,
      display_src,
    };
  },
};
</script>
