<template>
    <div>
        <warnavilla></warnavilla>
        <form @submit.prevent="addVilla">
            <div class="grid gap-5">
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
                <div class="grid sm:xl:grid-cols-2 gap-3">
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
                        <label for="warna">
                            <span
                                class="px-3 w-10 rounded h-full"
                                :class="formData.primary"
                            >
                                warna primary
                            </span>
                        </label>
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
                this.$toast(res.data.msg);
            } catch (error) {}
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
