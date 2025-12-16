<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center rounded-full bg-text-primary px-4 py-2 text-sm font-medium text-white shadow-inner transition duration-150 ease-out focus:outline-none focus-visible:ring-2 focus-visible:ring-accent/40'
        : 'inline-flex items-center rounded-full px-4 py-2 text-sm font-medium text-text-secondary transition duration-150 ease-out hover:bg-white hover:text-text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-accent/40'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
