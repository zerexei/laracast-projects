import { createApp } from "vue";
import { createPinia } from 'pinia'
import Router from '@/Router/index.ts'

import "./bootstrap.ts";

import HelloWorld from "@/Components/HelloWorld.vue";

const pinia = createPinia()

const app = createApp({});

app.use(pinia)
app.use(Router)

app.component("hello-world", HelloWorld);
app.mount("#App");
