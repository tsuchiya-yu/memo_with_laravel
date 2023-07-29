<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String
});
</script>

<template>
  <GuestLayout style="justify-content: initial;">
    <div
      v-if="$page.props.flash.message"
      class="bg-thin-gray px-6 py-4"
    >{{ $page.props.flash.message }}</div>
    <Head>
      <title>トップページ|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="all" />
      <meta charset="utf-8" />
      <meta property="og:title" content="トップページ|メモ共有サービス" />
      <meta
        property="og:description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="https://memo-with-laravel.fly.dev" />
      <meta property="og:image" content="https://previews.dropbox.com/p/thumb/AB9Zy6_8cuB2fuoxyRtv1MxDKki-qIf8I8AOZ-fUPTbBOMtZny0LyT-9IiHSm7CZroJQlWB2AatgbouTMDBLuw4QCiskVXNi8fnyIVN8pDjcsLs4_XEUp61OM_rYvj5zvBqwy8OJ0fWPXeQrdcv4qmyqyDvSh4j1aw7InxAdEKy8wpiT2BLVzVZNMVTdmYug4o_6V8vP0sN-9Iji9n7FYb3H_ua1Cr49TMbEAUnEE4mjivd9rx_NC1Gdh2UZ_oaA2qcZYS3DRqHLQgVtFZ1NubB5lWr7TBexbNye4mpiPGNBCbF88sMO8OeEuBQnGJrlrNoCogHe90jLZCOkUkt0V3vL/p.png" />
      <meta property="og:site_name" content="MemoShare" />
      <meta property="og:locale" content="ja_JP" />
    </Head>
    <div style="display: flex;justify-content: center;align-items: center;">
      <div>
        <div class="text-center w-full rounded-b-2xl p-6 pb-0">
          <h1 class="font-bold text-xl m-2">MemoShare</h1>
          <p class="text-sm">パソコンで書いたメモをスマホで確認</p>
          <p class="text-sm">自分で書いたメモを他の人と共有</p>
          <img :src="'/img/top_img.png'" alt="start MemoShare" class="w-32 h-32 inline-block mt-4" />
        </div>
        <div>
          <Link
            :href="route('register')"
            class="block text-right text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            <PrimaryButton class="inline my-4">会員登録はこちら</PrimaryButton>
          </Link>
          <Link
            :href="route('login')"
            class="block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >ログインはこちら</Link>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style>
.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>
