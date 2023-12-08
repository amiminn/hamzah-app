<template lang="">
    <main-page>
        <card>
            <div>
                <namecard>kelola user</namecard>
                <input type="text" />
                <div ref="input">el</div>
            </div>
        </card>
    </main-page>
</template>
<script>
export default {
    mounted() {
        console.log(this.$refs);
    },
};
</script>
<style lang=""></style>
