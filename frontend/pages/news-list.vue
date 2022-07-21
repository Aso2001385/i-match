<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col><h3 class="white--text ma-5 pt-2">お知らせリスト</h3></v-col>
    </v-row>
    <v-row>
      <v-col cols="12" style="overflow: hidden !important; height: 84vh; overflow-y: auto" class="pa-0 pb-1">
        <v-row style="width: 100%">
          <v-card v-for="value in newsListCount" :key="value" style="width: 100%">
            <div @click="sendDetail(newsId[value], titleList[value], newsContent[value])">
              <NuxtLink to="/news-detail" class="white--text" style="text-decoration: none">
                <v-row class="ml-5 mt-3 mb-5">
                  <v-col cols="6" md="4"
                    ><span class="black--text ml-5">{{ categoryList[value] }}</span></v-col
                  >
                  <v-col cols="6" md="8"><span class="black--text">3/6 12:10</span></v-col>
                  <v-col cols="12" class="ml-10 pb-5"
                    ><h2 class="black--text" style="width: 80%">
                      {{ titleList[value] }}
                    </h2></v-col
                  >
                </v-row>
              </NuxtLink>
            </div>
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
      userId: 1,
      newsCount: 0,
      newsId: [],
      newsContent: [],
      id: '',
      titleList: [],
      categoryList: [],
      newsListCount: 0,
    }
  },
  mounted() {
    this.getNews()
  },
  methods: {
    sendChat() {
      this.chat = ''
    },
    sendDetail(id, tit, con) {
      sessionStorage.setItem('id', id)
      sessionStorage.setItem('tit', tit)
      sessionStorage.setItem('con', con)
    },
    async getNews() {
      await this.$axios
        // .get('http://localhost:8080/api/informations')
        .get('http://localhost:8080/api/informations')
        .then(response => {
          console.log('ちゃんと通っている')
          this.newsCount = response.data.length
          for (let i = 0; i < this.newsCount; i++) {
            if (this.userId === response.data[i].user_id) {
              this.newsId.push(response.data[i].id)
              this.newsContent.push(response.data[i].contents)
              this.titleList.push(response.data[i].title)
              console.log(response.data[i].title)
            }
          }
          this.newsListCount = this.newsId.length
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
      await this.$axios
        // .get('http://localhost:8080/api/informations')
        .get('http://localhost:8080/api/informations')
        .then(response => {
          console.log('ちゃんと通っている詳細取得')
          this.titleList.unshift(this.titleList[0])
          this.newsContent.unshift(this.newsContent[0])
          console.log(response.data)
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
