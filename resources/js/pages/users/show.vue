<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <namecard>kelola user</namecard>
            </card>
            <card>
                <form @submit.prevent="updateUser()">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="namaUser">nama</label>
                            <input
                                v-model="dataUser.name"
                                type="text"
                                class="form-input"
                                id="namaUser"
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
                                v-model="dataUser.email"
                                type="text"
                                class="form-input"
                                id="emailUser"
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
                    <button
                        type="submit"
                        class="btn btn-primary btn-block my-4"
                    >
                        update
                    </button>
                </form>
            </card>
        </div>
    </main-page>
</template>
<script>
export default {
    props: ["data"],
    data() {
        return {
            dataUser: [],
        };
    },
    methods: {
        async updateUser() {
            try {
                let res = await axios.put(
                    this.$api.users + "/" + this.dataUser.id,
                    this.dataUser
                );
                this.$toast(res.data.msg);
            } catch (error) {}
        },
    },
    mounted() {
        this.dataUser = this.data;
    },
};
</script>
<style lang=""></style>
