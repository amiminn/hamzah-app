<template lang="">
    <div id="accordion-collapse" data-accordion="collapse">
        <div id="accordion-collapse-heading-1">
            <button
                type="button"
                class="flex items-center justify-between w-full p-2 bg-gray-100 font-medium text-left text-gray-500 focus:ring-4 focus:ring-gray-200 hover:bg-gray-100"
                :data-accordion-target="'#' + name.replace(' ', '')"
                aria-expanded="false"
                :aria-controls="name.replace(' ', '')"
            >
                <span>{{ name }}</span>
                <svg
                    data-accordion-icon
                    class="w-3 h-3 mr-3 rotate-180 shrink-0"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 10 6"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5 5 1 1 5"
                    />
                </svg>
            </button>
        </div>
        <Transition>
            <div
                :id="name.replace(' ', '')"
                class="hidden"
                aria-labelledby="accordion-collapse-heading-1"
            >
                <div class="p-5">
                    <slot></slot>
                </div>
            </div>
        </Transition>
    </div>
</template>
<script>
export default {
    props: ["name"],
};
</script>
<style lang=""></style>
