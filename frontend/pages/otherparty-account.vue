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
        <YouBulletinList />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <p class="mt-2 text-h1 pl-10 pr-10 pt-5">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </p>
            <strong style="font-size: 2rem">{{ name }}</strong>
            <p class="grey--text" style="font-size: 1rem">{{ email }}</p>
          </v-card>
        </v-row>
        <v-row class="justify-center">
          <v-card style="width: 40vh" class="pa-5">
            <v-card-title class="pl-5 pr-10 pt-1">スキル一覧</v-card-title>
            <v-col style="overflow: hidden !important; height: 25vh; overflow-y: auto">
              <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%">言語</p>
              <v-chip v-for="n in 5" :key="n" color="red" class="ml-1 mr-1 mb-1 white--text">PHP</v-chip>
              <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">
                フレームワーク
              </p>
              <v-chip v-for="n in 5" :key="n" color="blue" class="ml-1 mr-1 mb-1 white--text">Laravel</v-chip>
              <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">DB</p>
              <v-chip v-for="n in 5" :key="n" color="green" class="ml-1 mr-1 mb-1 white--text">MySQL</v-chip>
              <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">インフラ</p>
              <v-chip v-for="n in 5" :key="n" color="purple" class="ml-1 mr-1 mb-1 white--text">AWS</v-chip>
              <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">その他</p>
              <v-chip v-for="n in 5" :key="n" color="grey" class="ml-1 mr-1 mb-1 white--text">figma</v-chip>
            </v-col>
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
      userId: 0,
      name: '',
      email: '',
    }
  },
  mounted() {
    this.getSession()
    this.otherpartyAccount()
  },
  methods: {
    getSession() {
      // クリックされた相手の情報
      this.userId = sessionStorage.getItem('userInfo')
    },
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else if (sort === 1) {
        this.sortId = 2
      } else {
        this.sortId = 0
      }
    },
    otherpartyAccount() {
      this.$axios
        .get(`https://i-match.click/api/users/${this.userId}`)
        // .get(`https://localhost:8080/api/users/${this.userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          this.name = response.data.name
          this.email = response.data.email
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
      alert('通ったっす！')
    },
  },
  components: {
    YouBulletinList: () => import('../components/YouBulletinList.vue'),
  },
}
</script>
