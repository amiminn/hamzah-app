<template lang="">
    <main-page>
        <div class="grid gap-5">
            <card>
                <namecard>kelola villa</namecard>
                <div class="">
                    <ul class="flex flex-wrap -mb-px font-medium text-gray-500">
                        <li class="me-2">
                            <button
                                class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group gap-3"
                                aria-current="page"
                                @click="open(1)"
                                :class="
                                    tab == 1
                                        ? 'text-sky-600 border-sky-600 active'
                                        : 'order-transparent'
                                "
                            >
                                <vue-feather type="calendar"></vue-feather>
                                Calender villa
                            </button>
                        </li>
                        <li class="me-2">
                            <button
                                class="inline-flex items-center justify-center p-4 border-b-2 b rounded-t-lg group gap-3"
                                @click="open(2)"
                                :class="
                                    tab == 2
                                        ? 'text-sky-600 border-sky-600 active'
                                        : 'order-transparent'
                                "
                            >
                                <vue-feather type="git-commit"></vue-feather>
                                Pengaturan villa
                            </button>
                        </li>
                    </ul>
                </div>
            </card>
            <div v-if="tab == 1">
                <Calend />
            </div>
            <div v-if="tab == 2">
                <pengaturan />
            </div>
        </div>
    </main-page>
</template>
<script>
import Calend from "./availableVilla.vue";
import pengaturan from "./pengaturan.vue";
export default {
    components: { Calend, pengaturan },
    data() {
        return {
            tab: 1,
        };
    },
    methods: {
        open(id) {
            this.tab = id;
        },
    },
};
</script>
<style>
.fc-day {
    cursor: pointer;
}
</style>
