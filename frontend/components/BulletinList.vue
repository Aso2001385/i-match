<template>
  <v-container>
    <v-row v-for="bulletin in bulletins" :key="bulletin.id">
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
                <span class="black--text" @click="getSession(bulletin.id)">Read More </span>
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
      bulletins: [],
      bulletinCount: 0,
      boxSkill: -1,
      categoryColor: {
        language: 'red',
        framework: 'blue',
        database: 'green',
        infrastructure: 'purple',
        other: 'indigo darken -3',
      },
      sendSearch: [],
      searchFlg: 0,
      searchIds: [],
    }
  },
  mounted() {
    this.sendSearch = JSON.parse(sessionStorage.getItem('sendSearch'))
    this.searchFlg = sessionStorage.getItem('searchFlg')
    this.searchId()
    this.getBulletin()
    // this.bulletins = this.getBulletin()
  },
  methods: {
    getSession(value) {
      // どの掲示板の詳細を表示するか
      sessionStorage.setItem('bulletinDetail', value)
    },
    skillCount(cnt) {
      return this.bulletinSkillCount[cnt - 1]
    },
    getSkillId() {
      this.boxSkill = this.boxSkill + 1
      return this.bulletinSkillId[this.boxSkill]
    },
    searchId() {
      for (let i = 0; i < this.sendSearch.length; i++) {
        this.searchIds.push(this.sendSearch[i].id)
      }
    },
    getBulletin() {
      this.$axios
        .get(`${this.$urls.API}/recruits`)
        .then(response => {
          if (Number(this.searchFlg) === 0) {
            // 検索なし
            this.bulletins = response.data
            // console.log('yesを通る')
          } else {
            // 検索あり
            // 60件
            const searchBulletin = response.data
            // console.log('Noを通る')
            // console.log(searchBulletin)
            // console.log(searchBulletin[0].skills)
            // console.log('存在するか')
            // console.log(this.sendSearch.length)

            for (let a = 0; a < searchBulletin.length; a++) {
              console.log(1)
              for (let i = 0; i < searchBulletin[a].skills.length; i++) {
                for (let j = 0; j < this.sendSearch.length; j++) {
                  if (searchBulletin[a].skills[i].skill_id === this.sendSearch[j].id) {
                    this.bulletins.push(searchBulletin[a])
                  }
                }
              }
            }
            const sendSearch = []
            sessionStorage.setItem('sendSearch', JSON.stringify(sendSearch))
            sessionStorage.setItem('searchFlg', 0)
            // console.log(this.bulletins)
          }

          return response.data
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
    sendData() {},
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
