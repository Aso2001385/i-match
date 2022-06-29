<template>
  <v-flex>
    <!-- <v-container> -->
    <v-row class="grey darken-2">
      <v-col cols="6" class="ml-5 mt-6">
        <h3 class="white--text">ユーザーの投稿</h3>
      </v-col>
      <v-col class="d-flex mr-5 white--text" cols="2">
        <v-select x-small :items="items" label="Filled style" class="pt-5" item-color="orange"></v-select>
      </v-col>
      <v-col cols="2" class="mt-6">
        <h3 class="white--text">ユーザー情報</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0 mb-5 pb-5" style="overflow: hidden !important; height: 80vh; overflow-y: auto">
        <BulletinList v-for="n in 10" :key="n" />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <p class="mt-2 text-h1 pl-10 pr-10 pb-10 pt-5 font-size: 5rem">◯</p>
            <strong style="font-size: 2rem">test test</strong>
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
import BulletinList from '../components/BulletinList.vue'
export default {
  data() {
    return {
      items: ['新着順', '投稿順', '締切が近い順'],
    }
  },
  components: {
    BulletinList,
  },
}
</script>
<style lang="scss"></style>
