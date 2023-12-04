<template>
    <div>
        <form @submit.prevent="addVilla">
            <div class="grid gap-3">
                <div>
                    <label for="identitas">Identitas villa</label>
                    <input type="text" id="identitas" class="form-input" />
                </div>
                <div>
                    <label for="harga">Harga permalam</label>
                    <input type="number" id="harga" class="form-input" />
                </div>
                <div>
                    <label for="warna">warna primary</label>
                    <select id="warna" class="form-input">
                        <option selected disabled>pilih</option>
                        <option value="bg-red-400 h-3">
                            merah <span class="bg-red-400 h-3 w-3"></span>
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    submit
                </button>
            </div>
        </form>
    </div>
</template>
<script>
export default {
    methods: {
        addVilla() {
            console.log("villa add");
        },
    },
};
</script>
<style lang=""></style>
