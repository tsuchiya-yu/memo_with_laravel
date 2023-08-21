<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";
import { ref } from "vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const showContactModal = ref(false);

const openContactModal = () => {
  showContactModal.value = true;
};

const closeContactModal = () => {
  showContactModal.value = false;
};

const showPrivacyModal = ref(false);
const openPrivacyModal = () => {
  showPrivacyModal.value = true;
};

const closePrivacyModal = () => {
  showPrivacyModal.value = false;
};
</script>

<template>
  <div class="common-foolter py-4 bg-gray-100">
    <div
      @click="openPrivacyModal"
      class="block text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      style="cursor: pointer;"
    >プライバシーポリシー</div>
    <div
      @click="openContactModal"
      class="block text-center underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
      style="cursor: pointer;"
    >お問い合わせ</div>

    <Modal :show="showContactModal" @close="closeContactModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">お問い合わせについて</h2>
        <div class="mt-1 text-sm text-gray-600">
          <a
            href="mailto:memoshare.suupport@catnote.tokyo"
            class="text-link-blue"
          >memoshare.suupport@catnote.tokyo</a>宛にメールをお送りください。
          <br />お問い合わせの内容によっては返事に時間がかかる場合や返事ができかねる場合がございますのでご了承ください。
        </div>
        <div class="text-center mt-5">
          <!-- A8広告 -->
          <a href="https://px.a8.net/svt/ejp?a8mat=3TFAX8+ERO3ZM+5244+5ZEMP" rel="nofollow">
            <img
              border="0"
              width="120"
              height="60"
              alt
              src="https://www22.a8.net/svt/bgt?aid=230821388893&wid=001&eno=01&mid=s00000023602001005000&mc=1"
              style="text-align: center; display: inline-block; margin-bottom: 20px;"
            />
          </a>
          <img
            border="0"
            width="1"
            height="1"
            src="https://www12.a8.net/0.gif?a8mat=3TFAX8+ERO3ZM+5244+5ZEMP"
            alt
          />
          <SecondaryButton @click="closeContactModal">閉じる</SecondaryButton>
        </div>
      </div>
    </Modal>

    <Modal :show="showPrivacyModal" @close="closePrivacyModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900">MemoShareプライバシーポリシー</h2>
        <div class="mt-1 text-sm text-gray-600">
          MemoShare(以下「当サービス」)のプライバシーポリシー・免責事項を次の通り記載します。
          <div class="privacy-title">個人情報の利用目的について</div>
          <div>当サービスでは、サービス利用の際にメールアドレス等の個人情報を入力いただく場合があります。取得した個人情報は、サービスの利用、及び、必要な連絡のみに利用させていただくもので、これらの目的以外では利用いたしません。</div>

          <div class="privacy-title">個人情報の第三者開示について</div>
          <div>
            取得した個人情報は適切に管理し、以下に該当する場合を除いて第三者に開示することはありません。
            <br />・本人の同意が得られた場合
            <br />・法令により開示が求められた場合
          </div>

          <div class="privacy-title">Cookieの使用について</div>
          <div>
            当サービスでは、広告配信やアクセス解析のためにCookieを使用しています
            Cookieによりブラウザを識別していますが、特定の個人の識別はできない状態で匿名性が保たれています。
            Cookieの使用を望まない場合、ブラウザからCookieを無効に設定できます。
          </div>

          <div class="privacy-title">広告配信サービスについて</div>
          <div>
            当サービスでは、第三者配信の広告サービスを利用して広告を掲載しています。
            第三者配信事業者は、ユーザーの興味に応じたパーソナライズ広告を表示するためにCookieを使用しています。
          </div>

          <div class="privacy-title">アクセス解析ツールについて</div>
          <div>
            当サービスでは、Googleアナリティクスによりアクセス情報を解析しています。
            アクセス情報の解析にはCookieを使用しています。また、アクセス情報の収集はCookieを無効にすることで拒否できます。
            Google社のデータ収集・処理の仕組みについては、
            <a
              href="http://www.google.com/intl/ja/policies/privacy/partners/"
              class="text-link-blue"
              target="_blank"
            >こちら</a>をご覧ください。
          </div>

          <div class="privacy-title">免責事項</div>
          <div>
            当サービスは、掲載内容によって生じた損害に対する一切の責任を負いません。
            各コンテンツでは、できる限り正確な情報提供を心がけておりますが、正確性や安全性を保証するものではありません。
            また、リンク先の他サイトで提供される情報・サービスについても、責任を負いかねますのでご了承ください。
          </div>

          <div class="privacy-title">著作権</div>
          <div>
            当サービスに掲載されている文章・画像の著作権は、運営者に帰属しています。
            法的に認められている引用の範囲を超えて、無断で転載することを禁止します。
          </div>

          <div class="privacy-title">リンク</div>
          <div>
            当サービスは原則リンクフリーです。リンクを行う場合の許可や連絡は不要です。引用する際は、引用元の明記と該当ページへのリンクをお願いします。
            ただし、画像ファイルへの直リンク、インラインフレームを使用したHTMLページ内で表示する形でのリンクはご遠慮ください。
          </div>

          <div class="privacy-title">プライバシーポリシーの変更</div>
          <div>
            当サービスは、個人情報に関して適用される日本の法令を遵守するとともに、本プライバシーポリシーの内容を適宜見直して改善に努めます。
            修正された最新のプライバシーポリシーは常に本ページにて開示されます。また、サービスの利用を以ってプライパシーポリシーに同意したものとみなします。
          </div>

          <div class="privacy-title"></div>
          <div>制定日：2023年08月12日</div>
          <div>最終改定日：2023年08月12日</div>

          <div class="privacy-title"></div>
          <div>
            当サービスに関するお問い合わせにつきましては
            <a
              href="mailto:memoshare.suupport@catnote.tokyo"
              class="text-link-blue"
            >memoshare.suupport@catnote.tokyo</a>宛にメールをお送りください。お問い合わせの内容によっては返事に時間がかかる場合や返事ができかねる場合がございますのでご了承ください。
          </div>
          <div class="privacy-title"></div>
          <div>
            <br />サイトURL：
            <a
              href="https://memoshare.catnote.tokyo/"
              class="text-link-blue"
              target="_blank"
            >https://memoshare.catnote.tokyo/</a>
          </div>
        </div>
        <div class="text-center mt-5">
          <!-- A8広告 -->
          <a href="https://px.a8.net/svt/ejp?a8mat=3TFAX8+ERO3ZM+5244+5ZEMP" rel="nofollow">
            <img
              border="0"
              width="120"
              height="60"
              alt
              src="https://www22.a8.net/svt/bgt?aid=230821388893&wid=001&eno=01&mid=s00000023602001005000&mc=1"
              style="text-align: center; display: inline-block; margin-bottom: 20px;"
            />
          </a>
          <img
            border="0"
            width="1"
            height="1"
            src="https://www12.a8.net/0.gif?a8mat=3TFAX8+ERO3ZM+5244+5ZEMP"
            alt
          />
          <SecondaryButton @click="closePrivacyModal">閉じる</SecondaryButton>
        </div>
      </div>
    </Modal>
  </div>
</template>


<style>
.common-foolter {
  display: flex;
  justify-content: center;
  gap: 20px;
}
.privacy-title {
  font-weight: bold;
  margin: 30px 0 20px;
}
</style>