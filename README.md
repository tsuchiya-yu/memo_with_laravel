
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
GRANT ALL PRIVILEGES ON *.* TO '【DB_USERNAME】'@'%';
FLUSH PRIVILEGES;
```

## デザイン

  

### デザイン

プレビュー：
https://app.uizard.io/p/e026c07e/overview

### トップ画像の生成プロンプト(uizard)：

A black man operating a laptop computer and a black woman looking at a smartphone in her hand. Background color is white.


## メモ

### メモデータ作成

```php
$user = User::latest()->first();
// memosリレーションに新しいメモを追加する
$memo = $user->memos()->create([
'title' => 'メモのタイトル',
'content' => 'メモの内容',
]);
```


### ソース解析
```php
vendor/bin/phpstan analyse app
```

### リンター
```php
./vendor/bin/pint -v
```