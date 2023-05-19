require("./bootstrap");


import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import UserLayout from "@/Layouts/UserLayout.vue";

import VButton from "@/Pages/User/Components/Buttons/VButton.vue";
import VCheckbox from "@/Pages/User/Components/Inputs/VCheckbox.vue";
import VDatePicker from "@/Pages/User/Components/Inputs/VDatePicker.vue";
import VInput from "@/Pages/User/Components/Inputs/VInput.vue";
import VPasswordInput from "@/Pages/User/Components/Inputs/VPasswordInput.vue";
import VSelector from "@/Pages/User/Components/Inputs/VSelector.vue";

import { Head, Link } from '@inertiajs/vue3';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    progress: { color: '#4B5563' },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
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
                    VCheckbox,
                    VDatePicker,
                    VInput,
                    VPasswordInput,
                    VSelector,
                }
            })
            .mount(el)
    },
})