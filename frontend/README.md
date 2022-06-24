```bash
# windowsの方はgitbashで実行ください。
$ cd frontend

# envの生成
$ cp -ip .env.example .env

# 依存パッケージのインストール
$ yarn install

# ローカル起動
$ yarn dev
```

### コマンドリファレンス

```bash
# lintチェック コミット前に流してください
$ yarn run lint
# 上記でエラーになったら以下をながしてください
$ yarn run lintfix

# そのほかのコマンドはpackage.jsonのscriptを参照ください。
```
