import { createApp } from "vue";
import "./bootstrap.ts";
import HelloWorld from "@/Components/HelloWorld.vue";

const app = createApp({});

app.component("hello-world", HelloWorld);
app.mount("#App");
