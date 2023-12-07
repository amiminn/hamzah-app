<template lang="">
    <div class="my-5 bg-orange-50 p-6">
        <div class="flex flex-wrap text-center gap-2">
            <div
                v-for="d in listVilla"
                :class="d.primary"
                class="italic px-3 rounded text-white text-sm"
            >
                {{ d.nama }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            listVilla: [],
        };
    },
    methods: {
        async getListVilla() {
            let res = await axios.get("api/listvilla");
            this.listVilla = res.data;
        },
    },
    mounted() {
        this.getListVilla();
    },
};
</script>
<style lang=""></style>
