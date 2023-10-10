import { createStore } from "vuex";

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
});

export default store;
