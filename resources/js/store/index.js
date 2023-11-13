import { createStore } from "vuex";
import base from "./base";

const store = createStore({
    state() {
        return {
            sideApp: {
                "data-drawer-target": "logo-sidebar",
                "data-drawer-toggle": "logo-sidebar",
                "aria-controls": "logo-sidebar",
            },
        };
    },
    modules: {
        base,
    },
});

export default store;
