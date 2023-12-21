<template lang="">
    <div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th>no</th>
                    <th>nama</th>
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
                    <td>
                        <div class="h-3 rounded w-28" :class="d.primary"></div>
                    </td>
                    <td>-</td>
                    <td class="flex gap-2">
                        <div
                            class="text-blue-400 cursor-pointer"
                            @click="editVilla(d.id)"
                        >
                            edit
                        </div>
                        <div
                            @click="hapusData(d.id)"
                            class="text-red-400 cursor-pointer"
                        >
                            hapus
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
    </div>
</template>
<script>
import paginate from "../../../components/pagination/TailwindPagination.vue";
import Swal from "sweetalert2";
export default {
    components: { paginate },

    data() {
        return {
            dataVilla: [],
            idVilla: null,
            modal: false,
        };
    },
    methods: {
        async getData(page = 1) {
            try {
                let res = await axios.get(this.$api.villa + "?page=" + page);
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
            this.$emit("setId", id);
        },
        async hapusData(id) {
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
                    try {
                        axios.delete(this.$api.villa + "/" + id).then((res) => {
                            this.$toast(res.data.msg);
                            this.getData();
                        });
                    } catch (error) {
                        console.log(error);
                    }
                }
            });
        },
    },
    mounted() {
        this.getData();
    },
};
</script>
