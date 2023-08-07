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
  <div>
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
      <meta
        property="og:image"
        content="https://previews.dropbox.com/p/thumb/AB9Zy6_8cuB2fuoxyRtv1MxDKki-qIf8I8AOZ-fUPTbBOMtZny0LyT-9IiHSm7CZroJQlWB2AatgbouTMDBLuw4QCiskVXNi8fnyIVN8pDjcsLs4_XEUp61OM_rYvj5zvBqwy8OJ0fWPXeQrdcv4qmyqyDvSh4j1aw7InxAdEKy8wpiT2BLVzVZNMVTdmYug4o_6V8vP0sN-9Iji9n7FYb3H_ua1Cr49TMbEAUnEE4mjivd9rx_NC1Gdh2UZ_oaA2qcZYS3DRqHLQgVtFZ1NubB5lWr7TBexbNye4mpiPGNBCbF88sMO8OeEuBQnGJrlrNoCogHe90jLZCOkUkt0V3vL/p.png"
      />
      <meta property="og:site_name" content="MemoShare" />
      <meta property="og:locale" content="ja_JP" />
    </Head>

    <div class="container">
      <div class="box-top flex mx-10">
        <div class="box-left w-5/12">
          <h2 class="text-2xl">メモ共有サービス</h2>
          <h1 class="text-5xl my-3 font-bold">MemoShare</h1>
          <p>パソコンで書いたメモをスマホで確認、自分で書いたメモを他の人と共有</p>
          <Link :href="route('register')">
            <PrimaryButton class="inline my-6 primary-button" style="width: 250px;">今すぐ始める</PrimaryButton>
          </Link>
        </div>
        <div class="box-right w-7/12">
          <img :src="'/img/memo-ill.png'" class="top-img w-full" alt="start MemoShare" />
        </div>
      </div>
      <div class="sec-use-case py-14 bg-secondry-red w-screen">
        <h3 class="text-center text-3xl pb-16 font-bold use-case-lbl">こんな場面で</h3>
        <div class="box-use-cases flex">
          <div class="box-use-case text-center">
            <h3 class="text-5xl">１</h3>
            <h4 class="text-xl my-2 font-bold">買い物の時に</h4>
            <div>レシピを眺めながら必要な材料をメモ。</div>
            <div>メモを見ながらスーパーで材料を買えば</div>
            <div>必要なものを漏れなく買えます。</div>
          </div>
          <div class="box-use-case text-center">
            <h3 class="text-5xl">２</h3>
            <h4 class="text-xl my-2 font-bold">旅行の計画を共有する時に</h4>
            <div>SNSやメールで計画を共有すると</div>
            <div>変更になる度に仲間へ連絡が必要です。</div>
            <div>MemoShareなら1度URLを共有するだけで</div>
            <div>修正の度に連絡する必要がなくなります。</div>
          </div>
          <div class="box-use-case text-center">
            <h3 class="text-5xl">３</h3>
            <h4 class="text-xl my-2 font-bold">外出先でメモを確認する時に</h4>
            <div>オフィスではPCで必要な情報をメモ。</div>
            <div>外出先ではスマホからメモをチェック。</div>
            <div>PCとスマホのメモ共有の新たな手段。</div>
          </div>
        </div>
      </div>

      <div class="sec-use-case py-14 w-screen">
        <h3 class="text-center text-3xl pb-8 font-bold use-case-lbl">使い方</h3>
        <div class="box-how-to-uses flex mx-10">
          <div class="box-how-to-use text-center flex">
            <img
              :src="'/img/mail_icon.png'"
              style="width: 100px;"
              class="box-how-to-use-img"
              alt="start MemoShare"
            />
            <div class="box-how-to-use-right text-left p-4">
              <p>まずは会員登録</p>
              <p>わずか1分で簡単に登録！</p>
              <p>
                登録は
                <Link :href="route('register')" class="text-link-blue">こちら</Link>&nbsp;&nbsp;から
              </p>
            </div>
          </div>
          <div class="box-how-to-use text-center flex">
            <img
              :src="'/img/icon_memo.png'"
              style="width: 100px;"
              class="box-how-to-use-img"
              alt="start MemoShare"
            />
            <div class="box-how-to-use-right text-left p-4">
              <p>次にメモの作成</p>
              <p>共有したいことを書いて保存</p>
              <p>自分だけのメモも書ける</p>
            </div>
          </div>
          <div class="box-how-to-use text-center flex">
            <img
              :src="'/img/share_icon.png'"
              style="width: 85px; object-fit: contain;"
              class="box-how-to-use-img"
              alt="start MemoShare"
            />
            <div class="box-how-to-use-right text-left p-4">
              <p>最後にURLの共有</p>
              <p>メモページのURLを共有しましょう</p>
              <p>自分のスマホや他の人にも共有できる</p>
            </div>
          </div>
        </div>
        <div class="w-full text-center pt-14 box-btns">
          <Link :href="route('register')">
            <PrimaryButton class="inline my-6 primary-button" style="width: 400px;">今すぐ始める</PrimaryButton>
          </Link>
        </div>
      </div>

      <div class="sec-announce mx-6">
        <div class="font-bold">免責事項</div>
        <p>当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますので、その旨ご了承いただき、自己責任でのご利用をお願いいたします。</p>
      </div>
    </div>
  </div>
</template>

<style>
.box-top {
  width: calc(100vw - 80px);
}

.box-left {
  margin: 140px auto;
}

.top-img {
  height: 600px;
  object-fit: cover;
  object-position: top;
  margin: 0 auto;
}

.box-use-cases {
  gap: 40px;
  justify-content: center;
}

.box-how-to-uses {
  gap: 40px;
  justify-content: center;
}

@media (max-width: 639px) {
  .box-top {
    display: inline-block !important;
    width: 100% !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
    padding: 0 10pxv;
  }

  .box-left {
    margin: initial !important;
    margin-top: 40px !important;
    width: 100% !important;
    padding: 0 14px !important;
  }

  .primary-button {
    width: 100% !important;
  }

  .use-case-lbl {
    padding: 0 !important;
  }

  .box-right {
    width: 100% !important;
  }

  .top-img {
    height: 350px !important;
  }

  .box-use-cases {
    display: block !important;
  }

  .box-use-case {
    margin: 40px 0 !important;
  }

  .sec-use-case {
    display: inline-block !important;
    padding: 40px 0 20px 0 !important;
  }

  .box-how-to-uses {
    display: inline-block !important;
    text-align: center !important;
    margin-top: 20px !important;
  }

  .box-how-to-use {
    display: inline-block !important;
    margin: 20px 0 !important;
  }

  .box-how-to-use-right {
    padding: initial !important;
    text-align: center !important;
  }

  .box-how-to-use-img {
    width: 50% !important;
    margin: 0 auto !important;
  }

  .box-btns {
    padding-top: 0;
    padding: 0 14px !important;
  }
}
</style>
