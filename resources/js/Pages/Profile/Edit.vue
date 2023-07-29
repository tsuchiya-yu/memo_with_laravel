<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
  mustVerifyEmail: Boolean,
  status: String
});
</script>

<template>
  <Head>
    <title>設定|メモ共有サービス</title>
    <meta
      name="description"
      content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
    />
    <meta name="robots" content="noindex" />
    <meta charset="utf-8" />
    <meta property="og:title" content="設定|メモ共有サービス" />
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

  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class
          />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <UpdatePasswordForm class />
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
          <DeleteUserForm class />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
