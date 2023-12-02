<template lang="">
    <main-page>
        <div class="grid gap-5">
            <card>
                <namecard>kelola villa</namecard>
            </card>
            <card>
                <Calend />
            </card>
        </div>
    </main-page>
</template>
<script>
import Calend from "./availableVilla.vue";
export default {
    components: { Calend },
};
</script>
<style lang=""></style>
