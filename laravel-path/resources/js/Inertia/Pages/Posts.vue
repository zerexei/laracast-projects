<script setup>
import { ref, watch } from "vue";
import Navigation from "../Components/Navigation.vue";
import { Link, router } from "@inertiajs/vue3";
import throttle from "lodash/throttle";
import debounce from "lodash/debounce";

// import Layout from "../Shared/Layout.vue";
// defineOptions({
//     layout: Layout,
// });

const { filters } = defineProps({ posts: Object, filters: Object });
const search = ref(filters.search);

watch(
    search,
    debounce((value) => {
    // throttle((value) => {
        router.get(
            "/inertia/posts",
            { search: value },
            { preserveState: true }
        );
    }, 500)
);
</script>

<template>
    <div class="min-h-screen">
        <Head>
            <title>Posts</title>
            <meta
                type="description"
                content="My awesome app"
                head-key="description"
            />
        </Head>

        <h1 class="heading-1">Posts</h1>

        <div class="mb-6">
            <input
                v-model="search"
                type="search"
                name="search"
                id="search-posts"
            />
        </div>

        <div>
            <p v-for="post in posts.data">
                <a href="#">{{ post.title }}</a>
            </p>
        </div>

        <div class="flex gap-2 mt-12">
            <component
                :is="link.url ? 'Link' : 'span'"
                v-for="link in posts.links"
                :href="link.url"
                :class="[link.active && 'text-blue-700']"
            >
                <span v-html="link.label"></span>
            </component>
        </div>
    </div>

    <div>
        <Link href="/inertia/users" preserve-scroll>Refresh</Link>
    </div>
</template>
