<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col><h3 class="white--text ma-5">お知らせリスト</h3></v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-row>
          <v-btn
            style="width: 100%; overflow: hidden !important; height: 84vh; overflow-y: auto"
            class="ma-0 pa-0"
            href="chat-room"
          >
            <v-col>
              <v-card class="mb-2" v-for="n in 20" :key="n" elevation="2">
                <v-row>
                  <v-col cols="12" md="8" class="ml-5"><span class="black--text">オファー</span></v-col>
                  <v-col cols="12" md="2"><span class="black--text">3/6 12:10</span></v-col>
                </v-row>
                <v-row>
                  <v-col cols="12" class="ml-10"
                    ><h2 class="black--text">〇〇さんからオファーが届いています。</h2></v-col
                  >
                </v-row>
              </v-card>
            </v-col>
          </v-btn>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
