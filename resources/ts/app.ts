import "./bootstrap";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import UserLayout from "@/Layouts/UserLayout.vue";

import VButton from "@/Pages/User/Components/Buttons/VButton.vue";
import VBackButton from "@/Pages/User/Components/Buttons/VBackButton.vue";

import VCheckbox from "@/Pages/User/Components/Inputs/VCheckbox.vue";
import VDatePicker from "@/Pages/User/Components/Inputs/VDatePicker.vue";
import VTextInput from "@/Pages/User/Components/Inputs/VTextInput.vue";
import VPasswordInput from "@/Pages/User/Components/Inputs/VPasswordInput.vue";
import VSelector from "@/Pages/User/Components/Inputs/VSelector.vue";

import VConfirmationModal from "./Pages/User/Components/Modals/VConfirmationModal.vue";
import VDeleteModal from "./Pages/User/Components/Modals/VDeleteModal.vue";
import VDialogModal from "./Pages/User/Components/Modals/VDialogModal.vue";
import VSuccessModal from "./Pages/User/Components/Modals/VSuccessModal.vue";

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({
                methods: { route },
                components: {
                    Head,
                    Link,
                    UserLayout,
                    VButton,
                    VBackButton,
                    VCheckbox,
                    VDatePicker,
                    VTextInput,
                    VPasswordInput,
                    VSelector,
                    VConfirmationModal,
                    VDeleteModal,
                    VDialogModal,
                    VSuccessModal
                }
            })
            .mount(el)
    },
})