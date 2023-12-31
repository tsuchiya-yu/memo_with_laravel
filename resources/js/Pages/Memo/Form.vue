<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import TextAreaInput from "@/Components/TextAreaInput.vue";
import Checkbox from "@/Components/Checkbox.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
  memo: Object,
  encryptId: String
});

const form = useForm({
  title: props.memo.title,
  content: props.memo.content,
  is_public: props.memo.is_public
});

const submit = () => {
  const method = props.memo.id ? form.put : form.post;
  const routeName = props.memo.id ? "memos.update" : "memos.store";
  method.call(form, route(routeName, props.memo.id), {
    onFinish: () => form.reset()
  });
};

const deleteMemo = id => {
  const confirmed = confirm(
    "削除したメモは復元できません。本当によろしいでしょうか？"
  );
  if (confirmed) form.delete(route("memos.destroy", id), {});
};
</script>

<template>
  <AuthenticatedLayout>
    <div class="m-auto mt-8 pb-8 main-area" style="max-width: 1216px;">
      <Head>
        <title>{{props.memo.id ? `「${props.memo.title}」の編集|メモ共有サービス` : 'メモの作成|メモ共有サービス'}}</title>
        <meta
          name="description"
          content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
        />
        <meta name="robots" content="noindex" />
        <meta charset="utf-8" />
        <meta
          property="og:title"
          :content="props.memo.id ? `「${props.memo.title}」の編集|メモ共有サービス` : 'メモの作成|メモ共有サービス'"
        />
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
      <form @submit.prevent="submit">
        <Transition
          enter-from-class="opacity-0"
          leave-to-class="opacity-0"
          class="transition ease-in-out"
        >
          <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">更新しました</p>
        </Transition>
        <InputLabel for="title" value="件名" />
        <TextInput
          id="title"
          type="text"
          class="mt-1 block w-full"
          v-model="form.title"
          required
          autofocus
        />
        <InputError class="mt-2" :message="form.errors.title" />

        <InputLabel for="content" value="内容" class="mt-6" />
        <TextAreaInput
          id="content"
          style="min-height: 200px;"
          class="mt-1 block w-full"
          v-model="form.content"
          required
        />
        <InputError class="mt-2" :message="form.errors.content" />

        <div class="block mt-6">
          <label class="flex items-center">
            <Checkbox name="is_public" v-model:checked="form.is_public" />
            <span class="ml-2 text-sm text-gray-600">全体に公開する</span>
          </label>
        </div>

        <div
          class="text-right mt-2 text-gray-600 text-sm"
          v-if="props.memo.id"
        >最終更新：{{ dayjs(props.memo.updated_at).format('YYYY/MM/DD') }}</div>
        <PrimaryButton
          class="inline my-4 mt-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >{{ props.memo.id ? '更新' : '登録' }}する</PrimaryButton>
        <Link
          v-if="props.encryptId && props.memo.is_public"
          target="_blank"
          :href="route('read.memos.show', props.encryptId)"
          class="mt-3 block text-center text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >公開ページはこちら</Link>
        <p
          v-if="props.memo.id"
          class="mt-3 text-blue-600 cursor-pointer block text-right underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          @click="deleteMemo(props.memo.id)"
        >メモを削除する</p>
      </form>
    </div>
  </AuthenticatedLayout>
</template>

<script>
import dayjs from "dayjs";
</script>>

<style>
@media (max-width: 1215px) {
  .main-area {
    padding: 15px !important;
  }
}
</style>