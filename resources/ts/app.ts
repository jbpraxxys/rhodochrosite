require("./bootstrap");


import {createApp, h} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

import UserLayout from "@/Layouts/UserLayout.vue";
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
                    UserLayout
                }
            })
            .mount(el)
    },
})