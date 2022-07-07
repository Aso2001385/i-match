<template>
  <v-flex>
    <v-row>
      <v-col cols="6" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row v-for="chatRoom in 10" :key="chatRoom" class="justify-start mt-5 ml-2">
          <v-col cols="12">
                  <p>ニックネーム<span style="margin-left:60%;">1/12:12:30
              </span></p>
            
            <v-card>
              <v-card-text style="border: 1px solid transparent">こんにちは。こんにちは。</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="6">
          <v-row class="justify-center" style="text-align: center;">
              <v-col cols="2" class="ml-10">
                <v-icon class="text-h1 ma-6" aria-hidden="false">mdi-account</v-icon>
                </v-col>
              <v-col cols="5" class="ml-10 mt-12"><p class="text-h4">浦島太郎</p></v-col>
          </v-row>
          <v-row class="justify-center">
            <v-card style="width: 50vh" class="ma-1" elevation="2">
            <v-card-title class="pl-10 pr-10 pt-1" style="text-align: center">使えるスキル</v-card-title>
            <v-card-text>▶︎言語：PHP・Java・Phthon</v-card-text>
            <v-card-text>▶︎フレームワーク：Laravel・Vue.js・Flask</v-card-text>
            <v-card-text>▶︎DB：MySQL・SQLite・MariaDB</v-card-text>
            <v-card-text>▶︎インフラ：AWS・Azure・Linux</v-card-text>
            <v-card-text>▶︎その他：figma・Github・Phthon</v-card-text>
          </v-card>
          </v-row>
          <v-row class="justify-center">
            <v-card style="width: 50vh" class="ma-2" elevation="2">
            <v-card-title class="pl-10 pr-10 pt-1" style="text-align: center">学びたいスキル</v-card-title>
            <v-card-text>▶︎言語：PHP・Java・Phthon</v-card-text>
            <v-card-text>▶︎フレームワーク：Laravel・Vue.js・Flask</v-card-text>
            <v-card-text>▶︎DB：MySQL・SQLite・MariaDB</v-card-text>
            <v-card-text>▶︎インフラ：AWS・Azure・Linux</v-card-text>
            <v-card-text>▶︎その他：figma・Github・Phthon</v-card-text>
          </v-card>
          </v-row>
      </v-col>
    </v-row>
    <v-row>
          <v-col cos="5" class="ml-4"><input v-model="chat" style="border: 1px solid lightgrey; width: 60vh;border-radius: 5px;">
          <span class="ml-5"><v-btn @click="sendChat()" class="mb-2">送信</v-btn></span>
          </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      chat: '',
    }
  },
  methods: {
    sendChat() {
        this.chat = '';
    },
  },
}
