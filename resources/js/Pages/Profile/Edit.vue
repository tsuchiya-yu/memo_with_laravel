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
    <meta property="og:image" :content="'/img/plus-icon.png'" />
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
