<template lang="">
    <main-page>
        <div class="grid gap-4">
            <card>
                <namecard>detail transaksi</namecard>
            </card>
            <card>
                <kembali></kembali>
                <div class="mt-5"></div>
                <alert>
                    <span class="font-bold"> Penting: </span>
                    Mengedit data dapat berdampak pada informasi yang ada. Harap
                    pastikan perubahan yang Anda lakukan akurat dan sesuai.
                    Kesalahan pengeditan mungkin sulit untuk diperbaiki.
                </alert>
                <form @submit.prevent="updateForm">
                    <div class="grid sm:xl:grid-cols-2 mt-5 gap-5">
                        <div>
                            <label for="invoice">invoice</label>
                            <input
                                readonly
                                type="text"
                                id="invoice"
                                class="form-input disabled"
                                v-model="data.invoice"
                            />
                        </div>
                        <div>
                            <label for="villa">villa</label>
                            <input
                                readonly
                                type="text"
                                id="villa"
                                class="form-input disabled"
                                v-model="data.datavilla.nama"
                            />
                        </div>
                        <div>
                            <label for="cekin">tanggal check-in</label>
                            <input
                                type="date"
                                id="cekin"
                                readonly
                                class="form-input disabled"
                                v-model="data.booking_date.startStr"
                            />
                        </div>
                        <div>
                            <label for="cekout">tanggal check-out</label>
                            <input
                                type="date"
                                id="cekout"
                                readonly
                                class="form-input disabled"
                                v-model="data.booking_date.endStr"
                            />
                        </div>
                        <div>
                            <label for="nama">nama</label>
                            <input
                                type="text"
                                id="nama"
                                class="form-input"
                                v-model="data.nama_customer"
                            />
                        </div>
                        <div>
                            <label for="email">email</label>
                            <input
                                type="text"
                                id="email"
                                class="form-input"
                                v-model="data.email"
                            />
                        </div>
                        <div>
                            <label for="no_hp">nomor hp</label>
                            <input
                                type="text"
                                id="no_hp"
                                class="form-input"
                                v-model="data.no_hp"
                            />
                        </div>
                        <div>
                            <label for="domisili">domisili</label>
                            <input
                                type="text"
                                id="domisili"
                                class="form-input"
                                v-model="data.domisili"
                            />
                        </div>
                        <div>
                            <label for="provinsi">provinsi</label>
                            <input
                                type="text"
                                id="provinsi"
                                class="form-input"
                                v-model="data.provinsi"
                            />
                        </div>
                        <div>
                            <label for="jumlah_dibayar">jumlah dibayar</label>
                            <input
                                type="text"
                                id="jumlah_dibayar"
                                class="form-input"
                                v-model="data.jumlah_pembayaran"
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary btn-block my-5"
                    >
                        update
                    </button>
                </form>
            </card>
            <div class="grid sm:xl:grid-cols-2 gap-5">
                <card>
                    <alert>
                        <span class="font-bold"> Penting: </span>
                        Anda akan menghapus data yang mungkin termasuk informasi
                        krusial. Pastikan untuk memeriksa kembali sebelum
                        melanjutkan proses penghapusan. Setelah dihapus, data
                        tidak dapat dipulihkan.
                    </alert>
                    <button class="btn btn-danger btn-block my-5">hapus</button>
                </card>
                <card>
                    <alert>
                        <span class="font-bold"> Penting: </span>
                        Mengubah status pembayaran dari 'Lunas' menjadi 'Belum
                        Lunas' atau sebaliknya dapat berdampak pada akurasi
                        catatan keuangan. Harap pastikan bahwa perubahan ini
                        sesuai dengan transaksi sebenarnya. Setelah diubah,
                        perubahan ini akan mempengaruhi laporan dan catatan
                        keuangan.
                    </alert>
                    <button class="btn btn-danger btn-block my-5">
                        belum lunas
                    </button>
                </card>
            </div>
        </div>
    </main-page>
</template>
<script>
export default {
    props: ["data"],
    data() {
        return {};
    },
    methods: {
        async updateForm() {
            try {
                let res = await axios.put(
                    this.$api.transaksi + "/" + this.data.id,
                    {
                        nama_customer: this.data.nama_customer,
                        email: this.data.email,
                        no_hp: this.data.no_hp,
                        domisili: this.data.domisili,
                        provinsi: this.data.provinsi,
                        jumlah_pembayaran: this.data.jumlah_pembayaran,
                    }
                );

                this.$toast(res.data.msg);
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {},
};
</script>
<style lang=""></style>
