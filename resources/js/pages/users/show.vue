<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <namecard>kelola user</namecard>
            </card>
            <card>
                <form @submit.prevent="addUser()">
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
                            <label for="emailUser">email</label>
                            <input
                                v-model="dataUser.email"
                                type="text"
                                class="form-input"
                                id="emailUser"
                            />
                        </div>
                        <div>
                            <label for="passwordUser">password</label>
                            <input
                                type="text"
                                class="form-input"
                                id="passwordUser"
                            />
                        </div>
                        <div>
                            <label for="roleUser">role</label>
                            <input
                                type="text"
                                class="form-input"
                                id="roleUser"
                            />
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
            let res = axios.put();
        },
    },
    mounted() {
        this.dataUser = this.data;
    },
};
</script>
<style lang=""></style>
