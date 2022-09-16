# Laravel-Vue

#goto hiroaki

## 環境構築手順
a

### リポジトリをcloneする
* Githubでリポジトリのページを開く
    * `Code`からURLをコピーする
* 以下のコマンドを実行し、リポジトリをクローンする
```
git clone コピーしたURL
```

### .envファイルを作る

* クローンしたディレクトリをVSCodeで開く
* .env.sampleの中身をコピーする
* .env.sampleと同じ階層に.envファイルを作成
* .envファイルにコピーしたコードをペースト
* 環境変数の値を自分用に書き換える(以下例、値は自由)
```
変更前　DB_NAME=YOUR_DB_NAME
変更後　DB_NAME=mybase
ポート番号の変更は要相談
```

### イメージの構築（buid）
* VSCode内でターミナルを開く(Ctrl + Shift + @)
* 以下のコマンドを実行してビルドする
```
docker compose build
```
* 以下のコマンドを実行してコンテナを起動する
```
docker compose up -d
```
* 以下のように表示されていればOK
```
[+] Running 3/3
 ⠿ Container docker-laravel-vue_db_1    Started     6.4s
 ⠿ Container docker-laravel-vue_app_1   Started     5.0s
 ⠿ Container docker-laravel-vue_web_1   Started
```

### コンテナに入る
* 以下のコマンドを実行してappコンテナに移動
```
docker compose exec app bash
```
* 以下のように`/var/www/html`ディレクトリに入っていればOK
```
root@81d2cea8efe2:/var/www/html#
```
* 以下のコマンドを実行してファイルの権限設定を変更
```
chmod -R 777 storage
```

### Composerのバージョン確認

* `/var/www/html`ディレクトリのまま以下のコマンドを実行してバージョンを確認
```
composer -V
```
* 以下のような表示になっていればOK
```
Composer version 2.0.13 2021-04-27 13:11:08
```

### Laravelのインストール
* `/var/www/html`ディレクトリのまま以下のコマンドを実行
```
composer create-project --prefer-dist "laravel/laravel=8.*" .
```
* localhost:80にアクセスする
    * ウェルカムページが表示されればOK

### Vue.jsのインストール
* `/var/www/html`ディレクトリのまま以下のコマンドを実行
```
npm -v
```
* npmバージョンが表示されていたらOK
* 以下のコマンドを実行
```
npm install -D vue
```
* 以下のような表示になっていればOK
```
+ vue-template-compiler@2.6.12
added 3 packages from 2 contributors and audited 4 packages in 1.553s
found 0 vulnerabilities
```
* 念のため`package.json`というファイルの中に以下の記述があるか確認
```
"vue": "^2.6.12",
"vue-template-compiler": "^2.6.12"
```
