<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import ServiceAuthHeader from "@/Components/ServiceAuthHeader.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  terms: false
});

const submit = () => {
  form.post(route("register"), {
    onFinish: () => form.reset("password", "password_confirmation")
  });
};
</script>

<template>
  <GuestLayout>
    <Head>
      <title>会員登録|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="all" />
      <meta charset="utf-8" />
      <meta property="og:title" content="会員登録|メモ共有サービス" />
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
    <serviceAuthHeader />

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="name" value="ニックネーム" />

        <TextInput
          id="name"
          type="text"
          class="mt-1 block w-full bg-gray-100"
          v-model="form.name"
          required
          autofocus
          autocomplete="name"
        />

        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <div class="mt-4">
        <InputLabel for="email" value="メールアドレス" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full bg-gray-100"
          v-model="form.email"
          required
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="パスワード" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full bg-gray-100"
          v-model="form.password"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="パスワード(確認)" />

        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full bg-gray-100"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div class="mt-4">
        <PrimaryButton
          class="inline my-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >登録する</PrimaryButton>
        <Link
          :href="route('login')"
          class="block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >ログインはこちら</Link>
      </div>
    </form>
  </GuestLayout>
</template>