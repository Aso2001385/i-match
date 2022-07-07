<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="6" class="ml-5 mt-4 pt-3">
        <h3 class="white--text">ユーザー投稿</h3>
      </v-col>
      <v-col class="d-flex mr-5 white--text" cols="2">
        <v-btn @click="sortSection(sortId)" class="mt-3"
          >{{ sortName[sortId] }}
          <v-icon aria-hidden="false">mdi-sync</v-icon>
        </v-btn>
      </v-col>
      <v-col cols="2" class="mt-4 pb-3">
        <h3 class="white--text">ユーザー情報</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0 pb-1" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <BulletinList v-for="userList in 5" :key="userList" />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <div class="mt-2 text-h1 pl-10 pr-10 pt-5 justify-center">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </div>
            <strong style="font-size: 2rem">test test</strong>
            <p class="grey--text" style="font-size: 1rem">test@test.jp</p>
            <NuxtLink to="/account-edit" class="blue--text">
              <v-col>編集</v-col>
            </NuxtLink>
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
<script defer>
export default {
  data() {
    return {
      sortName: ['新着順', '投稿順', '締切が近い順'],
      sortId: 0,
    }
  },
  methods: {
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else if (sort === 1) {
        this.sortId = 2
      } else {
        this.sortId = 0
      }
    },
  },
  components: {
    BulletinList: () => import('../components/BulletinList.vue'),
  },
}
</script>
