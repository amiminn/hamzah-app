<template lang="">
    <main-page>
        <div class="grid grid-cols-2 gap-3">
            <div class="grid gap-3">
                <card>
                    <namecard>avatar</namecard>
                    <div class="flex justify-center">
                        <img
                            src="assets/icon/gamer_1985783.png"
                            alt="avatar"
                            class="rounded-full w-40 border-2"
                        />
                    </div>
                </card>
                <updatepassword />
            </div>
            <div>
                <informasiprofile />
            </div>
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
