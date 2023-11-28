<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
});

const storeUser = () => {
    form.post("/inertia/users");
};
</script>

<template>
    <div>
        <div class="w-2/3 mx-auto">
            <Head>
                <title>Create user</title>
            </Head>
            <h1 class="mb-6 heading-1">Create user</h1>
            <div>
                <form @submit.prevent="storeUser">
                    <div class="mb-6">
                        <label
                            for="name"
                            class="block mb-0.5 text-sm font-medium"
                            >Name</label
                        >
                        <input
                            v-model="form.name"
                            id="name"
                            type="text"
                            class="w-full p-1.5 px-4 rounded-md"
                        />
                        <span
                            v-if="form.errors.name"
                            class="text-sm text-red-500"
                        >
                            {{ form.errors.name }}
                        </span>
                    </div>
                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-0.5 text-sm font-medium"
                            >Email Address</label
                        >
                        <input
                            v-model="form.email"
                            id="email"
                            type="email"
                            required
                            autocomplete="username"
                            class="w-full p-1.5 px-4 rounded-md"
                        />
                        <span
                            v-if="form.errors.email"
                            class="text-sm text-red-500"
                        >
                            {{ form.errors.email }}
                        </span>
                    </div>
                    <div class="mb-6">
                        <label
                            for="password"
                            class="block mb-0.5 text-sm font-medium"
                            >Password</label
                        >
                        <input
                            v-model="form.password"
                            id="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            class="w-full p-1.5 px-4 rounded-md"
                        />
                        <span
                            v-if="form.errors.password"
                            class="text-sm text-red-500"
                        >
                            {{ form.errors.password }}
                        </span>
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="button">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
