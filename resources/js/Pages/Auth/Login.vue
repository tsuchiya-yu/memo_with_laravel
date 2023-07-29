<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  canResetPassword: Boolean,
  status: String
});

const form = useForm({
  email: "",
  password: "",
  remember: false
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password")
  });
};
</script>

<template>
  <GuestLayout style="justify-content: initial;">
    <Head>
      <title>ログイン|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="all" />
      <meta charset="utf-8" />
      <meta property="og:title" content="ログイン|メモ共有サービス" />
      <meta
        property="og:description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="https://memo-with-laravel.fly.dev" />
      <meta property="og:image" content="https://memo-with-laravel.fly.dev/img/og.png" />
      <meta property="og:site_name" content="MemoShare" />
      <meta property="og:locale" content="ja_JP" />
    </Head>

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">{{ status }}</div>

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

      <div class="mt-4">
        <InputLabel for="password" value="パスワード" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="current-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="block mt-4">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember" />
          <span class="ml-2 text-sm text-gray-600">ログインを記憶する</span>
        </label>
      </div>

      <div class="mt-4">
        <PrimaryButton
          class="inline my-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >ログインする</PrimaryButton>
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >パスワードを忘れた方はこちら</Link>
        <Link
          :href="route('register')"
          class="mt-3 block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >会員登録はこちら</Link>
      </div>
    </form>
  </GuestLayout>
</template>
