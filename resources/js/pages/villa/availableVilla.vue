<template lang="">
    <card>
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
            },
        };
    },
    methods: {
        selectDate(info) {
            console.log(info);
        },
    },
    mounted() {},
};
</script>
<style>
.fc-event-title {
    color: !important black;
}
</style>
