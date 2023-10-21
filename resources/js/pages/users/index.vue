<template lang="">
    <main-page>
        <card>
            <namecard>kelola user</namecard>

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
                            v-for="(item, index) in jumlah"
                            :key="index"
                            class="bg-white border-b hover:bg-gray-50"
                        >
                            <td class="px-6 py-4">{{ index + 1 }}</td>
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                            >
                                Ilham x Asep
                            </th>
                            <td class="px-6 py-4">ilhamGod@gmail.com</td>
                            <td class="px-6 py-4">user</td>
                            <td class="px-6 py-4">aktif</td>
                            <td class="px-6 py-4">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 hover:underline"
                                    >Edit</a
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </card>
    </main-page>
</template>
<script>
export default {
    data() {
        return {
            jumlah: 10,
        };
    },
};
</script>
<style lang=""></style>
