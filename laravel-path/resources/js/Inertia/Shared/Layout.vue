<script setup>
import Navigation from "../Components/Navigation.vue";
</script>

<template>
    <div>
        <Head>
            <title>Home</title>
            <meta
                type="description"
                content="My awesome app"
                head-key="description"
            />
        </Head>

        <Navigation />
        <!-- <header></header> -->
        <main class="">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <slot></slot>
            </div>
        </main>
    </div>
</template>
