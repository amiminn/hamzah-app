<template lang="">
    <div>
        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button
                            v-bind="$store.state.sideApp"
                            type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        >
                            <span class="sr-only">Open sidebar</span>
                            <svg
                                class="w-6 h-6"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    clip-rule="evenodd"
                                    fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                                ></path>
                            </svg>
                        </button>
                        <Link href="/" class="flex ml-2 md:mr-24">
                            <img
                                src="assets/main/resume.png"
                                class="h-8 mr-3"
                                alt="FlowBite Logo"
                            />
                            <span
                                class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap"
                                >{{ $store.state.base.app.nama_app }}</span
                            >
                        </Link>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ml-3">
                            <div>
                                <button
                                    type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                                    aria-expanded="false"
                                    data-dropdown-toggle="dropdown-user"
                                >
                                    <span class="sr-only">Open user menu</span>
                                    <img
                                        class="w-8 h-8 rounded-full"
                                        src="/assets/icon/gamer_1985783.png"
                                        alt="user photo"
                                    />
                                </button>
                            </div>
                            <div
                                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow mr-2"
                                id="dropdown-user"
                            >
                                <div class="px-4 py-3" role="none">
                                    <p
                                        class="text-sm text-gray-900"
                                        role="none"
                                    >
                                        {{ name }}
                                    </p>
                                    <p
                                        class="text-sm font-medium text-gray-900 truncate w-36"
                                        role="none"
                                    >
                                        {{ name }}
                                        <!-- neil.sims@flowbite.com -->
                                    </p>
                                </div>
                                <ul class="py-1" role="none">
                                    <li>
                                        <Link
                                            href="/profile"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem"
                                            >Profile</Link
                                        >
                                    </li>
                                    <li>
                                        <form action="logout" methods="post">
                                            <button
                                                type="submit"
                                                class="block m-1 btn-block rounded px-4 py-2 text-sm bg-rose-100 text-gray-700 hover:bg-rose-400 hover:text-white"
                                                role="menuitem"
                                            >
                                                logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
        };
    },
    mounted() {
        this.name = user.name;
        this.email = user.email;
    },
};
</script>
<style lang=""></style>
