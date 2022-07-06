<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col><h3 class="white--text ma-5 pt-2">ユーザーリスト</h3></v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="pb-5" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-card v-for="userList in 10" :key="userList">
          <v-row>
            <v-col cols="12"
              ><p style="text-align: right" class="mr-5 mb-1">
                <v-icon class="text-h3" aria-hidden="false">mdi-chat-processing-outline</v-icon>
              </p></v-col
            >
          </v-row>
          <v-row>
            <v-col cols="11" class="ml-10 mt-0">
              <h2>金太郎</h2>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" class="ml-0 pa-0">
              <p style="text-align: right; width: 90%">
                <!-- <span v-for="skillList in 5" :key="skillList" class="text-h4 ml-0 pa-0">◯</span> -->
              </p>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
      <v-col cols="4" class="pl-3 mt-2">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <p class="mt-2 text-h1 pl-10 pr-10 pb-10 pt-5 font-size: 5rem">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </p>
            <strong style="font-size: 2rem">桃太郎</strong>
            <p class="grey--text" style="font-size: 1rem">test@test.jp</p>
            <v-btn href="account-edit" text color="link">編集</v-btn>
          </v-card>
        </v-row>
        <v-row class="justify-center">
          <v-card style="width: 40vh" class="pa-5">
            <v-card-title class="mt-2 pl-10 pb-10 pr-10 pt-1" style="text-align: center">スキル一覧</v-card-title>
            <v-card-text>▶︎言語：PHP・Java・Phthon</v-card-text>
            <v-card-text>▶︎フレームワーク：Laravel・Vue.js・Flask</v-card-text>
            <v-card-text>▶︎DB：MySQL・SQLite・MariaDB</v-card-text>
            <v-card-text>▶︎インフラ：AWS・Azure・Linux</v-card-text>
            <v-card-text>▶︎その他：figma・Github・Phthon</v-card-text>
          </v-card>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script>
export default {
  data() {
    return {
      // items: ['新着順', '投稿順', '締切が近い順'],
    }
  },
}
</script>
