import "./bootstrap";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';


import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import AdminLayout from "@/Layouts/AdminLayout.vue";

import Tabs from "@/Components/Partials/Tabs.vue";
import Filter from "@/Components/Partials/Filter.vue";
import DataTable from "@/Components/Partials/DataTable.vue";
import Pagination from "@/Components/Partials/Pagination.vue";
import SectionHeader from "@/Components/Partials/SectionHeader.vue";

import CreateButton from "@/Components/ActionButtons/CreateButton.vue";
import DeleteButton from "@/Components/ActionButtons/DeleteButton.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import ExportButton from "@/Components/ActionButtons/ExportButton.vue";
import ImportButton from "@/Components/ActionButtons/ImportButton.vue";
import RestoreButton from "@/Components/ActionButtons/RestoreButton.vue";
import JetButton from "@/Components/ActionButtons/JetButton.vue";

import JetFormSection from "@/Components/Partials/FormSection.vue";
import JetLabel from "@/Components/Inputs/Label.vue";
import JetInput from "@/Components/Inputs/Input.vue";
import JetCheckbox from "@/Components/Inputs/Checkbox.vue";
import JetRadioInput from "@/Components/Inputs/RadioInput.vue";
import JetStatusPill from "@/Components/Inputs/StatusPill.vue";

import CKEditor from "@/Components/Inputs/CKEditor.vue";
import Selector from "@/Components/Inputs/Selector.vue";
import DatePicker from "@/Components/Inputs/DatePicker.vue";
import Dropzone from "@/Components/Inputs/Dropzone.vue";
import ToggleSwitch from "@/Components/Inputs/ToggleSwitch.vue";
import Multiselect from '@/Components/Inputs/Multiselect.vue';

import RestoreModal from "@/Components/Modals/RestoreModal.vue";
import DeleteModal from "@/Components/Modals/DeleteModal.vue";
import ImportModal from "@/Components/Modals/ImportModal.vue";

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `Admin - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
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
                    SectionHeader,
                    CreateButton,
                    DeleteButton,
                    EditButton,
                    ExportButton,
                    ImportButton,
                    RestoreButton,
                    JetFormSection,
                    JetLabel,
                    JetInput,
                    JetCheckbox,
                    JetRadioInput,
                    JetButton,
                    JetStatusPill,
                    CKEditor,
                    Selector,
                    DatePicker,
                    Dropzone,
                    RestoreModal,
                    DeleteModal,
                    ImportModal,
                    ToggleSwitch,
                    Multiselect,
                    Head,
                    Link
                }
            })
            .mount(el)
    },
})
