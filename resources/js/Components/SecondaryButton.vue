<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center justify-center gap-2 rounded-full border border-stroke bg-transparent px-6 py-3 text-base font-semibold text-text-primary transition duration-200 ease-out hover:border-accent hover:text-accent focus:outline-none focus:ring-2 focus:ring-accent/40 focus:ring-offset-2 focus:ring-offset-bg-default disabled:cursor-not-allowed disabled:opacity-60"
    >
        <slot />
    </button>
</template>
