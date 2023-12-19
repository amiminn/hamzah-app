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
                                v-model="dataTransaksi.invoice"
                            />
                        </div>
                        <div>
                            <label for="villa">villa</label>
                            <input
                                readonly
                                type="text"
                                id="villa"
                                class="form-input disabled"
                                v-model="data_villa.nama"
                            />
                        </div>
                        <div>
                            <label for="cekin">tanggal check-in</label>
                            <input
                                type="date"
                                id="cekin"
                                readonly
                                class="form-input disabled"
                                v-model="booking_date.startStr"
                            />
                        </div>
                        <div>
                            <label for="cekout">tanggal check-out</label>
                            <input
                                type="date"
                                id="cekout"
                                readonly
                                class="form-input disabled"
                                v-model="booking_date.endStr"
                            />
                        </div>
                        <div>
                            <label for="nama">nama</label>
                            <input
                                type="text"
                                id="nama"
                                class="form-input"
                                v-model="dataTransaksi.nama_customer"
                            />
                        </div>

                        <div>
                            <label for="email">email</label>
                            <input
                                type="text"
                                id="email"
                                class="form-input"
                                v-model="dataTransaksi.email"
                            />
                        </div>
                        <div>
                            <label for="no_hp">nomor hp</label>
                            <input
                                type="text"
                                id="no_hp"
                                class="form-input"
                                v-model="dataTransaksi.no_hp"
                            />
                        </div>
                        <div>
                            <label for="domisili">domisili</label>
                            <input
                                type="text"
                                id="domisili"
                                class="form-input"
                                v-model="dataTransaksi.domisili"
                            />
                        </div>
                        <div>
                            <label for="provinsi">provinsi</label>
                            <input
                                type="text"
                                id="provinsi"
                                class="form-input"
                                v-model="dataTransaksi.provinsi"
                            />
                        </div>
                        <div>
                            <label for="jumlah_dibayar">jumlah dibayar</label>
                            <input
                                type="text"
                                id="jumlah_dibayar"
                                class="form-input"
                                v-model="dataTransaksi.jumlah_pembayaran"
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
                    <button
                        class="btn btn-danger btn-block my-5"
                        @click="confirmDel()"
                    >
                        hapus
                    </button>
                </card>
                <div
                    v-if="statusPembayaran"
                    class="flex items-center text-center justify-center p-4 mb-4 text-xl border border-green-800 text-green-800 rounded-lg bg-green-50"
                >
                    status pembayaran telah lunas
                    <br />
                    <br />
                    dibayar:
                    {{ $filters.harga(dataTransaksi.pelunasan.jumlah) }}
                    <br />
                    {{ $filters.tanggal(dataTransaksi.pelunasan.tanggal) }}
                </div>
                <card v-if="!statusPembayaran">
                    <alert>
                        <span class="font-bold"> Penting: </span>
                        Mengubah status pembayaran dari 'Belum Lunas' menjadi
                        'Lunas' dapat berdampak pada akurasi catatan keuangan.
                        Harap pastikan bahwa perubahan ini sesuai dengan
                        transaksi sebenarnya. Setelah diubah, perubahan ini akan
                        mempengaruhi laporan dan catatan keuangan.
                    </alert>

                    <button
                        class="btn btn-danger btn-block my-5"
                        @click="transaksiLunas"
                    >
                        lunasi sekarang
                    </button>
                </card>
            </div>
        </div>
    </main-page>
</template>
<script>
import Swal from "sweetalert2";
export default {
    props: ["id"],
    data() {
        return {
            statusPembayaran: false,
            dataTransaksi: {
                jumlah_pembayaran: 0,
            },
            data_villa: {},
            booking_date: {},
        };
    },
    methods: {
        async getData() {
            try {
                let res = await axios.get(this.$api.transaksi + "/" + this.id);
                this.dataTransaksi = res.data;
                this.data_villa = res.data.data_villa;
                this.booking_date = res.data.booking_date;
                this.statusPembayaran = res.data.status;
                this.dataTransaksi.jumlah_pembayaran =
                    res.data.jumlah_pembayaran;
            } catch (error) {}
        },

        async updateForm() {
            try {
                let res = await axios.put(this.$api.transaksi + "/" + this.id, {
                    nama_customer: this.dataTransaksi.nama_customer,
                    email: this.dataTransaksi.email,
                    no_hp: this.dataTransaksi.no_hp,
                    domisili: this.dataTransaksi.domisili,
                    provinsi: this.dataTransaksi.provinsi,
                    jumlah_pembayaran: this.dataTransaksi.jumlah_pembayaran,
                });
                this.getData();
                this.$toast(res.data.msg);
            } catch (error) {
                console.log(error);
            }
        },

        async delData() {
            try {
                let res = await axios.delete(
                    this.$api.transaksi + "/" + this.id
                );
                this.$toast(res.data.msg);
                this.$router.get("transaksi");
            } catch (error) {
                console.log(error);
            }
        },

        confirmDel() {
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus data?",
                text: "Setelah dihapus, data tidak dapat dipulihkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.delData();
                }
            });
        },

        async transaksiLunas() {
            try {
                let res = await axios.get("api/transaksi-lunas=" + this.id);
                this.$toast(res.data.msg);
                this.getData();
            } catch (error) {
                console.error(error);
            }
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>
