<script setup lang="ts">
import { sum } from "@/Utils/index.ts";
const message: string = "Hello, world!";
</script>

<template>
    <h1>{{ message }} - {{ sum(1, 2) }}</h1>
</template>
