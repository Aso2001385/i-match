<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col>
        <h3 class="white--text ma-5 pt-2">履歴リスト</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" style="overflow: hidden !important; height: 83vh; overflow-y: auto" class="pa-0 pb-1">
        <v-row>
          <v-col cols="12" class="ma-0">
            <v-card v-for="bulletinList in 51" :key="bulletinList">
              <v-row class="pt-5 pl-10">
                <v-col cols="12" md="6" class="ml-7"><span>募集締め切り：1月1日</span></v-col>
                <v-col cols="12" md="4" class="ml-10"><span>募集人数：3/6人</span></v-col>
              </v-row>
              <v-row>
                <v-col>
                  <h2 class="ml-10">Flaskの勉強をしませんか？</h2>
                </v-col>
              </v-row>
              <v-row class="ml-4">
                <v-col cols="10" md="8" class="ml-10 pa-0">
                  <span v-for="skillList in 10" :key="skillList" class="text-h4 ml-0 pa-0">◯</span>
                </v-col>
                <v-col cols="12" md="2" class="mr-0">
                  <NuxtLink to="/history-bulletin-detail" class="white--text" style="text-decoration: none">
                    <v-col cols="12" md="8"><span class="black--text">Read More </span></v-col></NuxtLink
                  >
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {}
  },
  mounted() {
    this.getHistory()
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
    getHistory() {
      this.$axios
        .get('http://3.113.81.143/api/')
        .then(response => {
          console.log('ちゃんと通っている１')
          console.log(response.data)
          this.$router.push('/bulletin-list')
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
      alert('通ったっす！')
    },
  },
}
</script>
