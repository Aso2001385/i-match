<template>
  <v-flex>
    <v-row class="mt-5 pa-0 justify-center">
      <v-card style="width: 80%" class="mt-0 pl-10 pb-0">
        <v-row class="mt-2 pa-0">
          <v-col cols="4"><v-card-title class="text-h1">〇</v-card-title></v-col>
          <!-- <NuxtLink to="/bulletin-detail" style="text-decoration: none">
             <v-col>画像変更</v-col>
            </NuxtLink> -->
          <v-col cols="7" class="mt-10"><v-btn>画像変更</v-btn></v-col>
        </v-row>
        <v-row class="mt-0 pa-0" style="border: 1px solid lightgrey; width: 90%">
          <v-col cols="4"><h2>基本情報</h2></v-col>
          <v-col cols="3" class="ml-7"><v-btn>保存</v-btn></v-col>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12">▶︎ニックネーム： <input type="text" style="border: 1px solid lightgrey" /></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" class="mt-0"
              >▶︎メールアドレス：<input type="text" style="border: 1px solid lightgrey"
            /></v-col>
          </v-row>
          <NuxtLink to="/account-edit" class="blue--text">
            <v-row style="width: 100%" class="ml-5 mb-10"> <span class="mt-10 ml-5">パスワード変更</span></v-row>
          </NuxtLink>
        </v-row>
        <v-row class="mt-15" style="border: 1px solid lightgrey; width: 90%">
          <v-col cols="4"><h2>スキル情報</h2></v-col>
          <v-row class="mt-1">
            <v-col cos="8" class="ml-4">
              <!-- <NuxtLink to="/account" style="text-decoration: none">
                <v-col>登録</v-col>
                </NuxtLink> -->
              <span class="ml-5"><v-btn class="mb-5" href="skill-signup">登録</v-btn></span>
            </v-col>
            <v-col cos="4" class="ml-2">
              <!-- <NuxtLink to="/account" style="text-decoration: none">
                <v-col>更新</v-col>
                </NuxtLink> -->
              <span class="ml-5"><v-btn class="mb-5" href="skill-update">更新</v-btn></span>
            </v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12">▶︎言語：<span>PHP・Java</span></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12">▶︎フレームワーク：<span>Laravel・Spring</span></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12">▶︎DB：<span>MySQL・SQlite</span></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12">▶︎インフラ：<span>AWS・Linux</span></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5 mb-5">
            <v-col cols="12">▶︎その他：<span>figma・github</span></v-col>
          </v-row>
        </v-row>
        <!-- <NuxtLink to="/account" style="text-decoration: none">
        <v-col>更新</v-col>
        </NuxtLink> -->
        <v-row style="text-align: center">
          <v-col><v-btn class="mb-5" href="account">更新</v-btn></v-col>
        </v-row>
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {}
  },
  mounted() {
    this.getAccount()
  },
  methods: {
    getAccount() {
      this.$axios
        .get('http://localhost:8080/api/users/{id}', getAccount)
        .then(response => {
          console.log('ちゃんと通っている１')
          console.log(response.data)
          this.$router.push('/account')
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
      alert('通ったっす！')
    },
  }
}
</script>
<style lang="scss">
#addSkill {
  border: 1px solid grey;
  border-radius: 5px;
  background-color: grey;
  color: white;
}
#addSkill:hover {
  background-color: white;
  color: orange;
  border: 1px solid orange;
}
</style>
