<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <namecard>kelola user</namecard>
                    </div>
                    <div class="text-right">
                        <Link href="tambah-users" class="btn btn-sky"
                            >tambah user</Link
                        >
                    </div>
                </div>
            </card>
            <card>
                <div class="relative overflow-x-auto sm:rounded">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(d, index) in dataUser.data"
                                :key="index"
                                class="bg-white border-b hover:bg-gray-50"
                            >
                                <td class="px-6 py-4">{{ index + 1 }}</td>
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                >
                                    {{ d.name }}
                                </th>
                                <td class="px-6 py-4">{{ d.email }}</td>
                                <td class="px-6 py-4">{{ d.role }}</td>
                                <td
                                    class="px-6 py-4 font-bold"
                                    :class="
                                        !d.isActive
                                            ? 'text-red-500'
                                            : 'text-emerald-500'
                                    "
                                >
                                    {{ $filters.status(d.isActive) }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="'/users=' + d.id"
                                        class="font-medium text-blue-600 hover:underline"
                                        >Edit</Link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <paginate
                        :limit="1"
                        :data="dataUser"
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
            dataUser: [],
        };
    },

    methods: {
        async getData(page = 1) {
            try {
                let res = await axios.get(
                    "/api" + this.$page.url + "?page=" + page
                );
                this.dataUser = res.data;
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
