<template>
  <v-container>
    <v-row v-for="bulletin in bulletins" :key="bulletin.id">
      <v-col v-if="bulletin.user_id !== Number(userId)" cols="12" class="ma-0">
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
              <div id="bulletin_skill" style="width: 70%">
                <!-- 何個スキルを表示するか -->
                <span v-for="skill in bulletin.skills" :key="skill.id">
                  <!-- <v-chip :class="color(skill.skill_id) + ' mr-2 white--text'" small> -->
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
// import SkillInfo from '~/assets/skillinfo.json'

export default {
  data() {
    return {
      userId: 0,
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
  computed: {
    user() {
      return this.$store.state.user
    },
  },
  mounted() {
    this.sendSearch = JSON.parse(sessionStorage.getItem('sendSearch'))
    this.searchFlg = sessionStorage.getItem('searchFlg')
    this.searchId()
    this.getBulletin()
  },
  methods: {
    getSession(value) {
      // どの掲示板の詳細を表示するか
      sessionStorage.setItem('bulletinDetail', value)
    },
    color(value) {
      if (value < 16) {
        return 'red'
      } else if (value < 31) {
        return 'blue'
      } else if (value < 37) {
        return 'green'
      } else if (value < 48) {
        return 'purple'
      } else {
        return 'indigo darken-3'
      }
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
      this.userId = this.$store.state.user.id

      this.$axios
        .get(`${this.$urls.API}/recruits/other/${this.$store.state.user.id}`)
        .then(response => {
          if (Number(this.searchFlg) === 0) {
            // 検索なし
            this.bulletins = response.data
          } else {
            // 検索あり
            for (let a = 0; a < response.data.length; a++) {
              for (let i = 0; i < response.data[a].skills.length; i++) {
                for (let j = 0; j < this.sendSearch.length; j++) {
                  if (response.data[a].skills[i].skill_id === this.sendSearch[j].id) {
                    this.bulletins.push(response.data[a])
                  }
                }
              }
            }
            const sendSearch = []
            sessionStorage.setItem('sendSearch', JSON.stringify(sendSearch))
            sessionStorage.setItem('searchFlg', 0)
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
