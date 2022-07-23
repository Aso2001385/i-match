<template>
  <v-container>
    <v-row v-for="bulletin in youBulletins" :key="bulletin.id">
      <!-- <span v-if="bulletin.user_id === setUserId()"> -->
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 pl-15">
            <v-col cols="4" class="ml-8"
              >募集締め切り：<span>{{ bulletin.due }}</span></v-col
            >
            <v-col cols="4"
              >募集人数：<span>3</span>/<span>{{ bulletin.persons }}</span
              >人</v-col
            >
            <v-col cols="12"
              ><h2 class="ml-8">{{ bulletin.title }}</h2></v-col
            >
          </v-row>
          <v-row class="pl-12">
            <v-col cols="8" class="ml-10" justify="center">
              <div style="width: 70%" id="bulletin_skill">
                <!-- 何個スキルを表示するか -->
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
      <!-- </span> -->
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
    // skillCount(cnt) {
    //   return this.bulletinSkillCount[cnt - 1]
    // },
    // getSkillId() {
    //   this.boxSkill = this.boxSkill + 1
    //   return this.bulletinSkillId[this.boxSkill]
    // },
    async getBulletin() {
      console.log('相手のゆーざーidが何かを確かめる')
      console.log(this.userId)
      const userId = this.userId
      console.log(userId)
      await this.$axios
        .get(`${this.$urls.API}/recruits`)
        .then(response => {
          this.bulletins = response.data
          for (let i = 0; i < this.bulletins.length; i++) {
            console.log('行われているかの確認')
            console.log(this.bulletins[i].user_id)
            console.log(this.userId)
            console.log(Number(this.userId) === this.bulletins[i].user_id)
            if (Number(this.userId) === this.bulletins[i].user_id) {
              this.youBulletins.push(this.bulletins[i])
            }
          }
          console.log(response.data)
          console.log('どんな値かの確認')
          console.log(this.youBulletins)
          console.log(this.bulletins[0].user_id)
          // return response.data
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
    // sendData() {},
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
