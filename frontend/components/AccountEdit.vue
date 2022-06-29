<template>
  <v-flex>
    <v-row class="grey darken-2">
      <!-- <v-col cols="12" class="ml-5 mt-6"> -->
      <h3 class="white--text">アカウンと編集</h3>
      <!-- </v-col> -->
      <!-- <v-col class="d-flex mr-5 white--text" cols="2">
        <v-select x-small :items="items" label="Filled style" class="pt-5" item-color="orange"></v-select>
      </v-col>
      <v-col cols="2" class="mt-6">
        <h3 class="white--text">ユーザー情報</h3>
      </v-col> -->
    </v-row>
    <v-row>
      <v-col cols="4" class="pl-3 mt-5">
        <p class="mt-2 text-h2 pl-10 pr-10 pb-10 pt-5 font-size: 5rem">◯</p>
    </v-col>
        <v-col cols="4">
            <btn href="image-update" text color="link">画像変更</btn>
        </v-col>
    </v-row>

    <v-row>
        <v-span>style="width: 100%" class="pa-5">
        <v-card-title class="mt-2 pl-10 pb-10 pr-10 pt-1" style="text-align: center">基本情報</v-card-title>
            <v-card-text>▶︎ニックネーム：test test</v-card-text>
            <v-card-text>▶︎メールアドレス：test@test.jp</v-card-text>
            <v-card-text><btn href="password-update">パスワード</btn></v-card-text>
          </v-span>
    </v-row>
    <v-row>
          <v-span style="width:100%" class="pa-5">
            <v-card-title class="mt-2 pl-10 pb-10 pr-10 pt-1" style="text-align: center">スキル情報</v-card-title>
            <v-text>▶︎言語：PHP・Java・Phthon</v-text>
            <v-text>▶︎フレームワーク：Laravel・Vue.js・Flask</v-text>
            <v-text>▶︎DB：MySQL・SQLite・MariaDB</v-text>
            <v-text>▶︎インフラ：AWS・Azure・Linux</v-text>
            <v-text>▶︎その他：figma・Github・Phthon</v-text>
          </v-span>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script>
export default {
  data() {
    return {}
  },
}
</script>
