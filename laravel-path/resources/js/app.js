import { createApp } from "vue";
import "./bootstrap";
import HelloWorld from "@/Components/HelloWorld.vue";

const app = createApp({});

app.component("hello-world", HelloWorld);
app.mount("#App");
