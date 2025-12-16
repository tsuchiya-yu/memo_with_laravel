<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  status: String
});

const form = useForm({
  email: ""
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <GuestLayout style="justify-content: initial;">
    <Head>
      <title>パスワードをお忘れの方|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="all" />
      <meta charset="utf-8" />
      <meta property="og:title" content="パスワードをお忘れの方|メモ共有サービス" />
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

    <div class="mb-4 text-sm text-gray-600">
      <div>パスワードをお忘れですか？</div>新しいパスワードを設定するための手順をメールでお送りします。
      ご登録のメールアドレスを入力してください。
    </div>

    <div v-if="status" class="mb-4 font-medium text-sm block">{{ status }}</div>

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="メールアドレス" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autofocus
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4 flex justify-center">
        <PrimaryButton
          class="inline my-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >再設定メールを送る</PrimaryButton>
      </div>
      <Link
        :href="route('login')"
        class="block text-right underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      >ログインはこちら</Link>
    </form>
  </GuestLayout>
</template>
