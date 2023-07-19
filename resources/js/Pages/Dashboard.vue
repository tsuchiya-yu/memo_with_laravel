<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />
        <div class="p-12 flex gap-5 flex-wrap justify-center">
            <div v-for="memo in memos" :key="memo.id">
                <div class='memo-box bg-secondry-red w-72 h-48 max-w-xs rounded-2xl p-4 m-2 relative'>
                    <h2 class='text-lg font-bold'>{{ memo.title }}</h2>
                    <p class='whitespace-pre'>{{ memo.content ? memo.content.substring(0, 30) : '' }}</p>
                    <p class='text-right text-sm text-gray-100 bottom-4 right-4 absolute'>{{ dayjs(memo.updated_at).format('YYYY/MM/DD') }} 更新</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import dayjs from "dayjs"

export default {
  props: {
    memos: Array,
  },
}
</script>

<style>

.memo-box:hover {
    cursor: pointer;
    background: #CB191B;
    color: white;
    border-radius: 20px;
}
</style>