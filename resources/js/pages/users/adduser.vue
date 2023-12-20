<template lang="">
    <main-page>
        <card>
            <namecard>tambah user</namecard>
            <form @submit.prevent="addUser()">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="namaUser">nama</label>
                        <input
                            type="text"
                            class="form-input"
                            id="namaUser"
                            v-model="dataUser.name"
                        />
                    </div>
                    <div>
                        <label for="username">username</label>
                        <input
                            type="text"
                            class="form-input"
                            id="username"
                            v-model="dataUser.username"
                        />
                    </div>
                    <div>
                        <label for="emailUser">email</label>
                        <input
                            type="text"
                            class="form-input"
                            id="emailUser"
                            v-model="dataUser.email"
                        />
                    </div>
                    <div>
                        <label for="passwordUser">password</label>
                        <input
                            type="password"
                            class="form-input"
                            id="passwordUser"
                            v-model="dataUser.password"
                        />
                    </div>
                    <div>
                        <label for="roleUser">role</label>
                        <select
                            v-model="dataUser.role"
                            id="roleUser"
                            class="form-input"
                        >
                            <option value="0" selected>staff</option>
                            <option value="1">admin</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger btn-block my-4">
                    submit
                </button>
            </form>
        </card>
    </main-page>
</template>
<script>
export default {
    data() {
        return {
            dataUser: {
                username: null,
                name: null,
                email: null,
                password: null,
                role: 0,
            },
        };
    },
    methods: {
        async addUser() {
            try {
                let res = await axios.post(this.$api.users, this.dataUser);
                this.$toast(res.data.msg);
                this.$router.get("users");
            } catch (error) {}
        },
    },
};
</script>
<style lang=""></style>
