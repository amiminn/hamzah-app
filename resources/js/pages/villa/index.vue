<template lang="">
    <main-page>
        <div class="grid gap-5">
            <card>
                <namecard>kelola kalender villa</namecard>
                <link-villa></link-villa>
            </card>
            <Calend />
        </div>
    </main-page>
</template>
<script>
import Calend from "./availableVilla.vue";
import linkVilla from "./linkVilla.vue";

export default {
    components: { Calend, linkVilla },
    data() {
        return {};
    },
    methods: {},
};
</script>
<style>
.fc-day {
    cursor: pointer;
}

:disabled {
    @apply !hidden;
}
</style>
