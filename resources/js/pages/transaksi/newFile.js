/* __placeholder__ */
export default (await import("vue")).defineComponent({
    props: ["data"],
    data() {
        return {};
    },
    methods: {
        async updateForm() {
            try {
                let res = await axios.put(
                    this.$api.transaksi + "/" + this.data.id,
                    {
                        nama_customer: this.data.nama_customer,
                        email: this.data.email,
                        no_hp: this.data.no_hp,
                        domisili: this.data.domisili,
                        provinsi: this.data.provinsi,
                        jumlah_pembayaran: this.data.jumlah_pembayaran,
                    }
                );

                this.$toast(res.data.msg);
            } catch (error) {
                console.log(error);
            }
        },
    },
    mounted() {},
});
