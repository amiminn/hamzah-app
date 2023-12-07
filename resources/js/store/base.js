export default {
    namespaced: true,
    state: () => ({
        app: {
            nama_app: null,
        },
    }),
    mutations: {
        appConfig(state) {
            axios.get("/api/pengaturan").then((data) => {
                state.app = data.data;
            });
        },
    },
};
