<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <namecard>kelola transaksi</namecard>
            </card>
            <to-excel></to-excel>
            <card>
                <div class="my-3">
                    <div class="flex my-3">
                        <button
                            @click="inFilter"
                            :class="onFilter ? atOn : ''"
                            class="text-sky-900 font-semibold border border-sky-900 px-6 rounded-l-md py-1"
                        >
                            filter transaksi
                        </button>
                        <button
                            @click="inCari"
                            :class="onCari ? atOn : ''"
                            class="text-sky-900 font-semibold border border-sky-900 px-6 rounded-r-md py-1"
                        >
                            cari
                        </button>
                    </div>
                    <form @submit.prevent="cari" v-if="onCari">
                        <div class="flex">
                            <input
                                type="text"
                                placeholder="cari customer"
                                v-model="cariData"
                                class="form-input"
                            />
                            <button
                                class="px-4 mx-2 border rounded border-gray-300"
                                type="submit"
                            >
                                cari
                            </button>
                        </div>
                    </form>
                    <form @submit.prevent="filterData" v-if="onFilter">
                        <div class="grid grid-cols-3 gap-3 my-3">
                            <div>
                                <label for="tanggalMulai">tanggal awal</label>
                                <input
                                    type="date"
                                    class="form-input"
                                    id="tanggalMulai"
                                    v-model="tanggal.startStr"
                                />
                            </div>
                            <div>
                                <label for="tanggalAkhir">tanggal akhir</label>
                                <input
                                    type="date"
                                    class="form-input"
                                    id="tanggalAkhir"
                                    v-model="tanggal.endStr"
                                />
                            </div>
                            <div class="grid content-end">
                                <button
                                    class="px-6 py-2 border rounded border-gray-300"
                                >
                                    filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <table
                    class="w-full text-sm text-left text-gray-500 rounded-t bg-gray-700"
                >
                    <thead class="text-xs text-white uppercase">
                        <tr>
                            <th>no</th>
                            <th>nama cs</th>
                            <th>provinsi</th>
                            <th>jumlah dibayar (DP)</th>
                            <th>status</th>
                            <th>lihat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(d, index) in dataTransaksi.data"
                            :key="index"
                            class="bg-white border-b hover:bg-gray-50"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>{{ d.nama_customer }}</td>
                            <td>{{ d.provinsi }}</td>
                            <td>{{ $filters.harga(d.jumlah_pembayaran) }}</td>
                            <td>
                                {{ $filters.terbayar(d.status) }}
                            </td>
                            <td>
                                <Link
                                    class="text-blue-400"
                                    :href="'transaksi=' + d.id"
                                >
                                    <vue-feather type="feather"></vue-feather>
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <paginate
                        :limit="1"
                        :data="dataTransaksi"
                        @pagination-change-page="getResult"
                    ></paginate>
                </div>
            </card>
        </div>
    </main-page>
</template>
<script>
import toExcel from "./export.vue";
import paginate from "../../components/pagination/TailwindPagination.vue";
export default {
    components: { paginate, toExcel },
    data() {
        return {
            dataTransaksi: [],
            cariData: null,
            tanggal: {
                startStr: null,
                endStr: null,
            },
            onToggle: "",
            onCari: false,
            onFilter: false,
            atOn: "bg-sky-900 !text-white",
        };
    },
    methods: {
        async getData(page = 1) {
            try {
                let res = await axios.get(
                    "/api" + this.$page.url + "?page=" + page
                );
                this.dataTransaksi = res.data;
            } catch (error) {}
        },
        loadPage(page) {
            this.getData(page);
        },

        getResult(page) {
            this.loadPage(page);
        },

        async cari() {
            let res = await axios.post("api/cari-transaksi", {
                name: this.cariData,
            });
            this.dataTransaksi = res.data;
        },
        async filterData() {
            let res = await axios.post("api/filter-transaksi", this.tanggal);
            this.dataTransaksi = res.data;
        },
        getLastDayOfMonth() {
            var today = new Date();
            today.setMonth(today.getMonth() + 1, 0);
            var lastDayOfMonth = today.getDate();
            var year = today.getFullYear();
            var month = today.getMonth() + 1;
            return (
                year +
                "-" +
                (month < 10 ? "0" : "") +
                month +
                "-" +
                (lastDayOfMonth < 10 ? "0" : "") +
                lastDayOfMonth
            );
        },

        getFirstDayOfMonth() {
            var today = new Date();
            today.setDate(1);
            var year = today.getFullYear();
            var month = today.getMonth() + 1;
            return year + "-" + (month < 10 ? "0" : "") + month + "-01";
        },
        inCari() {
            this.onCari = !this.onCari;
            this.onFilter = false;
        },
        inFilter() {
            this.onFilter = !this.onFilter;
            this.onCari = false;
        },
    },
    mounted() {
        this.getData();
        this.tanggal.startStr = this.getFirstDayOfMonth();
        this.tanggal.endStr = this.getLastDayOfMonth();
    },
};
</script>
<style lang=""></style>
