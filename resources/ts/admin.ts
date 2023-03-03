require("./bootstrap");


import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import AdminLayout from "@/Layouts/AdminLayout.vue";
import Tabs from "@/Components/Tabs.vue";
import Filter from "@/Components/Filter.vue";
import DataTable from "@/Components/DataTable.vue";
import Pagination from "@/Components/Pagination.vue";
import CreateButton from "@/Components/ActionButtons/CreateButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import ExportButton from "@/Components/ActionButtons/ExportButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetButton from "@/Jetstream/Button.vue";

import CKEditor from "@/Components/CKEditor.vue";
import Selector from "@/Components/Selector.vue";
import DatePicker from "@/Components/DatePicker.vue";
import Dropzone from "@/Components/Dropzone.vue";
import RestoreModal from "@/Components/RestoreModal.vue";
import DeleteModal from "@/Components/DeleteModal.vue";
import ToggleSwitch from "@/Components/ToggleSwitch.vue";

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `Admin - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ 
                methods: { route },
                components: {
                    AdminLayout,
                    Tabs,
                    Filter,
                    DataTable,
                    Pagination,
                    CreateButton,
                    DeleteButton,
                    EditButton,
                    ExportButton,
                    RestoreButton,
                    JetFormSection,
                    JetLabel,
                    JetInput,
                    JetCheckbox,
                    JetButton,
                    CKEditor,
                    Selector,
                    DatePicker,
                    Dropzone,
                    RestoreModal,
                    DeleteModal,
                    ToggleSwitch,
                    Head,
                    Link
                }    
            })
            .mount(el)
    },
})