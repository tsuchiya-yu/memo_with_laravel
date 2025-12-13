<script setup>
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";

const showContactModal = ref(false);
const showPrivacyModal = ref(false);
const currentYear = new Date().getFullYear();
</script>

<template>
  <footer class="border-t border-white/40 bg-transparent">
    <div class="mx-auto flex max-w-6xl flex-col items-center gap-4 px-6 py-10 text-sm text-text-secondary">
      <div class="flex flex-wrap items-center justify-center gap-3">
        <button
          type="button"
          class="rounded-full border border-transparent px-4 py-2 text-sm text-text-secondary transition hover:border-stroke hover:text-text-primary"
          @click="showPrivacyModal = true"
        >
          プライバシーポリシー
        </button>
        <button
          type="button"
          class="rounded-full border border-transparent px-4 py-2 text-sm text-text-secondary transition hover:border-stroke hover:text-text-primary"
          @click="showContactModal = true"
        >
          お問い合わせ
        </button>
      </div>
      <p class="text-center">© {{ currentYear }} MemoShare</p>
    </div>

    <Modal :show="showContactModal" @close="showContactModal = false">
      <div class="p-8">
        <h2 class="text-lg font-semibold text-text-primary">お問い合わせ</h2>
        <p class="mt-2 text-sm text-text-secondary">
          ご不明点は
          <a href="mailto:memoshare.suupport@catnote.tokyo" class="underline">
            memoshare.suupport@catnote.tokyo
          </a>
          までメールでご連絡ください。内容によっては回答までにお時間をいただく場合があります。
        </p>
        <div class="mt-8 text-center">
          <SecondaryButton @click="showContactModal = false">閉じる</SecondaryButton>
        </div>
      </div>
    </Modal>

    <Modal :show="showPrivacyModal" @close="showPrivacyModal = false">
      <div class="p-8">
        <h2 class="text-lg font-semibold text-text-primary">プライバシーポリシー</h2>
        <div class="mt-4 space-y-4 text-sm text-text-secondary">
          <p>当サービスでは、メールアドレスなどの個人情報を会員登録・連絡の目的でのみ取得・利用します。</p>
          <p>ユーザーの同意または法令に基づく場合を除き、第三者への個人情報提供は行いません。</p>
          <p>広告・解析のために Cookie を使用しています。ブラウザ設定で Cookie を無効化することも可能です。</p>
          <p>掲載内容により損害が発生した場合でも当サービスは責任を負いません。リンク先の外部サイトについても同様です。</p>
          <p>プライバシーポリシーは適宜見直しを行い、最新の内容を当ページで公開します。</p>
        </div>
        <div class="mt-8 text-center">
          <SecondaryButton @click="showPrivacyModal = false">閉じる</SecondaryButton>
        </div>
      </div>
    </Modal>
  </footer>
</template>
