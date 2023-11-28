<script setup>
const user = {
    name: "john Doe",
    password: "password",
};
</script>

<template>
    <div class="text-white bg-gray-900">
        <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-end gap-2">
                    <h2 class="text-xl font-bold">My App</h2>

                    <p class="text-sm">
                        Welcome back, {{ $page.props.auth.user.name }} !
                    </p>
                </div>

                <nav class="flex items-center gap-4">
                    <Link href="/inertia">Home</Link>
                    <Link href="/inertia/users">Users</Link>
                    <Link href="/inertia/posts">Posts</Link>
                    <Link
                        href="/inertia/logout"
                        :data="user"
                        method="post"
                        as="button"
                        >Logout</Link
                    >
                </nav>
            </div>
        </div>
    </div>
</template>
