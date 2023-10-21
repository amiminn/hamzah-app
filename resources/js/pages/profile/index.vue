<template lang="">
    <main-page>
        <div class="grid grid-cols-2 gap-3">
            <div class="grid gap-3">
                <card>
                    <namecard>avatar</namecard>
                </card>
                <updatepassword />
            </div>
            <informasiprofile />
        </div>
    </main-page>
</template>
<script>
import informasiprofile from "./informasiprofile.vue";
import updatepassword from "./updatepassword.vue";
export default {
    components: { updatepassword, informasiprofile },
    data() {
        return {
            isFile: {},
        };
    },
    methods: {
        up() {},
    },
};
</script>
<style lang=""></style>
