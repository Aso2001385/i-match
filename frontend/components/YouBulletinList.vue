<template>
  <v-container>
    <v-row v-for="bulletin in youBulletins" :key="bulletin.id">
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 pl-15">
            <v-col cols="4" class="ml-8">締め切り：{{ bulletin.due }}</v-col>
            <v-col cols="4">募集人数：{{ bulletin.persons }}人</v-col>
            <v-col cols="12"
              ><h2 class="ml-8">{{ bulletin.title }}</h2></v-col
            >
          </v-row>
          <v-row class="pl-12">
            <v-col cols="8" class="ml-10" justify="center">
              <div style="width: 70%" id="bulletin_skill">
                <span v-for="skill in bulletin.skills" :key="skill.id">
                  <v-chip :class="categoryColor[skill.category_name] + ' mr-2 white--text'" small>
                    {{ skill.name }}
                  </v-chip>
                </span>
              </div>
            </v-col>
            <NuxtLink to="/bulletin-detail" class="white--text" style="text-decoration: none">
              <v-col cols="12" md="12" class="ml-10">
                <span class="black--text" @click="sendSession(bulletin.id)">Read More </span>
              </v-col>
            </NuxtLink>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
export default {
  data() {
    return {
      userId: '',
      bulletins: [],
      youBulletins: [],
      bulletinCount: 0,
      boxSkill: -1,
      categoryColor: {
        language: 'red',
        framework: 'blue',
        database: 'green',
        infrastructure: 'purple',
        other: 'indigo darken -3',
      },
    }
  },
  mounted() {
    this.getSession()
    this.getBulletin()
  },
  methods: {
    getSession() {
      // クリックされた掲示板の詳細を受け取るためのid
      this.userId = sessionStorage.getItem('userInfo')
    },
    sendSession(value) {
      // どの掲示板の詳細を表示するか
      sessionStorage.setItem('bulletinDetail', value)
    },
    setUserId() {
      return this.userId
    },
    async getBulletin() {
      const userId = this.userId
      console.log(userId)
      await this.$axios
        .get(`${this.$urls.API}/recruits`)
        .then(response => {
          this.bulletins = response.data
          for (let i = 0; i < this.bulletins.length; i++) {
            if (Number(this.userId) === this.bulletins[i].user_id) {
              this.youBulletins.push(this.bulletins[i])
            }
          }
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
