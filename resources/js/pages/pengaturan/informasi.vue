<template lang="">
    <card>
        <namecard>informasi app</namecard>
        <form @submit.prevent="updateInformation" class="grid gap-y-3">
            <div>
                <label for="appname">nama aplikasi</label>
                <input
                    v-model="$store.state.base.app.nama_app"
                    type="text"
                    id="appname"
                    class="form-input"
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
                nama_app: null,
            },
        };
    },
    methods: {
        async updateInformation() {
            try {
                let res = await axios.post(
                    this.$api.pengaturan,
                    this.$store.state.base.app
                );
                this.$store.commit("base/appConfig");
                this.$toast(res.data.msg);
            } catch (error) {}
        },
        async getData() {
            let res = await axios.get(this.$api.pengaturan);
            this.form = res.data;
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>
