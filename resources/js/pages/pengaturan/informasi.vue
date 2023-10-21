<template lang="">
    <card>
        <namecard>informasi app</namecard>
        <form @submit.prevent="updateInformation" class="grid gap-y-3">
            <div>
                <label for="appname">nama aplikasi</label>
                <input
                    v-model="form.nameApp"
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
                nameApp: null,
            },
        };
    },
    methods: {
        async updateInformation() {},
    },
};
</script>
<style lang=""></style>
