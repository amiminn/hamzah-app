<template lang="">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-white uppercase bg-gray-700">
            <tr>
                <th>no</th>
                <th>harga</th>
                <th>warna-primary</th>
                <th>fasilitas</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr
                v-for="(d, index) in dataVilla.data"
                :key="index"
                class="bg-white border-b hover:bg-gray-50"
            >
                <td>{{ index + 1 }}</td>
                <td>{{ d.nama }}</td>
                <td><div class="h-3 rounded w-28" :class="d.primary"></div></td>
                <td>-</td>
                <td>
                    <div
                        @click="editVilla(d.id)"
                        class="cursor-pointer text-sky-700"
                    >
                        edit
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt-4 text-right">
        <paginate
            :limit="1"
            :data="dataVilla"
            @pagination-change-page="getResult"
        ></paginate>
    </div>
</template>
<script>
import paginate from "../../../components/pagination/TailwindPagination.vue";

export default {
    components: { paginate },

    data() {
        return {
            dataVilla: [],
        };
    },
    methods: {
        async getData(page = 1) {
            try {
                let res = await axios.get(
                    "/api" + this.$page.url + "?page=" + page
                );
                this.dataVilla = res.data;
                this.dataUser = res.data;
            } catch (error) {}
        },
        loadPage(page) {
            this.getData(page);
        },

        getResult(page) {
            this.loadPage(page);
        },
        editVilla(id) {
            console.log(id);
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
<style lang=""></style>
