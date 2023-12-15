<template lang="">
    <div class="">
        <ul class="flex flex-wrap -mb-px font-medium text-gray-500">
            <li class="me-2">
                <Link
                    href="villa"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group gap-3"
                    aria-current="page"
                    :class="
                        $page.url === '/villa'
                            ? 'text-sky-600 border-sky-600 active'
                            : 'order-transparent'
                    "
                >
                    <vue-feather type="calendar"></vue-feather>
                    Calender villa
                </Link>
            </li>
            <li class="me-2">
                <Link
                    href="pengaturan-villa"
                    class="inline-flex items-center justify-center p-4 border-b-2 b rounded-t-lg group gap-3"
                    :class="
                        $page.url === '/pengaturan-villa'
                            ? 'text-sky-600 border-sky-600 active'
                            : 'order-transparent'
                    "
                >
                    <vue-feather type="git-commit"></vue-feather>
                    Pengaturan villa
                </Link>
            </li>
        </ul>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
