<template lang="">
    <main-page>
        <card>
            <namecard>kelola villa</namecard>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th>no</th>
                        <th>villa_id</th>
                        <th>nama cs</th>
                        <th>provinsi</th>
                        <th>jumlah pembayaran</th>
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
                        <td><div class="h-3 bg-red-400 rounded w-28"></div></td>
                        <td>{{ d.nama_customer }}</td>
                        <td>{{ d.provinsi }}</td>
                        <td>{{ d.jumlah_pembayaran }}</td>
                        <td>{{ d.status ? "lunas" : "belum lunas" }}</td>
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
    </main-page>
</template>
<script>
import paginate from "../../components/pagination/TailwindPagination.vue";
export default {
    components: { paginate },
    data() {
        return {
            dataTransaksi: [],
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
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>
