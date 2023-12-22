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
                        <input
                            type="text"
                            class="form-input"
                            v-model="form.username"
                        />
                    </div>
                    <div>
                        <label>password</label>
                        <input
                            type="password"
                            class="form-input"
                            v-model="form.password"
                        />
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
    data() {
        return {
            form: {
                username: "",
                password: "",
                _token: this.$page.props.csrf_token,
            },
        };
    },
    methods: {
        async login() {
            try {
                let res = await axios.post(this.$api.auth.login, this.form);
                this.$toast("login berhasil.");
                location.replace("/");
            } catch (error) {
                this.$toast(error.response.data.msg, "error");
            }
        },
    },
};
</script>
<style lang=""></style>
