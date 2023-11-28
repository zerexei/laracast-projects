<script setup>
import Navigation from "../Components/Navigation.vue";
import { Link } from "@inertiajs/vue3";

// import Layout from "../Shared/Layout.vue";
// defineOptions({
//     layout: Layout,
// });

defineProps({ users: Array });
</script>

<template>
    <div class="min-h-screen">
        <Head>
            <title>Users</title>
            <meta
                type="description"
                content="My awesome app"
                head-key="description"
            />
        </Head>

        <div class="flex items-center justify-between mb-6">
            <h1 class="heading-1">Users</h1>
            <Link href="/inertia/users/create" class="button">Create user</Link>
        </div>

        <div>
            <p v-for="user in users">
                <a href="#">{{ user.name }}</a>
            </p>
        </div>
    </div>
    <div>
        <Link href="/inertia/users" preserve-scroll>Refresh</Link>
    </div>
</template>
