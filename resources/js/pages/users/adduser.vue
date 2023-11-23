<template lang="">
    <main-page>
        <card>
            <namecard>tambah user</namecard>
            <form @submit.prevent="addUser()">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label for="namaUser">nama</label>
                        <input type="text" class="form-input" id="namaUser" />
                    </div>
                    <div>
                        <label for="emailUser">email</label>
                        <input type="text" class="form-input" id="emailUser" />
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
                        <input type="text" class="form-input" id="roleUser" />
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
        return {};
    },
    methods: {
        async addUser() {
            console.log("add user");
        },
    },
};
</script>
<style lang=""></style>
