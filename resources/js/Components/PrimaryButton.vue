<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button
        :type="type"
        class="items-center px-4 py-2 bg-primary-red border border-transparent rounded-xl font-semibold text-white uppercase tracking-widest hover:bg-secondry-red focus:bbg-secondry-red active:bg-primary-red focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full block h-14 text-base"
    >
        <slot />
    </button>
</template>
