import "./bootstrap";
import "animate.css";
import "flowbite";
import VueFeather from "vue-feather";
import { createApp, h } from "vue";
import { router, createInertiaApp, Link } from "@inertiajs/vue3";
import moment from "moment/dist/moment";
import "moment/dist/locale/id";
moment.locale("id");
import Main from "./components/main/main.vue";
import store from "./store";
import Card from "./components/inc/card.vue";
import Alert from "./components/inc/alert.vue";
import NameCard from "./components/inc/namecard.vue";
import Tag from "./components/inc/tag.vue";
import Trans from "./components/inc/transition.vue";
import Acd from "./components/inc/accordion.vue";
import Modal from "./components/inc/modal.vue";
import Swal from "sweetalert2";
import kembali from "./components/inc/kembali.vue";
import warnavilla from "./components/inc/warnavilla.vue";
import toRupiah from "@develoka/angka-rupiah-js";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.component("Link", Link);
        app.component("main-page", Main);
        app.component("card", Card);
        app.component("namecard", NameCard);
        app.component("alert", Alert);
        app.component("tag", Tag);
        app.component("trans", Trans);
        app.component("acd", Acd);
        app.component("modal", Modal);
        app.component("kembali", kembali);
        app.component("warnavilla", warnavilla);
        app.component(VueFeather.name, VueFeather);

        app.config.globalProperties.$url = "http://127.0.0.1:8000/";
        app.config.globalProperties.$router = router;
        app.config.globalProperties.$key = {
            uploadJs: "public_12a1ydKBufjwc3sJ9bMrA5r8G5D9",
        };

        app.config.globalProperties.$api = {
            auth: {
                login: "/login",
            },
            dashboard: "/api/dashboard",
            pengaturan: "/api/pengaturan",
            users: "/api/users",
            transaksi: "/api/transaksi",
            villa: "/api/villa",
            transaksi_date: "/api/transaksi-date",
        };

        app.config.globalProperties.$filters = {
            status(data = null) {
                if (data == 1) return "Aktif";
                if (data == 0) return "Nonaktif";
            },
            harga(num = 0) {
                return toRupiah(num, { formal: false, floatingPoint: 0 });
            },
            hargaGroup(num = 0, gap = 2) {
                return toRupiah(num, {
                    formal: false,
                    useUnit: true,
                    spaceBeforeUnit: true,
                    floatingPoint: gap,
                });
            },
            terbayar(data) {
                if (data == 0) {
                    return "belum lunas";
                } else {
                    return "lunas";
                }
            },
            role(data) {
                if (data == 1) return "Admin";
                if (data == 0) return "Staff";
            },
            tanggal(tanggalAwal) {
                return moment(tanggalAwal, "Y-M-D").format("D MMMM Y");
            },
        };

        app.config.globalProperties.$toast = (msg, icon = "success") => {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon,
                title: msg,
            });
        };

        app.config.globalProperties.$confirm = () => {
            Swal.fire({
                title: "Apakah Anda yakin ingin menghapus data?",
                text: "Setelah dihapus, data tidak dapat dipulihkan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "data telah terhapus.",
                        icon: "success",
                    });
                }
            });
        };

        app.use(store);
        app.use(plugin);
        app.mount(el);
    },
});
