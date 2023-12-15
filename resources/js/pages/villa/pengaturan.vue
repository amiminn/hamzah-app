<template lang="">
    <main-page>
        <div class="grid gap-5">
            <card>
                <namecard>kelola pengaturan villa</namecard>
                <link-villa></link-villa>
            </card>
            <card>
                <div class="text-right">
                    <button class="btn btn-sky" v-if="edit" @click="kembali">
                        <span>kembali</span>
                    </button>
                    <button class="btn btn-sky" v-if="add" @click="kembali">
                        <span>kembali</span>
                    </button>
                    <button class="btn btn-sky" v-if="home" @click="addForm">
                        <span>+ tambah</span>
                    </button>
                </div>
                <div v-if="home">
                    <tableVilla @setId="editForm" />
                </div>
                <div v-if="add">
                    <formAdd />
                </div>
                <div v-if="edit">
                    <editVilla :idVilla="idVilla" />
                </div>
            </card>
        </div>
    </main-page>
</template>
<script>
import tableVilla from "./pengaturanVilla/index.vue";
import formAdd from "./pengaturanVilla/add.vue";
import linkVilla from "./linkVilla.vue";
import editVilla from "./pengaturanVilla/edit.vue";
export default {
    components: { tableVilla, formAdd, linkVilla, editVilla },
    data() {
        return {
            home: true,
            add: false,
            edit: false,
            idVilla: null,
        };
    },
    methods: {
        kembali() {
            this.add = false;
            this.edit = false;
            this.home = true;
        },
        editForm(id) {
            this.idVilla = id;
            this.add = false;
            this.edit = true;
            this.home = false;
        },
        addForm() {
            this.add = true;
            this.edit = false;
            this.home = false;
        },
    },
};
</script>
<style lang=""></style>
