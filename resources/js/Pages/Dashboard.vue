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
      <meta property="og:image" content="https://previews.dropbox.com/p/thumb/AB9Zy6_8cuB2fuoxyRtv1MxDKki-qIf8I8AOZ-fUPTbBOMtZny0LyT-9IiHSm7CZroJQlWB2AatgbouTMDBLuw4QCiskVXNi8fnyIVN8pDjcsLs4_XEUp61OM_rYvj5zvBqwy8OJ0fWPXeQrdcv4qmyqyDvSh4j1aw7InxAdEKy8wpiT2BLVzVZNMVTdmYug4o_6V8vP0sN-9Iji9n7FYb3H_ua1Cr49TMbEAUnEE4mjivd9rx_NC1Gdh2UZ_oaA2qcZYS3DRqHLQgVtFZ1NubB5lWr7TBexbNye4mpiPGNBCbF88sMO8OeEuBQnGJrlrNoCogHe90jLZCOkUkt0V3vL/p.png" />
      <meta property="og:site_name" content="MemoShare" />
      <meta property="og:locale" content="ja_JP" />
    </Head>
    <div
      v-if="$page.props.flash.message"
      class="bg-thin-gray px-28 py-4"
    >{{ $page.props.flash.message }}</div>
    <div class="memo-box-wrap p-12 flex gap-5 flex-wrap justify-center">
      <div v-for="memo in memos" :key="memo.id">
        <Link :href="route('memos.edit', memo.id)">
          <div class="memo-box bg-secondry-red w-72 h-48 max-w-xs rounded-2xl p-4 m-2 relative">
            <h2
              class="text-lg font-bold"
            >{{ memo.title ? (memo.title.length > 13 ? memo.title.substring(0, 13) + '...' : memo.title) : '' }}</h2>
            <p>{{ memo.content ? (memo.content.length > 30 ? memo.content.substring(0, 30) + '...' : memo.content) : '' }}</p>
            <p
              class="text-right text-sm text-gray-100 bottom-4 right-4 absolute"
            >{{ dayjs(memo.updated_at).format('YYYY/MM/DD') }} 更新</p>
          </div>
        </Link>
      </div>
      <Link :href="route('memos.create')">
        <div
          class="memo-box bg-secondry-red w-72 h-48 max-w-xs rounded-2xl p-4 m-2 relative"
          style="  display: flex;justify-content: center;align-items: center;"
        >
          <img
            :src="'/img/plus-icon.png'"
            alt="register MemoShare"
            class="add-memo"
            style="max-width: 100px; max-height: 100px;"
          />
        </div>
      </Link>
    </div>
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

<style>
.memo-box {
  min-height: 210px;
}

.memo-box:hover {
  cursor: pointer;
  background: #cb191b;
  color: white;
  border-radius: 20px;
}

@media (max-width: 1047px) {
  .memo-box {
    max-width: 200px;
  }
}

@media (max-width: 547px) {
  .memo-box-wrap {
    padding: 1rem 0;
    gap: 0;
  }

  .memo-box {
    max-width: 170px;
  }
}

.add-memo:hover {
  filter: invert(88%) sepia(61%) saturate(0%) hue-rotate(229deg)
    brightness(107%) contrast(101%);
}
</style>