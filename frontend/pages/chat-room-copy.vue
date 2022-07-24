<template>
  <v-flex>
    <v-row>
      <v-col cols="6" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row v-for="chatRoom in 10" :key="chatRoom" class="justify-start mt-5 ml-2">
          <v-col cols="12">
            <p>ニックネーム<span style="margin-left: 60%">1/12:12:30 </span></p>

            <v-card>
              <v-card-text style="border: 1px solid transparent">こんにちは。こんにちは。</v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="6" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row class="justify-center" style="text-align: center">
          <v-col cols="2" class="ml-10">
            <v-icon class="text-h1 ma-6" aria-hidden="false">mdi-account</v-icon>
          </v-col>
          <v-col cols="5" class="ml-10 mt-12"><p class="text-h4">浦島太郎</p></v-col>
        </v-row>
        <v-row class="justify-center">
          <v-card style="width: 50vh" class="ma-1" elevation="2">
            <v-card-title class="pl-5 pr-10 pt-1">利用できるスキル</v-card-title>
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
        <v-row class="justify-center mt-5">
          <v-card style="width: 50vh" class="ma-2" elevation="2">
            <v-card-title class="pl-5 pr-10 pt-1">学びたいスキル</v-card-title>
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
    <v-row>
      <v-col cos="5" class="ml-4"
        ><input v-model="chat" style="border: 1px solid lightgrey; width: 60vh; border-radius: 5px" />
        <span class="ml-5"><v-btn @click="sendChat()" class="mb-2">送信</v-btn></span>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      chat: '',
    }
  },
  mounted() {},
  methods: {},
}
</script>
