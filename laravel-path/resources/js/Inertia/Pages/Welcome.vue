<script setup>
defineProps({ name: String });
</script>

<template>
    <div>
        <Head title="Welcome"/>
        <h1>Hello {{ name }}</h1>
    </div>
</template>
