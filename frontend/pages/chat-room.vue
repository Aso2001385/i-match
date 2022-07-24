<template>
  <v-row>
    <v-col cols="8" class="mt-3">
      <v-row
        ref="chatBox"
        style="overflow: hidden !important; height: 70vh; overflow-y: auto; -ms-overflow-style: none"
      >
        <v-col v-for="chat in chats" :key="chat.id" cols="12" class="mt-5 ml-2 mr-10 pr-7">
          <v-card>
            <v-row class="pl-2 pr-5 pt-0">
              <v-col cols="4" class="my-0 pt-0">
                <v-btn class="mt-0 pa-0 font-weight-bold" text>
                  {{ chat.user_name }}
                </v-btn>
                <span style="font-size: 0.7em; color: gray">
                  {{ dateFormater(chat.created_at) }}
                </span>
              </v-col>
              <v-col cols="2" class="ml-auto text-right my-0 pt-0">
                <v-btn class="mt-0 pa-0" text @click.prevent="edit(chat.id, chat.message)">編集する</v-btn>
              </v-col>
            </v-row>
            <v-divider />
            <v-card-text>{{ chat.message }}</v-card-text>
          </v-card>
        </v-col>
      </v-row>
      <v-row justify="end">
        <v-col cols="12" class="px-5 py-0 mb-0">
          <v-textarea v-model="message" solo no-resize rows="4" class="mb-0"></v-textarea>
        </v-col>
        <v-col cols="2" class="px-5 py-0 mt-0">
          <ApiEventButton color="grey darken-4" :click-callback="submit">{{ sendBtn }}</ApiEventButton>
        </v-col>
      </v-row>
    </v-col>
    <v-col cols="4">
      <v-row class="px-3 py-5">
        <v-col cols="12">
          <v-card color="grey darken-3 white--text">
            <v-card-title>{{ $route.query.name }}</v-card-title>
          </v-card>
        </v-col>
      </v-row>
      <v-row class="px-3">
        <v-col v-for="user in users" :key="user.id" cols="12">
          <v-icon>mdi-account</v-icon> {{ user.name }}
          <v-divider />
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>
<script defer>
export default {
  data() {
    return {
      chats: [],
      users: [],
      message: '',
      chat_id: 0,
      sendBtn: '送信',
    }
  },
  mounted() {
    this.getChatRoom()
  },
  updated() {
    this.scrollToEnd()
  },
  methods: {
    dateFormater(material) {
      const dateTime = new Date(material)

      let format = dateTime.getFullYear() + '/' + dateTime.getMonth() + '/' + dateTime.getDate() + ' '
      format += dateTime.getHours() + ':' + dateTime.getMinutes()
      return format
    },
    getChatRoom() {
      this.$axios
        .get(`${this.$urls.API}/chats/${this.$route.query.id}/${this.$store.state.user.id}`)
        .then(response => {
          if (!response.data) return
          console.log(response.data.chats)
          this.chats = response.data.chats
          this.users = response.data.users
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    async submit() {
      const SEND = {
        room_id: this.$route.query.id,
        user_id: this.$store.state.user.id,
        message: this.message,
      }

      if (this.chat_id > 0) SEND.id = this.chat_id

      await this.$axios
        .post(`${this.$urls.API}/chats`, SEND)
        .then(response => {
          if (!response.data) return
          this.chats = response.data.chats
          this.users = response.data.users
          this.message = ''
          this.chat_id = 0
          this.sendBtn = '送信'
        })
        .catch(err => {
          this.message = ''
          this.chat_id = 0
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    scrollToEnd() {
      const chatLog = this.$refs.chatBox
      if (!chatLog) return
      chatLog.scrollTop = chatLog.scrollHeight
    },
    edit(chat_id, message) {
      this.chat_id = chat_id
      this.message = message
      this.sendBtn = '更新'
    },
  },
}
</script>
