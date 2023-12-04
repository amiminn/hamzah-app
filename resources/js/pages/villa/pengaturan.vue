<template lang="">
    <card>
        <div class="text-right">
            <button class="btn btn-sky" @click="addVilla">
                <span>{{ !add ? "+ tambah item" : "kembali" }}</span>
            </button>
        </div>
        <div v-if="!add">
            <tableVilla />
        </div>
        <div v-if="add">
            <formAdd />
        </div>
    </card>
</template>
<script>
import tableVilla from "./villaSet/index.vue";
import formAdd from "./villaSet/add.vue";
export default {
    components: { tableVilla, formAdd },
    data() {
        return {
            add: false,
        };
    },
    methods: {
        addVilla() {
            this.add = !this.add;
        },
    },
};
</script>
<style lang=""></style>
