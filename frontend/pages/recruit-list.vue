<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="12" class="mt-5 ml-10 pb-5">
        <NuxtLink to="/create-recruit" class="white--text" style="text-decoration: none">
          <strong><v-icon color="orange">mdi-plus-box</v-icon>掲示板作成</strong>
        </NuxtLink>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="pa-0" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <RecruitList />
      </v-col>

      <v-col cols="4">
        <SearchSkill />
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  components: {
    RecruitList: () => import('../components/RecruitList.vue'),
    SearchSkill: () => import('../components/SearchSkill.vue'),
  },
  data() {
    return {}
  },
  mounted() {
    // this.getRecruit()
    // this.submit()
  },
  methods: {
    submit() {
      this.$axios
        .get(`${this.$urls.API}/recruits/other/${this.$store.state.user.id}`)
        .then(response => {
          console.log('ちゃんと通っている１')
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
}
</script>
