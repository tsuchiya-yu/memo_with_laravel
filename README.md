# 使用言語

- php：8.1.20
- Laravel：9.52.10
- mysql：8.0.28

# 環境構築
docker compoose upでアプリケーションが起動します。

※[こちら](https://qiita.com/hitotch/items/aa319c49d625c2a9b65e)を参考にDockerファイルを作成しました。

## DB接続用のユーザ作成
mysql -u root
create user '【DB_USERNAME】'@'%';
GRANT ALL PRIVILEGES ON *.* TO '【DB_USERNAME】'@'%';
FLUSH PRIVILEGES;
