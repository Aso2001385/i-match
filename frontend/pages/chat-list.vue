<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col class="ml-5 mt-4 pt-3">
        <h3 class="white--text">チャットリスト</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" style="overflow: hidden !important; height: 83vh; overflow-y: auto" class="pa-0 pb-1">
        <v-row style="width: 100%">
          <v-card v-for="room in rooms" :key="room.id" style="width: 100%" @click.prevent="next(room.id, room.name)">
            <v-row class="ml-5 mt-3 mb-5">
              <v-col cols="12" md="8" class="black--text ml-5 font-weight-bold" style="width: 80%">
                {{ room.name }}
              </v-col>
              <v-col cols="12" md="3" class="black--text font-weight-bold">{{ dateFormater(room.created_at) }}</v-col>
              <v-col cols="12" class="ml-5 grey--text darken-4" style="width: 80%">
                {{ room.message }}
              </v-col>
            </v-row>
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
      rooms: [],
    }
  },
  mounted() {
    this.getChatList()
  },
  methods: {
    getChatList() {
      this.$axios
        .get(`${this.$urls.API}/rooms/${this.$store.state.user.id}`)
        .then(response => {
          if (!response.data) return
          this.rooms = JSON.parse(JSON.stringify(response.data))

          this.rooms = this.rooms.map(v => {
            v.message = v.new_message.name + ' : ' + v.new_message.message
            v.message_created_at = v.new_message.created_at

            return v
          })
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    next(room_id, room_name) {
      this.$router.push({ path: 'chat-room', query: { id: room_id, name: room_name } })
    },
    dateFormater(material) {
      const dateTime = new Date(material)

      let format = dateTime.getFullYear() + '/' + dateTime.getMonth() + '/' + dateTime.getDate() + ' '
      format += dateTime.getHours() + ':' + dateTime.getMinutes()
      return format
    },
  },
}
</script>
