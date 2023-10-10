<template lang="">
    <transition
        enter-active-class="animate__animated animate__fadeIn animate__faster"
        leave-active-class="animate__animated animate__fadeOut animate__faster"
    >
        <slot></slot>
    </transition>
</template>
