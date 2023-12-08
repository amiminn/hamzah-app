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
                            <div class="font-bold text-4xl">
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
                            <div class="font-bold text-4xl">4,2jt</div>
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
                            <div class="font-bold text-4xl">320k</div>
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
                            <div class="font-bold text-4xl">
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
                            <div class="text-lg">transaksi gugur</div>
                            <div class="font-bold text-4xl">
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
                            <div class="font-bold text-4xl">
                                {{ data.jumlah_kamar }}
                            </div>
                        </div>
                    </div>
                </card>
            </div>
            <div class="grid sm:xl:grid-cols-2 gap-3">
                <card> chart pendapatan? </card>
                <card> chart transaksi meningkat? </card>
            </div>
        </div>
    </main-page>
</template>
<script>
export default {
    props: ["data"],
};
</script>
<style lang=""></style>
