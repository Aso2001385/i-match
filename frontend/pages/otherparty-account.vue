<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="6" class="ml-5 mt-4 pt-3">
        <h3 class="white--text">ユーザー投稿</h3>
      </v-col>
      <v-col class="d-flex mr-5 white--text" cols="2">
        <p class="mt-3">
          <v-icon aria-hidden="false" style="color: transparent">mdi-sync</v-icon>
        </p>
      </v-col>
      <v-col cols="2" class="mt-4 pb-3">
        <h3 class="white--text">ユーザー情報</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0 pb-1" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <YouBulletinList />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <p class="mt-2 text-h1 pl-10 pr-10 pt-5">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </p>
            <strong style="font-size: 2rem">{{ account.name }}</strong>
          </v-card>
        </v-row>
        <v-row class="justify-center">
          <v-card style="width: 40vh" class="pa-5">
            <v-card-title class="pl-5 pr-10 pt-1">スキル一覧</v-card-title>
            <v-col style="overflow: hidden !important; height: 25vh; overflow-y: auto">
              <span v-if="skillName.length !== 0">
                <span v-for="skill in skillName" :key="skill" class="mr-1">
                  <v-chip :class="color(skill.categoryId)" class="white--text mb-1">{{ skill.name }}</v-chip>
                </span>
              </span>
              <span v-else><v-chip :class="color(6)" class="white--text mb-1">登録しているスキルなし</v-chip></span>
            </v-col>
          </v-card>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
import Common from '~/plugins/common'

export default {
  components: {
    YouBulletinList: () => import('../components/YouBulletinList.vue'),
  },
  data() {
    return {
      sortName: ['新着順', '投稿順'],
      sortId: 0,
      userId: '',
      account: [],
      skillName: [],
    }
  },
  computed: {
    primitiveSkills() {
      return this.$store.state.primitiveSkills
    },
  },
  mounted() {
    this.getSession()
    this.otherpartyAccount()
  },
  methods: {
    getSession() {
      // クリックされた相手の情報
      this.userId = sessionStorage.getItem('userInfo')
    },
    // sortSection(sort) {
    //   if (sort === 0) {
    //     this.sortId = 1
    //   } else if (sort === 1) {
    //     this.sortId = 2
    //   } else {
    //     this.sortId = 0
    //   }
    // },
    color(value) {
      console.log(value)
      if (value === 1) {
        return 'red'
      } else if (value === 2) {
        return 'blue'
      } else if (value === 3) {
        return 'green'
      } else if (value === 4) {
        return 'purple'
      } else if (value === 5) {
        return 'indigo darken-3'
      } else {
        return 'black'
      }
    },
    otherpartyAccount() {
      let priSkill = JSON.parse(JSON.stringify(this.$store.state.primitiveSkills))
      priSkill = Common.orderBy(priSkill, 'id', 'num', true)
      this.$axios
        .get(`${this.$urls.API}/users/${this.userId}`)
        .then(response => {
          console.log('通っている')
          this.account = response.data
          for (let i = 0; i < this.account.user_skills.length; i++) {
            this.skillName.push({
              name: priSkill[this.account.user_skills[i].skill_id - 1].name,
              categoryId: priSkill[this.account.user_skills[i].skill_id - 1].category_id,
            })
          }
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
