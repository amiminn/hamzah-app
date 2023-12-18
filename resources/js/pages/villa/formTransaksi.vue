<template lang="">
    <main-page>
        <div class="grid gap-5">
            <card>
                <namecard>transaksi baru</namecard>
            </card>
            <card>
                <div class="mb-5">
                    <kembali></kembali>
                </div>
                <alert>
                    Penting: Sebelum melanjutkan, pastikan bahwa informasi yang
                    Anda masukkan dalam formulir villa ini adalah benar dan
                    lengkap. Harap periksa kembali tanggal, data customer, dan
                    detail lainnya untuk memastikan kelancaran proses input
                    data.
                </alert>
                <alert
                    >Booking selama
                    <span class="font-bold text-xl"
                        >{{ formData.hari }} malam</span
                    >, check-in
                    <span class="font-bold text-xl">
                        {{ formData.booking_date.startStr }}
                    </span>
                    dan check-out
                    <span class="font-bold text-xl">
                        {{ formData.booking_date.endStr }}
                    </span>
                </alert>
                <warnavilla></warnavilla>
                <form @submit.prevent="submitForm">
                    <div class="grid sm:xl:grid-cols-2 gap-3">
                        <div>
                            <label for="villa"
                                >pilih villa(idenditas villa, kamar, dll)</label
                            >
                            <select
                                id="villa"
                                class="form-input"
                                @change="onChange($event)"
                                v-model="formData.villa_id"
                            >
                                <option selected disabled>pilih</option>
                                <option v-for="d in listVilla" :value="d.id">
                                    {{ d.nama }}
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="nama">Nama Customer</label>
                            <input
                                v-model="formData.nama_customer"
                                type="text"
                                id="nama"
                                class="form-input"
                            />
                        </div>
                        <div>
                            <label for="no_hp">No Hp</label>
                            <input
                                v-model="formData.no_hp"
                                type="text"
                                id="no_hp"
                                class="form-input"
                            />
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input
                                v-model="formData.email"
                                type="text"
                                id="email"
                                class="form-input"
                            />
                        </div>
                        <div>
                            <label for="domisili">domisili lengkap</label>
                            <input
                                v-model="formData.domisili"
                                type="text"
                                id="domisili"
                                class="form-input"
                            />
                        </div>
                        <div>
                            <label for="provinsi">provinsi</label>
                            <input
                                v-model="formData.provinsi"
                                type="text"
                                id="provinsi"
                                class="form-input"
                            />
                        </div>
                        <div>
                            <label for="harga_asli"
                                >harga villa (per-malam)</label
                            >
                            <input
                                v-model="formData.harga_asli"
                                type="text"
                                id="harga_asli"
                                class="form-input cursor-not-allowed"
                                readonly
                            />
                        </div>
                        <div>
                            <label for="jumlah_pembayaran"
                                >jumlah pembayaran (DP)</label
                            >
                            <input
                                v-model="formData.jumlah_pembayaran"
                                type="text"
                                id="jumlah_pembayaran"
                                class="form-input"
                            />
                        </div>
                        <div class="flex items-center gap-x-3 mb-4">
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
                                saya setuju dan memahami bahwa informasi yang
                                saya berikan akan digunakan sesuai dengan
                                kebijakan privasi dan syarat ketentuan yang
                                berlaku.
                            </label>
                        </div>
                    </div>
                    <button v-if="setuju" class="btn btn-sky btn-block my-5">
                        submit
                    </button>
                </form>
            </card>
        </div>
    </main-page>
</template>
<script>
export default {
    props: ["fullDate"],
    data() {
        return {
            setuju: false,
            formData: {
                villa_id: null,
                booking_date: JSON.parse(this.fullDate),
                nama_customer: null,
                no_hp: "62",
                email: null,
                domisili: null,
                provinsi: null,
                harga_asli: 0,
                jumlah_pembayaran: null,
                hari: this.hitungMalam(
                    JSON.parse(this.fullDate).startStr,
                    JSON.parse(this.fullDate).endStr
                ),
            },

            listVilla: [],
        };
    },
    methods: {
        async submitForm() {
            try {
                let res = await axios.post(this.$api.transaksi, this.formData);
                this.$toast(res.data.msg);
                console.log(res.data);
                // this.$router.get("transaksi");
            } catch (error) {
                console.log(error);
            }
        },

        async getListVilla() {
            let res = await axios.get("api/listvilla");
            this.listVilla = res.data;
        },

        onChange(event) {
            let x = _.find(this.listVilla, [
                "id",
                parseInt(event.target.value),
            ]);
            this.formData.harga_asli = x.harga;
        },

        hitungMalam(startStr, endStr) {
            var checkInDate = new Date(startStr);
            var checkOutDate = new Date(endStr);
            var timeDifference = checkOutDate.getTime() - checkInDate.getTime();
            return Math.ceil(timeDifference / (1000 * 3600 * 24));
        },
    },
    mounted() {
        this.getListVilla();
    },
};
</script>
<style lang=""></style>
