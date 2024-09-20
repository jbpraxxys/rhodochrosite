import "./bootstrap";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import {createApp, h, defineAsyncComponent} from "vue";
import { createInertiaApp } from '@inertiajs/vue3';

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
                }
            })
            .mount(el)
    },
})