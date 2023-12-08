<template lang="">
    <card>
        <alert>
            Sebelum melanjutkan, periksa ketersediaan ruangan villa pada
            kalender di bawah ini. Pilih tanggal yang menunjukkan ruangan yang
            tersedia untuk memastikan kelancaran proses pemesanan. Terima kasih
            atas perhatiannya.
        </alert>
        <warnavilla></warnavilla>

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
                events: [],
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
            let dataEvent = res.data;

            this.calendarOptions.events = dataEvent.map((data) => {
                let resdata = {
                    title: data.nama_customer,
                    start: data.booking_date.startStr,
                    end: data.booking_date.endStr,
                    classNames: [
                        data.datavilla.primary +
                            " text-white border-none font-bold pl-2 py-1",
                    ],
                };

                return resdata;
            });
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
