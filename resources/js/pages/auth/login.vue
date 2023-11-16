<template lang="">
    <LayoutLogin>
        <div>
            <form @submit.prevent="login">
                <div class="flex justify-center text-2xl font-bold py-5 mb-5">
                    @microservices
                </div>
                <div class="grid gap-5">
                    <div>
                        <label>username</label>
                        <input type="text" class="form-input" />
                    </div>
                    <div>
                        <label>password</label>
                        <input type="password" class="form-input" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        login
                    </button>
                </div>
            </form>
        </div>
    </LayoutLogin>
</template>
<script>
import LayoutLogin from "./layout.vue";
export default {
    components: { LayoutLogin },
    methods: {
        login() {
            console.log("login");
        },
    },
};
</script>
<style lang=""></style>
