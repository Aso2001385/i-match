<template>
  <v-flex>
    <v-row class="grey darken-2">
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      sortName: ['新着順', '投稿順', '締切が近い順'],
      sortId: 0,
      userId: 1,
      name: '',
      email: '',
    }
  },
  mounted() {
    this.getAccount()
  },
  methods: {
    getAccount() {
      this.$axios
        .get(`${this.$urls.API}/ac`)
        .then(response => {
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
