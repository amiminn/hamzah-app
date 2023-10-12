<template lang="">
    <aside
        id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar"
    >
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <Link
                        href="/"
                        :class="{ on: $page.url === '/' }"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                    >
                        <vue-feather type="box"></vue-feather>
                        <span class="ml-3">Dashboard</span>
                    </Link>
                </li>

                <li>
                    <Link
                        href="/users"
                        :class="{ on: $page.url === '/users' }"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                    >
                        <vue-feather type="users"></vue-feather>

                        <span class="ml-3">Users</span>
                    </Link>
                </li>
                <li>
                    <Link
                        href="/pengaturan"
                        :class="{ on: $page.url === '/pengaturan' }"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                    >
                        <vue-feather type="settings"></vue-feather>
                        <span class="ml-3">Pengaturan</span>
                    </Link>
                </li>
                <li>
                    <Link
                        href="/tailwindcss"
                        :class="{ on: $page.url === '/tailwindcss' }"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group"
                    >
                        <vue-feather type="codepen"></vue-feather>

                        <span class="ml-3">tailwindcss</span>
                    </Link>
                </li>
            </ul>
        </div>
    </aside>
</template>
<script>
export default {};
</script>
<style lang=""></style>
