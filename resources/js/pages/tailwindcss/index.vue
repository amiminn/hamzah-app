<template lang="">
    <main-page>
        <card>
            <namecard>tailwind utilitis</namecard>
            <div class="grid grid-cols-2 gap-3">
                <div class="flex justify-center">
                    <img
                        src="/assets/main/warna-pastel.jpg"
                        alt=""
                        class="rounded w-72"
                    />
                </div>
                <div class="grid gap-3">
                    <div>
                        <label>input kode warna</label>
                        <div class="flex">
                            <input
                                type="text"
                                class="form-input"
                                v-model="warna"
                            />
                            <button
                                class="rounded bg-sky-800 text-white px-5 mx-1"
                                @click="lihatPreview"
                            >
                                lihat
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4">
                        <div>
                            <span
                                class="px-20 rounded py-1"
                                :class="'bg-[' + preview + ']'"
                            >
                                preview
                            </span>
                        </div>
                        <div>
                            <span
                                class="px-20 py-1 text-white rounded bg-[#000]"
                            >
                                code
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </card>
    </main-page>
</template>

<script>
export default {
    data() {
        return {
            warna: "#000",
            preview: "",
        };
    },
    methods: {
        lihatPreview() {
            this.preview = this.warna;
        },
    },
};
</script>
<style lang=""></style>
