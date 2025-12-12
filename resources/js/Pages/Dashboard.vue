<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, usePage } from "@inertiajs/vue3";
</script>

<template>
  <AuthenticatedLayout>
    <Head>
      <title>マイページ|メモ共有サービス</title>
      <meta
        name="description"
        content="シンプルで使いやすいメモ共有サービス「MemoShare」。パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有。使い方はイロイロ。無料で始めてみましょう。"
      />
      <meta name="robots" content="noindex" />
      <meta charset="utf-8" />
      <meta property="og:title" content="マイページ|メモ共有サービス" />
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
    <div
      v-if="$page.props.flash.message"
      class="mx-auto mb-8 max-w-4xl rounded-2xl border border-white/60 bg-white/70 px-6 py-4 text-center text-sm text-text-primary shadow-card"
    >{{ $page.props.flash.message }}</div>

    <section class="space-y-6">
      <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
        <div>
          <h1 class="mt-2 text-3xl font-semibold text-text-primary">メモ一覧</h1>
        </div>
      </div>

      <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
        <div
          v-for="memo in memos"
          :key="memo.id"
          class="group relative flex flex-col rounded-3xl border border-white/60 bg-white/90 p-6 shadow-card transition duration-200 hover:-translate-y-1 hover:border-accent/40 hover:shadow-2xl"
        >
          <div class="flex items-center justify-between text-xs font-semibold uppercase tracking-[0.2em] text-text-secondary">
            <span>{{ memo.is_public ? "公開中" : "非公開" }}</span>
            <span class="text-[11px] text-text-secondary/70">{{ dayjs(memo.updated_at).format("YYYY/MM/DD") }}</span>
          </div>
          <h2 class="mt-4 text-xl font-semibold text-text-primary">
            {{ memo.title ? (memo.title.length > 30 ? memo.title.substring(0, 30) + "…" : memo.title) : "タイトル未設定" }}
          </h2>
          <p class="mt-3 flex-1 text-sm leading-relaxed text-text-secondary">
            {{ memo.content ? (memo.content.length > 110 ? memo.content.substring(0, 110) + "…" : memo.content) : "内容はまだ書かれていません。" }}
          </p>
          <div class="mt-6 flex flex-wrap justify-end gap-3">
            <Link
              :href="route('memos.edit', memo.id)"
              class="inline-flex items-center rounded-full border border-stroke px-4 py-2 text-sm font-semibold text-text-primary/80 transition hover:border-text-primary hover:text-text-primary"
            >
              編集する →
            </Link>
            <Link
              v-if="memo.is_public"
              :href="route('read.memos.show', memo.encrypt_id)"
              class="inline-flex items-center rounded-full border border-accent/30 bg-accent/5 px-4 py-2 text-sm font-semibold text-accent transition hover:border-accent hover:bg-accent/10"
            >
              公開ページ
            </Link>
        </div>
        </div>

        <Link
          :href="route('memos.create')"
          class="flex flex-col items-center justify-center rounded-3xl border border-dashed border-stroke bg-white/50 p-6 text-text-secondary transition hover:-translate-y-1 hover:border-accent hover:text-text-primary"
        >
          <div class="mb-3 flex h-16 w-16 items-center justify-center rounded-2xl bg-accent/10 text-3xl text-accent">＋</div>
          <p class="text-lg font-semibold">メモを追加</p>
          <p class="mt-1 text-sm text-text-secondary/80">メモを一つ、新しく残しましょう。</p>
        </Link>
      </div>
    </section>
  </AuthenticatedLayout>
</template>

<script>
import dayjs from "dayjs";

export default {
  props: {
    memos: Array
  }
};
</script>
