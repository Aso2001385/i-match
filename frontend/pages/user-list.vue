<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col class="ml-5 mt-4 pt-3"><h3 class="white--text">ユーザーリスト</h3></v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="pb-5" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row justify="center">
          <v-col cols="5" v-for="user in userList" :key="user">
            <v-card style="height: 15vh" class="pt-5 pl-3">
              <v-row>
                <v-col cols="9">
                  <strong>{{ user.name }}</strong>
                </v-col>
                <v-col cols="1">
                  <NuxtLink to="/otherparty-account" class="white--text text-h6" style="text-decoration: none">
                    <v-icon class="text-h4" aria-hidden="false" @click="setSession(user.id)" small
                      >mdi-account-details</v-icon
                    >
                  </NuxtLink>
                </v-col>
              </v-row>
              <v-row class="pl-3">
                <div style="width: 70%" id="bulletin_skill">
                  <span v-for="skill in user.skills" :key="skill">
                    <v-chip :class="categoryColor[skill.category_name] + ' mr-2 white--text'" small>{{
                      skill.name
                    }}</v-chip>
                  </span>
                </div>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="4">
        <SearchSkill />
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
// import SkillInfo from '~/assets/skillinfo.json'

export default {
  components: {
    SearchSkill: () => import('../components/SearchSkill.vue'),
  },
  data() {
    return {
      userList: [],
      categoryColor: {
        language: 'red',
        framework: 'blue',
        database: 'green',
        infrastructure: 'purple',
        other: 'indigo darken -3',
      },
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    skills() {
      return this.$store.state.skills
    },
  },
  mounted() {
    this.getUser()
  },
  methods: {
    setSession(value) {
      sessionStorage.setItem('userInfo', value)
    },
    async getUser() {
      await this.$axios
        .get(`${this.$urls.API}/users`)
        .then(response => {
          const cnt = this.$store.state.user.id - 1
          this.userList = response.data
          this.userList.splice(cnt, 1)
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
    },
  },
}
</script>
<!-- <style lang="scss">
#bulletin_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style> -->
