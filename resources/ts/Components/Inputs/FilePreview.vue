<template>
    <div class="flex items-center justify-between border rounded-lg">
        <div class="flex items-center justify-start p-3 gap-2 w-full">
            <img
                :src="source"
                class="w-10 h-10 rounded-lg cursor-pointer"
                title="View Image"
                v-if="fileType.includes('image/')"
                @click="$emit('file:download')"
            />
            <img
                src="/icons/ic-items.svg"
                class="w-10 h-10 rounded-lg"
                v-else-if="
                    fileType.includes('text/csv') || fileType.includes('spreadsheetml')
                "
            />
            <div>
                <p class="text-sm text-gray-900 truncate max-w-[280px]">
                    {{ fileName }}
                </p>
                <p v-if="size > 0" class="text-sm text-gray-500">{{ formatBytes(size) }}</p>
            </div>
        </div>
        <div class="flex items-center justify-end w-[88px]">
            <div class="border-l" v-if="allowDownload">
                <button type="button" class="py-5 px-4" @click="$emit('file:download')">
                    <ArrowDownTrayIcon class="w-5 h-5 text-gray-900" />
                </button>
            </div>
            <div class="border-l" v-if="allowDelete">
                <button type="button" class="py-5 px-3" @click="$emit('file:delete')">
                    <TrashIcon class="w-5 h-5 text-red-600" />
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import { ArrowDownTrayIcon, TrashIcon } from "@heroicons/vue/24/solid";

export default {
    components: {
        ArrowDownTrayIcon,
        TrashIcon,
    },
    props: {
        source: {
            type: String,
            required: true,
        },
        fileType: {
            type: String,
            required: true,
            default: "image/*",
        },
        fileName: {
            type: String,
            default: '',
        },
        size: {
            type: Number,
            default: 0,
        },
        allowDownload: {
            type: Boolean,
            default: true,
        },
        allowDelete: {
            type: Boolean,
            default: true,
        },
    },
    setup() {
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return "0 Bytes";

            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];

            const i = Math.floor(Math.log(bytes) / Math.log(k));

            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + " " + sizes[i];
        }

        return {
            formatBytes,
        };
    },
};
</script>
