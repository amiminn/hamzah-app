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
                <div class="flex gap-3">
                    <input
                        id="setujuForm"
                        v-model="setuju"
                        type="checkbox"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    />
                    <label
                        for="setujuForm"
                        class="text-gray-500 italic text-sm"
                    >
                        saya setuju dan memahami bahwa informasi yang saya
                        berikan akan digunakan sesuai dengan kebijakan privasi
                        dan syarat ketentuan yang berlaku.
                    </label>
                </div>
                <button
                    v-if="setuju"
                    type="submit"
                    class="btn btn-primary btn-block"
                >
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
            setuju: false,
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
                    nama: "red",
                    kode: "bg-red-400",
                },
                {
                    nama: "blue",
                    kode: "bg-blue-400",
                },
                {
                    nama: "sky",
                    kode: "bg-sky-400",
                },
                {
                    nama: "orange",
                    kode: "bg-orange-400",
                },
                {
                    nama: "yellow",
                    kode: "bg-yellow-400",
                },
                {
                    nama: "green",
                    kode: "bg-green-400",
                },
                {
                    nama: "violet",
                    kode: "bg-violet-400",
                },
                {
                    nama: "slate",
                    kode: "bg-slate-400",
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
