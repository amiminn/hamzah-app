<template lang="">
    <div>
        <button
            @click="back"
            class="font-bold text-red-400 flex align-middle gap-x-2"
        >
            <vue-feather type="chevrons-left"></vue-feather>
            kembali
        </button>
    </div>
</template>
<script>
export default {
    methods: {
        back() {
            window.history.go(-1);
        },
    },
};
</script>
<style lang=""></style>
