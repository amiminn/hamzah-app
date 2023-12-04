<template lang="">
    <card>
        <form @submit.prevent="submitForm">
            <div class="grid sm:xl:grid-cols-2 gap-3">
                <div class=""></div>
            </div>
            <button type="submit" class="btn btn-danger btn-block">
                submit
            </button>
        </form>
    </card>
</template>
<script>
export default {
    props: [],
    data() {
        return {
            form: {},
        };
    },
    methods: {
        submitForm() {
            console.log("sub form");
        },
    },
};
</script>
<style lang=""></style>
