// import { createApp } from "vue";
// import { createPinia } from 'pinia'
// import Router from '@/Router/index.ts'

import "./bootstrap.ts";

// import HelloWorld from "@/Components/HelloWorld.vue";

// const pinia = createPinia()

// const app = createApp({});

// app.use(pinia)
// app.use(Router)

// app.component("hello-world", HelloWorld);
// app.mount("#App");

import { createApp, h } from 'vue'
import { Link, createInertiaApp, Head } from '@inertiajs/vue3'
import Layout from "./Inertia/Shared/Layout.vue";

createInertiaApp({
    resolve: async name => {
        const pages = import.meta.glob('./Inertia/Pages/**/*.vue')

        let page = await pages[`./Inertia/Pages/${name}.vue`]()

        page.default.layout = page.default.layout || Layout

        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .component('Link', Link)
            .component('Head', Head)
            .use(plugin)
            .mount(el)
    },
    progress: {
        delay: 250,
        color: '#29d',
        includeCSS: true,
        showSpinner: true,
    },
    title: (title) => `Inertia - ${title}`,
})
