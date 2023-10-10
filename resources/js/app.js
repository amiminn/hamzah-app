import "./bootstrap";
import "animate.css";
import "flowbite";
import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";

import Main from "./components/main/main.vue";
import store from "./store";
import Card from "./components/inc/card.vue";
import Alert from "./components/inc/alert.vue";
import NameCard from "./components/inc/namecard.vue";
import Tag from "./components/inc/tag.vue";
import Trans from "./components/inc/transition.vue";

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

        app.config.globalProperties.$api = {
            auth: {
                login: "/api/login",
            },
        };

        app.config.globalProperties.$filters = {
            status(data = null) {
                if (data == 1) return "Aktif";
                if (data == 0) return "Nonaktif";
            },
        };
        app.use(store);
        app.use(plugin);
        app.mount(el);
    },
});
