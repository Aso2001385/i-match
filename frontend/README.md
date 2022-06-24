- Node.js v16 & Yarn v1.22 (バージョン管理のために[Volta](https://docs.volta.sh/guide/getting-started)でインストール推奨。Volta を入れれば特に作業不要)
- Make for Windows (windows の方のみ)
  1. http://gnuwin32.sourceforge.net/packages/make.htm にアクセス
  1. [Complete package, except sources]の[Setup]をクリックしてインストーラをダウンロード
  1. インストーラに従い、インストール　※インストール先のパスをコピーしておくとよい
  1. `コピーしていたパス + bin/` を環境変数に追加

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
