<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import CommonFooter from "@/Components/CommonFooter.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
  <div class="flex min-h-screen flex-col bg-bg-default text-text-primary">
    <header class="sticky top-0 z-30 border-b border-white/60 bg-white/70 backdrop-blur-xl">
      <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
        <Link :href="route('welcome')" class="inline-flex items-center gap-3">
          <ApplicationLogo />
        </Link>
        <div class="flex items-center gap-3 text-sm font-medium">
          <Link :href="route('login')" class="rounded-full px-4 py-2 text-text-secondary hover:text-text-primary">ログイン</Link>
          <Link
            :href="route('register')"
            class="rounded-full bg-text-primary px-4 py-2 text-white transition hover:bg-accent"
          >無料で始める</Link>
        </div>
      </div>
    </header>

    <main class="flex-1">
      <div class="mx-auto w-full max-w-3xl px-6 py-16">
        <div class="rounded-3xl bg-bg-surface p-8 shadow-card">
          <slot />
        </div>
      </div>
    </main>

    <CommonFooter />
  </div>
</template>
