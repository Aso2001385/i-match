<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="6" class="ml-5 mt-4 pt-3">
        <h3 class="white--text">ユーザー投稿</h3>
      </v-col>
      <v-col class="d-flex mr-5 white--text" cols="2">
        <v-btn @click="sortSection(sortId)" class="mt-3"
          >{{ sortName[sortId] }}
          <v-icon aria-hidden="false">mdi-sync</v-icon>
        </v-btn>
      </v-col>
      <v-col cols="2" class="mt-4 pb-3">
        <h3 class="white--text">ユーザー情報</h3>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0 pb-1" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <MyBulletinList />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <div class="mt-2 text-h1 pl-10 pr-10 pt-5 justify-center">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </div>
            <strong style="font-size: 2rem">{{ account.name }}</strong>
            <p class="grey--text" style="font-size: 1rem">{{ account.email }}</p>
            <NuxtLink to="/account-edit" class="blue--text">
              <v-col>編集</v-col>
            </NuxtLink>
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
import SkillInfo from '~/assets/skillinfo.json'

export default {
  data() {
    return {
      sortName: ['新着順', '投稿順', '締切が近い順'],
      sortId: 0,
      skillName: [],
      account: [],
    }
  },
  mounted() {
    this.getAccount()
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    skills() {
      return this.$store.state.skills
    },
  },
  methods: {
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else if (sort === 1) {
        this.sortId = 2
      } else {
        this.sortId = 0
      }
    },
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
    getAccount() {
      // console.log('ユーザーの情報を持ってこれてるか確認')
      // console.log(this.$store.state.user)
      console.log(SkillInfo)
      const userId = this.$store.state.user.id
      // とりあえずid1の人の情報を出す時に利用
      // const userId = 1
      this.$axios
        .get(`${this.$urls.API}/users/${userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          this.account = response.data
          for (let i = 0; i < this.account.user_skills.length; i++) {
            this.skillName.push({
              name: SkillInfo[this.account.user_skills[i].id - 1].skillName,
              categoryId: SkillInfo[this.account.user_skills[i].id - 1].skillCategory,
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
  components: {
    MyBulletinList: () => import('../components/MyBulletinList.vue'),
  },
}
</script>
