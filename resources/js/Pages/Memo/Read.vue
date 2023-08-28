<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Modal from "@/Components/Modal.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import dayjs from "dayjs";
import sanitizeHtml from "sanitize-html";
import VueQrcode from "@chenfengyuan/vue-qrcode";

const dispModal = ref(false);

const props = defineProps({
  memo: Object,
  is_owner: Boolean
});

function autoLink(text) {
  return sanitizeHtml(
    _.isString(text)
      ? text.replace(
          /(https?:\/\/[^\s]*)/g,
          "<a href='$1' target='_blank' rel='noopener noreferrer'>$1</a>"
        )
      : ""
  );
}

function copyUrlToClipboard() {
  return navigator.clipboard.writeText(window.location.href).then(function() {
    alert("URLをコピーしました。");
  });
}

function switchDispModal() {
  dispModal.value = !dispModal.value;
}

function location() {
  return window.location.href;
}
</script>

<template>
  <div class="read-container min-h-screen bg-gray-100">
    <div class="pt-6 text-sm sm:pt-0 flex flex-col sm:justify-center items-center sp-pad">
      <div class="pt-6 w-full sm:max-w-md overflow-hidden sm:rounded-lg text-right sp-pad">
        <div
          class="bg-white cursor-pointer overflow-hidden sm:rounded-lg inline-block text-center p-1 rounded-xl"
          style="width: 140px;"
          @click="copyUrlToClipboard()"
        >このページのURLをコピーする</div>
        <div
          class="bg-white cursor-pointer overflow-hidden sm:rounded-lg inline-block text-center p-1 ml-2 rounded-xl"
          style="width: 140px;"
          @click="switchDispModal()"
        >URLをQRコードで表示する</div>
      </div>
    </div>

    <GuestLayout style="justify-content: initial; min-height: auto;" class="sp-pad sp-mt">
      <Head>
        <title>{{`${props.memo.title}|メモ共有サービス`}}</title>
        <meta
          name="description"
          content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
        />
        <meta name="robots" content="noindex" />
        <meta charset="utf-8" />
        <meta property="og:title" :content="`${props.memo.title}|メモ共有サービス`" />
        <meta
          property="og:description"
          content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
        />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://memo-with-laravel.fly.dev" />
        <meta
          property="og:image"
          content="https://previews.dropbox.com/p/thumb/AB9Zy6_8cuB2fuoxyRtv1MxDKki-qIf8I8AOZ-fUPTbBOMtZny0LyT-9IiHSm7CZroJQlWB2AatgbouTMDBLuw4QCiskVXNi8fnyIVN8pDjcsLs4_XEUp61OM_rYvj5zvBqwy8OJ0fWPXeQrdcv4qmyqyDvSh4j1aw7InxAdEKy8wpiT2BLVzVZNMVTdmYug4o_6V8vP0sN-9Iji9n7FYb3H_ua1Cr49TMbEAUnEE4mjivd9rx_NC1Gdh2UZ_oaA2qcZYS3DRqHLQgVtFZ1NubB5lWr7TBexbNye4mpiPGNBCbF88sMO8OeEuBQnGJrlrNoCogHe90jLZCOkUkt0V3vL/p.png"
        />
        <meta property="og:site_name" content="MemoShare" />
        <meta property="og:locale" content="ja_JP" />
      </Head>
      <h1 class="font-bold text-xl">{{props.memo.title}}</h1>
      <p
        class="mt-4 text-sm content"
        style="white-space: pre-line;"
        v-html="autoLink(props.memo.content)"
      ></p>
      <p
        class="mt-4 text-sm text-right text-gray-600"
      >最終更新：{{ dayjs(props.memo.updated_at).format('YYYY/MM/DD') }}</p>

      <div class="sm:pt-0 flex flex-col sm:justify-center items-center">
        <div class="py-5 w-full sm:max-w-md overflow-hidden sm:rounded-lg text-right">
          <Link
            v-if="is_owner"
            :href="route('memos.edit', props.memo.id)"
            class="block cursor-pointer text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >メモを編集する</Link>
          <Link
            :href="route('dashboard')"
            class="mt-3 block cursor-pointer text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >マイページを開く</Link>
        </div>
      </div>
    </GuestLayout>

    <div class="text-center mt-5">
      <!-- A8広告 -->
      <a href="https://px.a8.net/svt/ejp?a8mat=3TFAX9+5K1O1E+2P80+626XT" rel="nofollow">
        <img
          border="0"
          width="234"
          height="60"
          alt
          src="https://www22.a8.net/svt/bgt?aid=230821389336&wid=001&eno=01&mid=s00000012600001018000&mc=1"
          style="text-align: center; display: inline-block; margin-bottom: 20px;"
        />
      </a>
      <img
        border="0"
        width="1"
        height="1"
        src="https://www14.a8.net/0.gif?a8mat=3TFAX9+5K1O1E+2P80+626XT"
        alt
      />
    </div>

    <Modal :show="dispModal" @close="switchDispModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">QRコードを発行しました</h2>

        <p class="mt-1 text-sm text-gray-600">
          読み取るとこのページにアクセスします。
          <br />ページを共有したい人に読み取ってもらうか、QRコードの画像をLINEなどで送ってください。
        </p>

        <div class="text-center">
          <vue-qrcode
            :value="location()"
            :options="{ width: 300 }"
            style="display: inline-block; margin: 20px 0;"
          ></vue-qrcode>
        </div>

        <div class="text-center">
          <SecondaryButton @click="switchDispModal" class="cursor-pointer">閉じる</SecondaryButton>
        </div>
      </div>
    </Modal>
  </div>
</template>

<style>
.content > a {
  color: #0066cc;
  word-wrap: break-word;
}

@media (max-width: 1215px) {
  .main-area {
    padding: 15px !important;
  }
}

@media (max-width: 639px) {
  .read-container {
    padding: 10px !important;
  }

  .sp-pad {
    padding-top: 0 !important;
  }

  .sp-mt {
    margin-top: -15px !important;
  }
}
</style>