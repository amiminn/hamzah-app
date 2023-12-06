<template lang="">
    <card>
        <div class="flex justify-end mb-2">
            <button
                v-if="!bookingDate"
                class="border flex gap-x-3 rounded px-6 py-2 text-slate-700 cursor-not-allowed"
            >
                <img
                    src="assets/icon/warning_738884.png"
                    alt="warning"
                    class="w-5"
                />
                lanjut (tambah) transaksi
            </button>
            <Link
                :href="'transaksi-baru=' + bookingDate"
                v-if="bookingDate"
                class="border rounded px-6 py-2 text-white bg-sky-950"
            >
                lanjut (tambah) transaksi
            </Link>
        </div>
        <FullCalendar :options="calendarOptions" />
    </card>
</template>
<script>
import FullCalendar from "@fullcalendar/vue3";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
export default {
    components: { FullCalendar },
    data() {
        return {
            transaksi: false,
            bookingDate: "",
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin],
                initialView: "dayGridMonth",
                selectable: true,
                events: [
                    {
                        title: "Terbooking",
                        start: "2023-12-07",
                        end: "2023-12-09",
                        classNames: [
                            "text-white bg-red-400 border-none font-bold pl-2 py-1",
                        ],
                    },
                ],
                select: this.selectDate,
                // unselect: this.unSelectDate,
            },
        };
    },
    methods: {
        selectDate(info) {
            this.transaksi = true;
            this.bookingDate = JSON.stringify({
                endStr: info.endStr,
                startStr: info.startStr,
            });
        },
        unSelectDate() {
            this.transaksi = false;
            this.bookingDate = null;
        },
        async getTransaksiDate() {
            let res = await axios.get(this.$api.transaksi_date);
            console.log(res.data);
        },
    },
    mounted() {
        this.getTransaksiDate();
    },
};
</script>
<style>
.fc-event-title {
    color: !important black;
}

.fc .fc-highlight {
    background: rgba(145, 255, 178, 0.3);
}
</style>
