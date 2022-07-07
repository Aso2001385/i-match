<template>
  <v-app>
    <v-flex xs6 md6>
      <v-navigation-drawer v-model="drawer" color="grey darken-3" app clipped>
        <v-container>
          <v-row>
            <v-list>
              <v-list-item class="pl-1 pb-5 pa-7"
                ><v-btn href="news-list" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-bell</v-icon
                  ><v-span class="white--text text-h6">お知らせ</v-span></v-btn
                ></v-list-item
              >
              <v-list-item class="pl-1 pb-5 pa-6"
                ><v-btn href="bulletin-list" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-bulletin-board</v-icon
                  ><v-span class="white--text text-h6">掲示板</v-span></v-btn
                ></v-list-item
              >
              <v-list-item class="pl-1 pb-5 pa-6"
                ><v-btn href="chat-list" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-chat</v-icon
                  ><v-span class="white--text text-h6">チャット</v-span></v-btn
                ></v-list-item
              >
              <v-list-item class="pl-1 pb-5 pa-6"
                ><v-btn href="account" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-account-group</v-icon
                  ><v-span class="white--text text-h6">ユーザーリスト</v-span></v-btn
                ></v-list-item
              >
              <v-list-item class="pl-1 pb-5 pa-6"
                ><v-btn href="history-list" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-clipboard-text-clock</v-icon
                  ><v-span class="white--text text-h6">参加履歴</v-span></v-btn
                ></v-list-item
              >
              <v-list-item class="pl-1 pb-5 pa-6"
                ><v-btn href="account" text color="link"
                  ><v-icon class="white--text ma-6"> mdi-account</v-icon
                  ><v-span class="white--text text-h6">アカウント名</v-span></v-btn
                ></v-list-item
              >
            </v-list>
          </v-row>
          <v-divider class="grey darken-1"></v-divider>
          <v-row class="justify-center pa-7 ma-11" cols="1">
            <v-btn href="account" text color="link" min-height="20">
              <span class="white--text text-h6">ログアウト</span></v-btn
            >
          </v-row>
        </v-container>
      </v-navigation-drawer>
    </v-flex>
    <v-app-bar color="grey darken-3" app clipped-left>
      <v-app-bar-nav-icon @click="drawer = !drawer" class="white--text"></v-app-bar-nav-icon>
      <v-toolbar-title class="white--text">
        <v-btn href="top" text class="white--text">i-Match</v-btn>
      </v-toolbar-title>
    </v-app-bar>
    <v-app>
      <v-main>
        <Nuxt />
      </v-main>
    </v-app>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: true,
    }
  },
}
</script>
<style>
body::-webkit-scrollbar {
 display:none;
}
</style>