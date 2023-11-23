<template lang="">
    <card>
        <namecard>informasi profile</namecard>
        <form @submit.prevent="updateInformasiProfile" class="grid gap-y-4">
            <div>
                <label for="nama">nama</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="form-input"
                    id="nama"
                />
            </div>
            <div>
                <label for="email">email</label>
                <input
                    v-model="form.email"
                    type="text"
                    class="form-input"
                    id="email"
                />
            </div>
            <button class="btn btn-primary btn-block">update</button>
        </form>
    </card>
</template>
<script>
export default {
    data() {
        return {
            form: {
                name: null,
                email: null,
            },
        };
    },
    mounted() {
        this.form = Auth.user;
    },
    methods: {
        async updateInformasiProfile() {},
    },
};
</script>
<style lang=""></style>
