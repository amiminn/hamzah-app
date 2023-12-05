<template>
    <div>
        <form @submit.prevent="addVilla">
            <div class="grid gap-3">
                <div>
                    <label for="identitas"
                        >Identitas villa (nama villa, kamar, dll)</label
                    >
                    <input
                        v-model="formData.nama"
                        type="text"
                        id="identitas"
                        class="form-input"
                    />
                </div>
                <div>
                    <label for="harga">Harga permalam</label>
                    <input
                        v-model="formData.harga"
                        type="number"
                        id="harga"
                        class="form-input"
                    />
                </div>
                <div>
                    <label for="warna">warna primary</label>
                    <select
                        id="warna"
                        class="form-input"
                        v-model="formData.primary"
                    >
                        <option selected disabled>pilih</option>
                        <option v-for="d in warna" :value="d.kode">
                            {{ d.nama }}
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    submit
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    data() {
        return {
            warna: [],
            formData: {
                nama: null,
                harga: null,
                primary: null,
            },
        };
    },
    methods: {
        async addVilla() {
            try {
                let res = await axios.post(this.$api.villa, this.formData);
                console.log(res.data);
            } catch (error) {
                console.log(error);
            }
        },
        fullWarna() {
            this.warna = [
                {
                    nama: "merah",
                    kode: "bg-red-400",
                },
                {
                    nama: "biru",
                    kode: "bg-blue-400",
                },
            ];
        },
    },
    mounted() {
        this.fullWarna();
    },
};
</script>
<style lang=""></style>
