<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col>
        <h3 class="white--text ma-5 pt-2">チャットリスト</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-row style="width: 100%; overflow: hidden !important; height: 83vh; overflow-y: auto" class="pa-0 pb-1">
          <v-card v-for="chatList in 5" :key="chatList" style="width: 100%">
            <v-btn class="ma-0 pa-0" href="chat-room" elevation="2" style="width: 100%; height: 20vh">
              <v-row class="ml-5">
                <v-col cols="12" md="4"><span class="black--text ml-5">相手のニックネーム</span></v-col>
                <v-col cols="12" md="8"><span class="black--text">3/6 12:10</span></v-col>
                <v-col cols="12" class="ml-10"><h2 class="black--text">最終メッセージ</h2></v-col>
              </v-row>
            </v-btn>
          </v-card>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
