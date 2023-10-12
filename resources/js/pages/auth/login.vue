<template lang="">
    <div class="">
        <div class="h-screen grid grid-cols-2">
            <div :class="coverImage"></div>
            <div class="bg-sky-300">
                <div class="h-screen grid content-center">
                    <div class="mx-20">
                        <card>
                            <form @submit.prevent="login">
                                <div
                                    class="flex justify-center text-2xl font-bold"
                                >
                                    @microservices
                                </div>
                                <div class="grid gap-5">
                                    <div>
                                        <label>username</label>
                                        <input type="text" class="form-input" />
                                    </div>
                                    <div>
                                        <label>password</label>
                                        <input
                                            type="password"
                                            class="form-input"
                                        />
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-block"
                                    >
                                        login
                                    </button>
                                </div>
                            </form>
                        </card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            coverImage: `bg-[url('${this.$url}assets/main/server.jpg')] w-full`,
        };
    },
    methods: {
        login() {
            console.log("login page");
        },
    },
    mounted() {
        // console.log("login page");
    },
};
</script>
<style lang=""></style>
