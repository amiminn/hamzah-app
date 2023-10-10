<template lang="">
    <Navbar />
    <Asidebar />

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <slot></slot>
        </div>
    </div>
</template>
<script>
import { initFlowbite } from "flowbite";
import Navbar from "./navbar.vue";
import Asidebar from "./sidebar.vue";
export default {
    components: { Navbar, Asidebar },
    mounted() {
        initFlowbite();
        console.log("main page");
    },
};
</script>
<style lang=""></style>
