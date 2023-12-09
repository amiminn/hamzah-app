<template lang="">
    <main-page>
        <div class="grid gap-3">
            <card>
                <namecard>statistic dashboard</namecard>
            </card>
            <div class="grid grid-cols-2 sm:xl:grid-cols-4 gap-3">
                <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-2xl">total transaksi</div>
                            <div class="font-bold text-3xl">
                                {{ data.total_transaksi }}
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-lg">total pendapatan</div>
                            <div class="font-bold text-3xl">
                                {{ $filters.hargaGroup(data.total_pendapatan) }}
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-lg">pendapatan bulan ini</div>
                            <div class="font-bold text-3xl">
                                {{
                                    $filters.hargaGroup(
                                        data.pendapatan_bulan_ini
                                    )
                                }}
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-lg">jumlah kamar</div>
                            <div class="font-bold text-3xl">
                                {{ data.jumlah_kamar }}
                            </div>
                        </div>
                    </div>
                </card>
                <!-- <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-lg">transaksi gugur</div>
                            <div class="font-bold text-3xl">
                                {{ data.jumlah_kamar }}
                            </div>
                        </div>
                    </div>
                </card>
                <card>
                    <div class="flex justify-between gap-3">
                        <img
                            src="/assets/icon/warning_738884.png"
                            alt="icon_transaksi"
                            class="w-20"
                        />
                        <div class="grid text-right gap-2">
                            <div class="text-lg">transaksi berhasil</div>
                            <div class="font-bold text-3xl">
                                {{ data.jumlah_kamar }}
                            </div>
                        </div>
                    </div>
                </card> -->
            </div>
            <div class="grid gap-3">
                <!-- <card> chart pendapatan? </card> -->
                <!-- <card> chart transaksi meningkat? </card> -->
                <ChartA></ChartA>
            </div>
        </div>
    </main-page>
</template>
<script>
import ChartA from "./chart.vue";
export default {
    props: ["data"],
    components: { ChartA },
    mounted() {
        console.log(this.data);
    },
};
</script>
<style lang=""></style>
