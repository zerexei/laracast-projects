import { createApp } from "vue";
import { createPinia } from 'pinia'

import "./bootstrap.ts";

import HelloWorld from "@/Components/HelloWorld.vue";

const pinia = createPinia()

const app = createApp({});

app.use(pinia)

app.component("hello-world", HelloWorld);
app.mount("#App");
