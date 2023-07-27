<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Modal from '@/Components/Modal.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import dayjs from "dayjs";
import sanitizeHtml from 'sanitize-html';
import VueQrcode from '@chenfengyuan/vue-qrcode';

const dispModal = ref(false);

const props = defineProps({
    memo: Object,
});

function autoLink(text) {
    return sanitizeHtml(_.isString(text) ? text.replace(/(https?:\/\/[^\s]*)/g, "<a href='$1' target='_blank' rel='noopener noreferrer'>$1</a>") : '');
}

function copyUrlToClipboard() {
    return navigator.clipboard.writeText(window.location.href).then(function () { alert('URLをコピーしました。') })
}

function switchDispModal() {
    dispModal.value = !dispModal.value;
}

function location() {
    return window.location.href;
}
</script>

<template>
    <div class='pt-6 sm:pt-0 bg-gray-100 flex flex-col sm:justify-center items-center'>
        <div class='pt-6 w-full bg-gray-100 sm:max-w-md overflow-hidden sm:rounded-lg text-right'>
            <div class='bg-white cursor-pointer overflow-hidden sm:rounded-lg inline-block text-center p-1' style='width: 140px;' @click="copyUrlToClipboard()">このページのURLをコピーする</div>
            <div class='bg-white cursor-pointer overflow-hidden sm:rounded-lg inline-block text-center p-1 ml-2' style='width: 140px;' @click="switchDispModal()">URLをQRコードで表示する</div>
        </div>
    </div>
    <GuestLayout style='justify-content: initial;'>
        <Head :title="`${props.memo.title}|MemoShare`"/>
        <h1 class='font-bold text-xl'>{{props.memo.title}}</h1>
        <p class='mt-4 text-sm content' style='white-space: pre-line;' v-html="autoLink(props.memo.content)"></p>
        <p class='mt-4 text-sm text-right text-gray-600 '>最終更新：{{ dayjs(props.memo.updated_at).format('YYYY/MM/DD') }}</p>
    </GuestLayout>
    <Modal :show="dispModal" @close="switchDispModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                QRコードを発行しました
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                読み取るとこのページにアクセスします。<br>
                ページを共有したい人に読み取ってもらうか、QRコードの画像をLINEなどで送ってください。
            </p>


            <div class="text-center">
                <vue-qrcode :value="location()" :options="{ width: 300 }" style='display: inline-block; margin: 20px 0;'></vue-qrcode>
            </div>

            <div class="text-center">
                <SecondaryButton @click="switchDispModal" class='cursor-pointer'> 閉じる </SecondaryButton>
            </div>
        </div>
    </Modal>
</template>

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