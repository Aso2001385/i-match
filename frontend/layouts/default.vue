<template>
  <v-app>
    <v-flex xs6 md6>
      <v-navigation-drawer v-model="drawer" color="grey darken-3" app clipped>
        <v-container>
          <v-row>
            <v-list>
              <v-list-item class="pl-1 pb-0 pa-7">
                <NuxtLink to="/news-list" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-bell</v-icon>お知らせ</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-6">
                <NuxtLink to="/bulletin-list" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-bulletin-board</v-icon>掲示板</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-6">
                <NuxtLink to="/chat-list" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-chat</v-icon>チャット</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-6">
                <NuxtLink to="/user-list" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-account-group</v-icon
                  >ユーザーリスト</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-6">
                <NuxtLink to="/history-list" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-clipboard-text-clock</v-icon
                  >参加履歴</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-6">
                <NuxtLink to="/account" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="white--text ma-6" aria-hidden="false"> mdi-account</v-icon>アカウント名</NuxtLink
                >
              </v-list-item>
            </v-list>
          </v-row>
          <v-row>
            <v-divider class="grey darken-1"></v-divider>
          </v-row>

          <v-row class="justify-center mt-10" cols="1">
            <NuxtLink to="/account" class="white--text">ログアウト</NuxtLink>
          </v-row>
        </v-container>
      </v-navigation-drawer>
    </v-flex>
    <v-app-bar color="grey darken-3" app clipped-left>
      <v-app-bar-nav-icon @click="drawer = !drawer" class="white--text"></v-app-bar-nav-icon>
      <v-toolbar-title class="white--text">i-Match </v-toolbar-title>
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
