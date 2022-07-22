<template>
  <v-app>
    <v-flex xs6 md6>
      <v-navigation-drawer v-model="drawer" color="grey darken-3" app clipped>
        <v-container>
          <v-row>
            <v-list>
              <v-list-item class="pl-1 pb-0 pa-5">
                <NuxtLink to="/news-list" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-bell</v-icon>お知らせ</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-4">
                <NuxtLink to="/bulletin-list" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-bulletin-board</v-icon>掲示板</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-4">
                <NuxtLink to="/chat-list" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-chat</v-icon>チャット</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-4">
                <NuxtLink to="/user-list" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-account-group</v-icon
                  >ユーザーリスト</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-4">
                <NuxtLink to="/history-list" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-clipboard-text-clock</v-icon
                  >参加履歴</NuxtLink
                >
              </v-list-item>
              <v-list-item class="pl-1 pb-0 pa-4">
                <NuxtLink to="/account" class="white--text text-h7" style="text-decoration: none"
                  ><v-icon class="white--text ma-4" aria-hidden="false"> mdi-account</v-icon
                  >{{ this.user.name }}</NuxtLink
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
      <v-app-bar-nav-icon class="white--text" @click="drawer = !drawer"></v-app-bar-nav-icon>
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
import auth from '~/middleware/auth'

export default {
  middleware: auth,
  data() {
    return {
      drawer: true,
      // ログインしてデータを取得するまで代わりに入れておく
      // name: '',
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    skills() {
      return this.$store.state.skills
    },
  },
  mounted() {
    this.userInfo()
  },
  methods: {
    conuser() {
      console.log(this.user)
      console.log(this.skills.user_skills[0].name)
      // console.log(this.user.name)
    },
    userInfo() {
      // console.log('トークンに保存してあるユーザー情報')
      // console.log(this.$store.state.skills)
      // console.log(this.$store.state.user)
    },
  },
}
</script>
<style>
body::-webkit-scrollbar {
  display: none;
}
</style>
