<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <namecard>kelola transaksi</namecard>
            </card>
            <card>
                <div class="my-3">
                    <form @submit.prevent="cari">
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
                                {{
                                    $filters.terbayar(
                                        d.jumlah_pembayaran,
                                        d.harga_asli
                                    )
                                }}
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
import paginate from "../../components/pagination/TailwindPagination.vue";
export default {
    components: { paginate },
    data() {
        return {
            dataTransaksi: [],
            cariData: null,
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
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>
