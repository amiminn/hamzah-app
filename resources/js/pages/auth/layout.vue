<template lang="">
    <div class="h-screen grid sm:md:grid-cols-5">
        <div
            class="col-span-3 hidden sm:md:block bg-center bg-cover"
            :style="style"
        ></div>
        <div class="col-span-2 px-10 grid items-center">
            <card class="bg-white">
                <slot></slot>
            </card>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            num: 0,
            style: {
                "background-image": "url('/assets/main/server.jpg')",
            },
        };
    },
    methods: {
        login() {
            console.log("login page");
        },
    },
    mounted() {},
};
</script>
