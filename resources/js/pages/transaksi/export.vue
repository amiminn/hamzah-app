<template lang="">
    <card>
        <namecard> export excel </namecard>

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
                    @click="exportExcel"
                    class="text-white bg-emerald-700 px-6 py-2 rounded"
                >
                    download excel
                </button>
            </div>
        </div>
    </card>
</template>
<script>
export default {
    data() {
        return {
            tanggal: {
                startStr: "",
                endStr: "",
            },

            dataLaporan: [
                {
                    id: "1",
                    name: "Saitama",
                    age: "32",
                },
                {
                    id: "2",
                    name: "Genos",
                    age: "24",
                },
            ],
        };
    },
    methods: {
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

        async exportExcel() {
            console.log(this.tanggal);
            // const XLSX = await import(
            //     "https://cdn.sheetjs.com/xlsx-0.19.2/package/xlsx.mjs"
            // );

            // const worksheet = XLSX.utils.json_to_sheet(this.dataLaporan);

            // const workbook = XLSX.utils.book_new();
            // XLSX.utils.book_append_sheet(workbook, worksheet, "data Laporan");

            // XLSX.writeFile(
            //     workbook,
            //     "Laporan" + this.getTodayDate() + ".xlsx",
            //     {
            //         compression: true,
            //     }
            // );
        },

        getTodayDate() {
            var today = new Date();
            var year = today.getFullYear();
            var month = today.getMonth() + 1;
            var day = today.getDate();
            return (
                year +
                "-" +
                (month < 10 ? "0" : "") +
                month +
                "-" +
                (day < 10 ? "0" : "") +
                day
            );
        },
    },
    mounted() {
        this.tanggal.startStr = this.getFirstDayOfMonth();
        this.tanggal.endStr = this.getLastDayOfMonth();
    },
};
</script>
<style lang=""></style>
