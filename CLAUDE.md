# MemoShare (memo_with_laravel)

## 記載ルール
- このリポジトリに関するドキュメント、Issue、Pull Request、コミットメッセージ、AI からの回答はすべて日本語で記述する。
- 外部リンクや API 名など英語名称が正式名称の場合のみ英語を使用し、説明文は必ず日本語を添える。
- 本ドキュメントを最新情報源として更新し、内容に差分が出た場合は必ず追記・修正する。

## プロジェクト概要
- Laravel 9 + PHP 8.1 + MySQL 8 で実装したシンプルなメモ共有サービス。ユーザー登録/認証後にメモを作成し、非公開・公開を切り替えて共有できる。
- Inertia.js + Vue 3（Breezeプリセット）で SPA ライクな画面を提供し、Tailwind CSS でスタイリング。フロントは Vite でビルド。
- Fly.io で本番運用しており、Docker（nginx + php-fpm + mysql + redis）でローカル開発ができる。

## 技術スタック
- **バックエンド**: Laravel 9, PHP 8.1, Inertia.js adapter, Breeze, Sanctum（API 認可）, SoftDeletes。
- **フロントエンド**: Vue 3, @inertiajs/vue3, Tailwind CSS, dayjs, sanitize-html, @chenfengyuan/vue-qrcode。
- **インフラ**: Docker Compose（nginx/app/mysql/redis）、Fly.io（`fly.toml`, `mysql-on-flylo/`）。Redis は現状キューやセッション用に待機。
- **開発補助**: Laravel Pint（Lint）、PHPStan（`vendor/bin/phpstan`）、PHPUnit、barryvdh/laravel-debugbar。

## ドメイン/アーキテクチャ
- `users` と `memos`（`database/migrations/2023_07_19_085408_create_memos_table.php`）の 1:N。`memos` は `title`, `content`, `is_public`, `softDeletes`。`Memo` モデルで `public/notPublic/orderByUpdated` スコープと `Crypt` による ID 暗号化を提供。
- `MemoController`（`app/Http/Controllers/MemoController.php`）が CRUD を担当。`MemoRequest` で `title` 必須、その他任意。作成/更新後に `is_public` クエリで Dashboard へ戻す。
- 閲覧 URL は `/read/memos/{id}`（`routes/web.php`）。`CheckMemoIsPublic` ミドルウェアで暗号化 ID を復号し、公開設定を検証。所有者かどうかは `CheckMemoOwner` + `MemoPolicy` (`app/Policies/MemoPolicy.php`) で制御。
- `dashboard` では `?is_public=true` の有無で一覧を切り替え（`memos()->public()` or `notPublic()`）。`Auth::user()` 依存なので `auth` + `verified` ミドルウェアを適用。

## フロントエンド構成（`resources/js/`）
- `Pages/Dashboard.vue`: ログイン後の一覧。`Link` で編集ページへ誘導、`dayjs` で更新日表示。未公開・公開切り替えはサーバー側クエリに依存。
- `Pages/Memo/Form.vue`: 作成/編集フォーム。`useForm` で PUT/POST を使い分け、`Checkbox` で公開設定。公開メモには暗号化 ID を使った共有リンクを表示し、削除時は confirm で確認。
- `Pages/Memo/Read.vue`: 公開ページ。`sanitize-html` で本文を描画し、`autoLink` で URL をリンク化。URL コピーと QR コード（VueQrcode + navigator.clipboard）を提供。オーナーは公開ページから編集画面へ遷移可能。
- レイアウトは `Layouts/AuthenticatedLayout.vue` と `Layouts/GuestLayout.vue`。Tailwind でレスポンシブ対応済み。

## ローカル開発手順
1. `.env` を `.env.example` からコピーし、DB・Fly.io 関連の環境変数を設定。
2. Docker: `docker compose up`（`docker-compose.yml` → nginx/app/mysql/redis）。`app` コンテナ内で `composer install` と `npm install` を実行し、Vite dev server を 5173 ポートで起動。
3. `php artisan migrate` でテーブル作成。テストデータは README の `memos` 生成スニペットを `php artisan tinker` で実行。
4. Web アプリは `http://localhost`、 Vite HMR は `http://localhost:5173`。

## 開発ワークフロー/コマンド
- **PHPUnit**: `php artisan test` または `vendor/bin/phpunit`。
- **静的解析**: `vendor/bin/phpstan analyse app`（README 記載）。`phpstan.neon` がなければデフォルトで実行。
- **Lint**: `./vendor/bin/pint -v`。コミット前に実行推奨。
- **フロント**: `npm run dev` / `npm run build`。
- **DB**: `mysql -u root`, `GRANT ALL PRIVILEGES ...`（README 手順）。Docker の mysql サービス経由で `localhost:13307`。

## デプロイ（Fly.io）
- `fly.toml` と `mysql-on-flylo/` ディレクトリが Fly.io 用リソース。README のフローに従い、`flyctl launch` → `fly volumes create` → `fly deploy` を行う。
- Secrets 設定例: `flyctl secrets set APP_NAME=MemoShare APP_ENV=production`。
- DB 用アプリも別途 `fly launch` で作成してデプロイ。

## 補足
- 公開リンクは暗号化 ID を URL エンコードして使用。`Memo::encryptId()`/`decryptId()` で整合性を担保。
- `CheckMemoOwner` は Gate を通すため `AuthServiceProvider` 側で `MemoPolicy` をバインド済み。
- 公開ページに広告（A8.net）を表示。`resources/js/Pages/Memo/Read.vue` 下部にハードコードされている。
- README にはデザインモック（uizard URL）とトップ画像生成プロンプト、Fly.io 運用メモがまとまっているため要参照。
