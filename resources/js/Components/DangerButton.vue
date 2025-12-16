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
        class="items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full block h-14 text-base"
    >
        <slot />
    </button>
</template>
