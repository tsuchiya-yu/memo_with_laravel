<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    memo: Object,
});

</script>

<template>
    <GuestLayout style='justify-content: initial;'>
        <Head :title="`${props.memo.title}|MemoShare`"/>
        <h1 class='font-bold text-xl'>{{props.memo.title}}</h1>
        <p class='mt-4 text-sm content' style='white-space: pre-line;' v-html="autoLink(props.memo.content)"></p>
        <p class='mt-4 text-sm text-right text-gray-600 '>最終更新：{{ dayjs(props.memo.updated_at).format('YYYY/MM/DD') }}</p>
    </GuestLayout>
</template>

<script>
import dayjs from "dayjs"
import sanitizeHtml from 'sanitize-html'

function autoLink(text) {
    return sanitizeHtml(_.isString(text) ? text.replace(/(https?:\/\/[^\s]*)/g, "<a href='$1' target='_blank' rel='noopener noreferrer'>$1</a>") : '');
}
</script>>

<style>
    @media (max-width:1215px) { 
        .main-area {
            padding: 15px;
        }
     }
     
     .content > a {
        color: #0066cc;
     }
</style>