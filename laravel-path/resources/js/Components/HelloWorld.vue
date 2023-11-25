<script setup lang="ts">
import { RouterView } from "vue-router";
import { sum } from "@/Utils/index.ts";

const message: string = "Hello, world!";
</script>

<template>
    <div>
        <h1>{{ message }} - {{ sum(1, 2) }}</h1>
        <div class="p-12 bug">
            <router-view></router-view>
        </div>
    </div>
</template>
