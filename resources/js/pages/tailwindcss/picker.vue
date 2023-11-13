<template lang="">
    <div>
        date picker (<a
            href="https://easepick.com/configurator/"
            target="_blank"
            class="text-blue-400"
            >go to</a
        >)
    </div>
    <div class="w-64">
        <input id="datepicker" class="form-input" />
    </div>
</template>
<script>
import { easepick } from "@easepick/core";
import { RangePlugin } from "@easepick/range-plugin";
import { LockPlugin } from "@easepick/lock-plugin";
import { DateTime } from "@easepick/datetime";

export default {
    mounted() {
        const allowedDates = [
            "2023-11-01",
            "2023-11-03",
            "2023-11-07",
            "2023-11-11",
            "2023-11-17",
            "2023-11-21",
        ];

        new easepick.create({
            element: document.getElementById("datepicker"),
            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css",
            ],
            lang: "id-ID",
            plugins: [LockPlugin, RangePlugin],
            RangePlugin: {
                tooltipNumber(num) {
                    return num - 0;
                },
                locale: {
                    one: "hari",
                    other: "hari",
                },
            },
            LockPlugin: {
                minDate: new Date(),
                minDays: 1,
                inseparable: true,
                selectForward: true,
                filter(date, picked) {
                    let res = allowedDates.includes(date.format("YYYY-MM-DD"));
                    return res;
                },
            },
            inline: true,
        });
    },
};
</script>
<style lang=""></style>
