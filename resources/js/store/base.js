export default {
    namespaced: true,
    state: () => ({
        app: {
            nama_app: "@microservice",
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
