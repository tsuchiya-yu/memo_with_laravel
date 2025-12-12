<script setup>
defineProps({
  type: {
    type: String,
    default: "submit"
  }
});
</script>

<template>
  <button
    :type="type"
    class="inline-flex items-center justify-center gap-2 rounded-full border border-transparent bg-accent px-6 py-3 text-base font-semibold text-white shadow-inner transition duration-200 ease-out hover:bg-[#ff767a] focus:outline-none focus:ring-2 focus:ring-accent/40 focus:ring-offset-2 focus:ring-offset-bg-default disabled:cursor-not-allowed disabled:opacity-60"
  >
    <slot />
  </button>
</template>
