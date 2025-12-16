<script setup>
import { computed } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  status: String
});

const form = useForm({});

const submit = () => {
  form.post(route("verification.send"));
};

const verificationLinkSent = computed(
  () => props.status === "verification-link-sent"
);
</script>

<template>
  <GuestLayout style="justify-content: initial;">
    <Head>
      <title>メールアドレスの認証をしてください|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="all" />
      <meta charset="utf-8" />
      <meta property="og:title" content="メールアドレスの認証をしてください|メモ共有サービス" />
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

    <div class="text-center w-full h-70 p-6 mb-4">
      <h1 class="font-bold text-xl m-2">MemoShare</h1>
      <p class="text-sm">メールアドレスの認証が済んでいません。</p>
      <p class="text-sm">認証を行ってください。</p>
    </div>

    <div class="my-4 font-medium block text-center mb-12" v-if="verificationLinkSent">新しくメールを送りました</div>

    <form @submit.prevent="submit">
      <div style="margin-top: -30px; text-align: center;">
        <PrimaryButton
          class="inline my-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >メールを再送する</PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
