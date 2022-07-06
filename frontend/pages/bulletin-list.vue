<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="2" class="mt-6">
        <!-- <v-btn href="event-list" text color="link" class="white--text ml-5 text-h6">イベント</v-btn> -->
      </v-col>
      <v-col cols="2" class="mt-6">
        <v-btn href="bulletin-list" text color="link" class="white--text text-h6">メンバー募集</v-btn>
      </v-col>
      <v-col cols="2" class="mt-6">
        <v-btn href="account-edit" text color="link" class="ml-8 white--text text-h6">投稿作成</v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row v-for="bulletinList in 5" :key="bulletinList">
          <BulletinList />
        </v-row>
      </v-col>
      <v-col cols="4" class="pl-3 mt-2">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <p class="mt-2 text-h1 pl-10 pr-10 pb-5 pt-5">
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
    return {}
  },
  components: {
    BulletinList: () => import('../components/BulletinList.vue'),
  },
}
</script>
