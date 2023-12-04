<template lang="">
    <card>
        <FullCalendar :options="calendarOptions" />
        <div class="text-center mt-3" disable>
            <button class="btn btn-sky btn-block">
                lanjut (tambah) transaksi ({{ bookingDate }})
            </button>
        </div>
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
                        start: "2023-12-05",
                        // end: "2023-12-07",
                        classNames: [
                            "text-white bg-red-400 border-none font-bold pl-2 py-1",
                        ],
                    },
                ],
                select: this.selectDate,
                unselect: this.unSelectDate,
            },
        };
    },
    methods: {
        selectDate(info) {
            this.transaksi = true;
            this.bookingDate = info.startStr;
        },
        unSelectDate() {
            this.transaksi = false;
        },
    },
    mounted() {},
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
