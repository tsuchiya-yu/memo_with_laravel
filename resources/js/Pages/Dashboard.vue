<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">自分用のメモ</h2>
        </template>

        <div class="py-12">
            <div v-for="memo in memos" :key="memos.id">
                <h2>{{ memo.title }}</h2>
                <p>{{ memo.content }}</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script>
export default {
  props: {
    memos: Array,
  },
}
</script>