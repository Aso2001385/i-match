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
              <p style="float: right">
                <NuxtLink to="/otherparty-account" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="text-h3" aria-hidden="false" @click="setSession(user.id)"
                    >mdi-chat-processing-outline</v-icon
                  ></NuxtLink
                >
              </p>
              <p>
                <strong>{{ user.name }}</strong>
              </p>
              <div style="width: 70%" id="bulletin_skill">
                <span v-for="skill in user.skills" :key="skill">
                  <v-chip :class="categoryColor[skill.category_name] + ' mr-2 white--text mt-5'" small>{{
                    skill.name
                  }}</v-chip>
                </span>
              </div>
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
          console.log('ちゃんと通っているよ！！')
          console.log(response.data)
          console.log('ユーサーのストアの中身を見る')
          console.log(this.$store.state.user)
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
<style lang="scss">
#bulletin_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style>
