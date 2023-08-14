<template>
    <div>
        <label :for="id" class="block text-sm text-gray-900 mb-1">{{
            label
        }}</label>
        <div
            class="
                w-full
                flex
                justify-center
                flex-col
                px-6
                py-6
                border-2 border-dashed
                rounded-md
                space-y-1
            "
            :class="isDragActive ? 'border-gray-900' : 'border-gray-300'"
            v-bind="getRootProps()"
        >
            <svg
                class="mx-auto h-12 w-12"
                :class="isDragActive ? 'text-gray-900' : 'text-gray-500'"
                stroke="currentColor"
                fill="currentColor"
                viewBox="0 0 48 48"
                aria-hidden="true"
            >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.7143 11.2857C18.0093 11.2857 16.3742 11.963 15.1686 13.1686C13.963 14.3742 13.2857 16.0093 13.2857 17.7143V26.2857C13.2857 29.1273 14.4145 31.8525 16.4239 33.8619C18.4332 35.8712 21.1584 37 24 37C26.8416 37 29.5668 35.8712 31.5761 33.8619C33.5855 31.8525 34.7143 29.1273 34.7143 26.2857V17.7143C34.7143 17.146 34.9401 16.6009 35.3419 16.1991C35.7438 15.7972 36.2888 15.5714 36.8571 15.5714C37.4255 15.5714 37.9705 15.7972 38.3724 16.1991C38.7742 16.6009 39 17.146 39 17.7143V26.2857C39 28.2555 38.612 30.2061 37.8582 32.026C37.1044 33.8458 35.9995 35.4994 34.6066 36.8923C33.2137 38.2852 31.5601 39.3901 29.7403 40.1439C27.9204 40.8977 25.9698 41.2857 24 41.2857C22.0302 41.2857 20.0796 40.8977 18.2597 40.1439C16.4399 39.3901 14.7863 38.2852 13.3934 36.8923C12.0005 35.4994 10.8956 33.8458 10.1418 32.026C9.38799 30.2061 9 28.2555 9 26.2857V17.7143C9 14.8727 10.1288 12.1475 12.1381 10.1381C14.1475 8.12882 16.8727 7 19.7143 7C22.5559 7 25.2811 8.12882 27.2904 10.1381C29.2997 12.1475 30.4286 14.8727 30.4286 17.7143V26.2857C30.4286 27.9907 29.7513 29.6258 28.5457 30.8314C27.3401 32.037 25.705 32.7143 24 32.7143C22.295 32.7143 20.6599 32.037 19.4543 30.8314C18.2487 29.6258 17.5714 27.9907 17.5714 26.2857V17.7143C17.5714 17.146 17.7972 16.6009 18.1991 16.1991C18.6009 15.7972 19.146 15.5714 19.7143 15.5714C20.2826 15.5714 20.8277 15.7972 21.2295 16.1991C21.6314 16.6009 21.8571 17.146 21.8571 17.7143V26.2857C21.8571 26.854 22.0829 27.3991 22.4848 27.8009C22.8866 28.2028 23.4317 28.4286 24 28.4286C24.5683 28.4286 25.1134 28.2028 25.5152 27.8009C25.9171 27.3991 26.1429 26.854 26.1429 26.2857V17.7143C26.1429 16.0093 25.4656 14.3742 24.26 13.1686C23.0544 11.963 21.4192 11.2857 19.7143 11.2857Z"/>
            </svg>
            <div class="text-center items-center">
                <div class="flex text-sm mb-1 justify-center">
                    <label
                        for="file-upload"
                        class="
                            relative
                            cursor-pointer
                            bg-white
                            rounded-md
                            font-bold
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
                    <p class="pl-1 text-gray-500">or drag and drop</p>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ description }}</p>
            </div>
        </div>

        <div
            class="w-full mt-2 space-y-2"
            v-if="previewFile && acceptedFiles.length > 0"
        >
            <template v-for="(file, key) in acceptedFiles" :key="file">
                <FilePreview
                    :file-type="file.type"
                    :source="acceptedFileSrcs[key]"
                    :file-name="file.name"
                    :size="file.size"
                    @file:download="fileDownload(key)"
                    @file:delete="fileDelete(key)"
                />
            </template>
        </div>

        <div
            class="w-full mt-2 space-y-2"
            v-else-if="path"
        >
            <FilePreview
                :source="displaySrc"
                :allowDelete="false"
                @file:download="previewFileDownload(displaySrc)"
            />
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
import { usePage } from "@inertiajs/vue3";
import { ExclamationCircleIcon } from "@heroicons/vue/24/solid";
import { useDropzone } from "vue3-dropzone";
import FilePreview from "@/Components/Inputs/FilePreview.vue";

export default {
    components: {
        ExclamationCircleIcon,
        FilePreview,
    },
    props: {
        path: {
            type: String,
            default: "",
        },
        file: {
            type: File || String,
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
            default: 10,
        },
        maxFiles: {
            type: Number,
            default: 0,
        },
        // accept: {
        //     type: String,
        //     default: "image/*, video/*, application/pdf",
        // },
        overwritePath: {
            type: Boolean,
            default: false,
        },
        previewFile: {
            type: Boolean,
            default: true,
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
        const storageUrl = computed(() => usePage().props.storage_url);
        const displaySrc = computed(() => {
            if (acceptedFileSrcs.value.length) {
                return acceptedFileSrcs.value[0];
            } else if (props.path) {
                return storageUrl.value + props.path;
            }
            return null;
        });

        function fileDownload(key) {
            const a = document.createElement("a");
            a.href = acceptedFileSrcs.value[key];
            a.download = acceptedFiles.value[key].name;
            a.target = "_blank";
            a.click();
            a.remove();
        }

        function fileDelete(key) {
            acceptedFiles.value.splice(key, 1);
            acceptedFileSrcs.value.splice(key, 1);

            // emit v-model change event
            let payload = props.multiple
                ? acceptedFiles.value
                : acceptedFiles.value[0];
            emit("update:file", payload);
        }

        function previewFileDownload(item) {
            const a = document.createElement("a");
            a.href = item;
            a.target = "_blank";
            a.click();
            a.remove();
        }

        return {
            getRootProps,
            getInputProps,
            isDragActive,
            rejectErrors,
            acceptedFileSrcs,
            acceptedFiles,
            displaySrc,
            fileDownload,
            fileDelete,
            previewFileDownload
        };
    },
};
</script>
