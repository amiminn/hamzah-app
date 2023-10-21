<template lang="">
    <main-page>
        <namecard>pengaturan aplikasi</namecard>
        <div class="grid grid-cols-2 gap-3">
            <updatelogo />
            <Info />
        </div>
    </main-page>
</template>
<script>
import Info from "./informasi.vue";
import updatelogo from "./updatelogo.vue";
export default {
    components: { Info, updatelogo },
};
</script>
<style lang=""></style>
