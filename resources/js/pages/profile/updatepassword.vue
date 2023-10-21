<template lang="">
    <card>
        <namecard>password</namecard>
        <form @submit.prevent="updatePass" class="grid gap-y-4">
            <div>
                <label for="newpass">password baru</label>
                <input
                    v-model="form.passwordBaru"
                    type="password"
                    id="newpass"
                    class="form-input"
                />
            </div>
            <button class="btn btn-danger btn-block">update password</button>
        </form>
    </card>
</template>
<script>
export default {
    data() {
        return {
            form: {
                passwordBaru: null,
            },
        };
    },
    methods: {
        async updatePass() {},
    },
};
</script>
<style lang=""></style>
