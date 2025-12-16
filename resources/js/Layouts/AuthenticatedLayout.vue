<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import CommonFooter from "@/Components/CommonFooter.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div class="flex min-h-screen flex-col bg-bg-default text-text-primary">
    <header class="sticky top-0 z-30 border-b border-white/60 bg-white/80 backdrop-blur-xl">
      <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
        <div class="flex items-center gap-8">
          <Link :href="route('dashboard')" class="flex items-center gap-3">
            <ApplicationLogo />
          </Link>
          <nav class="hidden gap-2 md:flex">
            <NavLink
              :href="route('dashboard')"
              :active="route().current('dashboard') && $page.props.is_public != true"
            >自分用のメモ</NavLink>
            <NavLink
              :href="route('dashboard', { is_public: 'true' })"
              :active="route().current('dashboard') && $page.props.is_public == true"
            >公開中のメモ</NavLink>
          </nav>
        </div>
        <div class="hidden items-center gap-4 md:flex">
          <Dropdown align="right" width="48">
            <template #trigger>
              <button
                type="button"
                class="inline-flex items-center gap-2 rounded-full border border-transparent px-4 py-2 text-sm font-medium text-text-secondary transition hover:border-stroke hover:text-text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-accent/40"
              >
                <span>{{ $page.props.auth.user.name }}</span>
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </button>
            </template>
            <template #content>
              <DropdownLink :href="route('profile.edit')">設定</DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button">ログアウト</DropdownLink>
            </template>
          </Dropdown>
        </div>
        <button
          class="inline-flex items-center justify-center rounded-full border border-stroke p-2 text-text-primary md:hidden"
          @click="showingNavigationDropdown = !showingNavigationDropdown"
        >
          <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path
              v-if="!showingNavigationDropdown"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"
            />
            <path
              v-else
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </button>
      </div>
      <div v-show="showingNavigationDropdown" class="border-t border-white/60 bg-white/90 px-6 py-4 md:hidden">
        <div class="flex flex-col gap-2">
          <ResponsiveNavLink
            :href="route('dashboard')"
            :active="route().current('dashboard') && $page.props.is_public != true"
          >自分用のメモ</ResponsiveNavLink>
          <ResponsiveNavLink
            :href="route('dashboard', { is_public: 'true' })"
            :active="route().current('dashboard') && $page.props.is_public == true"
          >公開中のメモ</ResponsiveNavLink>
        </div>
        <div class="mt-4 border-t border-white/60 pt-4">
          <p class="text-sm font-semibold text-text-primary">{{ $page.props.auth.user.name }}</p>
          <p class="text-xs text-text-secondary">{{ $page.props.auth.user.email }}</p>
          <div class="mt-3 flex flex-col gap-2">
            <ResponsiveNavLink :href="route('profile.edit')">設定</ResponsiveNavLink>
            <ResponsiveNavLink :href="route('logout')" method="post" as="button">ログアウト</ResponsiveNavLink>
          </div>
        </div>
      </div>
    </header>

    <header v-if="$slots.header" class="bg-transparent">
      <div class="mx-auto max-w-6xl px-6 py-6">
        <slot name="header" />
      </div>
    </header>

    <main class="flex-1">
      <div class="mx-auto w-full max-w-6xl px-6 py-12">
        <slot />
      </div>
    </main>
    <CommonFooter />
  </div>
</template>
