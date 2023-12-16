<template lang="">
    <card>
        <namecard> export excel </namecard>

        <div class="grid grid-cols-3 gap-3 my-3">
            <div>
                <label for="tanggalMulai">tanggal awal</label>
                <input type="date" class="form-input" id="tanggalMulai" />
            </div>
            <div>
                <label for="tanggalMulai">tanggal akhir</label>
                <input type="date" class="form-input" id="tanggalMulai" />
            </div>
            <div class="grid content-end">
                <button class="text-white bg-emerald-700 px-6 py-2 rounded">
                    download excel
                </button>
            </div>
        </div>
    </card>
</template>
<script>
export default {};
</script>
<style lang=""></style>
