<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col>
        <h3 class="white--text ma-5 pt-2">チャットリスト</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" style="overflow: hidden !important; height: 83vh; overflow-y: auto" class="pa-0 pb-1">
        <v-row style="width: 100%">
          <v-card v-for="room in rooms" :key="room.id" style="width: 100%">
            <NuxtLink to="/chat-room" class="white--text green" style="text-decoration: none">
              <v-row class="ml-5 mt-3 mb-5">
                <v-col cols="12" md="8" class="black--text ml-5 font-weight-bold" style="width: 80%">
                  相手のニックネーム
                </v-col>
                <v-col cols="12" md="3" class="black--text font-weight-bold">3/6 12:10</v-col>
                <v-col cols="12" class="ml-5 grey--text darken-4" style="width: 80%">最終メッセージ</v-col>
              </v-row>
            </NuxtLink>
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
    }
  },
  mounted() {
    this.getChatList()
  },
  methods: {
    getChatList() {
      this.$axios
        // .get('http://localhost:8080/api/chats')
        .get('http://localhost:8080/api/chats')
        .then(response => {
          console.log('ちゃんと通っている')
          this.bulletinCount = response.data.length
          for (let i = 0; i < response.data.length; i++) {
            this.bulletinList.push(response.data[i].title)
            // this.skillIdList[response.data[0].skill]
            this.dueList.push(response.data[i].due)
            this.personsList.push(response.data[i].persons)
          }
          console.log(response.data)
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
