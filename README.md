
# 使用言語
- php：8.1.20
- Laravel：9.52.10
- mysql：8.0.28

# 環境構築

docker compoose upでアプリケーションが起動します。
※[こちら](https://qiita.com/hitotch/items/aa319c49d625c2a9b65e)を参考にDockerファイルを作成しました。

  
## DB接続用のユーザ作成

```sql
mysql -u root
create user '【DB_USERNAME】'@'%';
GRANT ALL PRIVILEGES ON *.* TO  '【DB_USERNAME】'@'%';
FLUSH PRIVILEGES;
```

### DB接続コマンド
DBのコンテナ内で実施
```sh
mysql -h localhost -P 13307
use develop;
```

### アプリケーションのコンソールコマンド
Webのコンテナ内で実施
```sh
php artisan tinker
```

## デザイン

### プレビュー
https://app.uizard.io/p/e026c07e/overview  

### トップ画像の生成プロンプト(uizardで作った)
A black man operating a laptop computer and a black woman looking at a smartphone in her hand. Background color is white.

## 本番環境

### URL
https://memo-with-laravel.fly.dev

### 環境構築
fly.ioにアカウント登録の後に以下を実行。

```sh
curl -L https://fly.io/install.sh | bash
/root/.fly/bin/flyctl auth login
# ↑表示されたURLにブラウザからログインする
/root/.fly/bin/fly launch
mkdir mysql-on-flylo
cd mysql-on-flylo
/root/.fly/bin/fly launch
# 環境変数を追加
# e.g) /root/.fly/bin/flyctl secrets set APP_NAME=MemoShare APP_ENV=production
/root/.fly/bin/fly volumes create mysqldata --size 10
# DBコンテナのデプロイ
/root/.fly/bin/fly deploy
cd ..
# アプリのデプロイ(/srcのパスで実行)
/root/.fly/bin/fly deploy
```

独自ドメインの設定については [こちら](https://qiita.com/Inp/items/b9696d844b1b6bb9e49a#%E3%83%89%E3%83%A1%E3%82%A4%E3%83%B3%E3%81%AE%E9%81%A9%E7%94%A8)を参考にしました。

### その他
```sh
# コンテナに侵入するコマンド
flyctl ssh console -a memo-with-laravel
```

## メモ

### memosテーブルのテストデータ作成

```php
$user = User::latest()->first();
// memosリレーションに新しいメモを追加する
$memo = $user->memos()->create([
'title' => 'メモのタイトル',
'content' => 'メモの内容',
]);
```

### リンター
push前に実行を忘れない。
```php
./vendor/bin/pint -v
```

### ソース解析
```php
vendor/bin/phpstan analyse app
```