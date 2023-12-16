<template lang="">
    <div
        class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50"
        role="alert"
    >
        <img
            src="/assets/icon/warning_738884.png"
            alt="warning"
            class="h-5 w-5 mr-5"
        />
        <div>
            <slot></slot>
        </div>
    </div>
</template>
