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
        <BulletinList :bulletinFlg="2" />
      </v-col>
      <v-col cols="4" class="pl-3 mt-2" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row class="justify-center mb-1">
          <v-card style="text-align: center; width: 40vh" class="pa-10">
            <div class="mt-2 text-h1 pl-10 pr-10 pt-5 justify-center">
              <v-icon class="text-h1 ma-3" aria-hidden="false">mdi-account</v-icon>
            </div>
            <strong style="font-size: 2rem">{{ name }}</strong>
            <p class="grey--text" style="font-size: 1rem">{{ email }}</p>
            <NuxtLink to="/account-edit" class="blue--text">
              <v-col>編集</v-col>
            </NuxtLink>
          </v-card>
        </v-row>
        <v-row class="justify-center">
          <v-card style="width: 40vh" class="pa-5">
            <v-card-title class="pl-5 pr-10 pt-1">スキル一覧</v-card-title>
            <v-col style="overflow: hidden !important; height: 25vh; overflow-y: auto">
              <!-- <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%">言語</p> -->
              <!-- <span v-for="skill in this.skills" :key="skill.id"> -->
              <!-- <v-chip color="red" class="ml-1 mr-1 mb-1 white--text">{{ this.skill.name }}</v-chip> -->
              <!-- </span> -->

              <!-- <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">
                フレームワーク
              </p> -->
              <!-- <div v-for="cnt in 4" :key="cnt">-->
              <span v-for="skill in skillName" :key="skill">
                <v-chip :class="color(skill)">{{ skill }}</v-chip>
              </span>
              <!-- </div> -->
              <!-- <v-chip v-for="n in 5" :key="n" color="blue" class="ml-1 mr-1 mb-1 white--text">Laravel</v-chip> -->
              <!-- <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">DB</p> -->
              <!-- <v-chip v-for="n in 5" :key="n" color="green" class="ml-1 mr-1 mb-1 white--text">MySQL</v-chip> -->
              <!-- <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">インフラ</p> -->
              <!-- <v-chip v-for="n in 5" :key="n" color="purple" class="ml-1 mr-1 mb-1 white--text">AWS</v-chip> -->
              <!-- <p style="border-bottom: 1px solid lightgrey; width: 95%; margin-left: 1.5%" class="mt-3">その他</p> -->
              <!-- <v-chip v-for="n in 5" :key="n" color="grey" class="ml-1 mr-1 mb-1 white--text">figma</v-chip> -->
            </v-col>
          </v-card>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      sortName: ['新着順', '投稿順', '締切が近い順'],
      sortId: 0,
      userId: 2,
      name: '',
      email: '',
      skillInfo: [],
      users: [],
      userSkill: [],
      skillIds: [],
      skillName: [],
      skill: [
        { id: 0, skillCategory: 0, skillName: 'Java' },
        { id: 1, skillCategory: 0, skillName: 'PHP' },
        { id: 2, skillCategory: 0, skillName: 'JavaScript' },
        { id: 3, skillCategory: 0, skillName: 'Python' },
        { id: 4, skillCategory: 0, skillName: 'C' },
        { id: 5, skillCategory: 0, skillName: 'C++' },
        { id: 6, skillCategory: 0, skillName: 'C#' },
        { id: 7, skillCategory: 0, skillName: 'GO' },
        { id: 8, skillCategory: 0, skillName: 'Kotlin' },
        { id: 9, skillCategory: 0, skillName: 'Swift' },
        { id: 10, skillCategory: 0, skillName: 'Ruby' },
        { id: 11, skillCategory: 0, skillName: 'HTML' },
        { id: 12, skillCategory: 0, skillName: 'CSS' },
        { id: 13, skillCategory: 0, skillName: 'SQL' },
        { id: 14, skillCategory: 0, skillName: 'mark down' },
        { id: 15, skillCategory: 1, skillName: 'Spring' },
        { id: 16, skillCategory: 1, skillName: 'Laravel' },
        { id: 17, skillCategory: 1, skillName: 'CakePHP' },
        { id: 18, skillCategory: 1, skillName: 'Symfony' },
        { id: 19, skillCategory: 1, skillName: 'React' },
        { id: 20, skillCategory: 1, skillName: 'Angular' },
        { id: 21, skillCategory: 1, skillName: 'Vue.js' },
        { id: 22, skillCategory: 1, skillName: 'Next.js' },
        { id: 23, skillCategory: 1, skillName: 'Nuxt.js' },
        { id: 24, skillCategory: 1, skillName: 'Django' },
        { id: 25, skillCategory: 1, skillName: 'Flask' },
        { id: 26, skillCategory: 1, skillName: 'Qt' },
        { id: 27, skillCategory: 1, skillName: 'Sinatra' },
        { id: 28, skillCategory: 1, skillName: 'Tailwind CSS' },
        { id: 29, skillCategory: 1, skillName: 'Bulma' },
        { id: 30, skillCategory: 2, skillName: 'PostgreSQL' },
        { id: 31, skillCategory: 2, skillName: 'Oracle Database' },
        { id: 32, skillCategory: 2, skillName: 'MongoDB' },
        { id: 33, skillCategory: 2, skillName: 'MySQL' },
        { id: 34, skillCategory: 2, skillName: 'SQLite' },
        { id: 35, skillCategory: 2, skillName: 'MariaDB' },
        { id: 36, skillCategory: 3, skillName: 'Linux' },
        { id: 37, skillCategory: 3, skillName: 'Windows' },
        { id: 38, skillCategory: 3, skillName: 'iOS' },
        { id: 39, skillCategory: 3, skillName: 'Andoroid' },
        { id: 40, skillCategory: 3, skillName: 'AWS' },
        { id: 41, skillCategory: 3, skillName: 'Azure' },
        { id: 42, skillCategory: 3, skillName: 'Google Cloud' },
        { id: 43, skillCategory: 3, skillName: 'Firebase' },
        { id: 44, skillCategory: 3, skillName: 'Salesforce' },
        { id: 45, skillCategory: 3, skillName: 'Docker' },
        { id: 46, skillCategory: 3, skillName: 'xampp' },
        { id: 47, skillCategory: 4, skillName: 'figma' },
        { id: 48, skillCategory: 4, skillName: 'GitHub' },
        { id: 49, skillCategory: 4, skillName: 'git' },
        { id: 50, skillCategory: 4, skillName: 'Swagger' },
        { id: 51, skillCategory: 4, skillName: 'Postman' },
        { id: 52, skillCategory: 4, skillName: 'Node.js' },
      ],
    }
  },
  mounted() {
    this.getAccount()
    this.userInfo()
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    // 全てのスキルの情報格納
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
    colors(name) {
      console.log(name)
      console.log(this.langs[0].skillName)
      for (let i = 0; i < this.langs.length; i++) {
        if (this.langs[i].skillName.includes(name)) {
          return 'red'
        }
      }
      for (let i = 0; i < this.frameworks.length; i++) {
        if (this.frameworks[i].skillName.includes(name)) {
          return 'blue'
        }
      }
      for (let i = 0; i < this.dbs.length; i++) {
        if (this.dbs[i].skillName.includes(name)) {
          return 'green'
        }
      }
      for (let i = 0; i < this.infs.length; i++) {
        if (this.infs[i].skillName.includes(name)) {
          return 'purple'
        }
      }
      return 'indigo darken-3'
    },
    getAccount() {
      // this.userId = this.user.id
      this.$axios
        // .get(`https://i-match.click/api/users/${this.userId}`)
        .get(`https://i-match.click/api/users/${this.userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          this.name = response.data.name
          this.email = response.data.email
          // console.log(this.email)
          this.skills = response.data.user_skills
          // console.log(this.skills)
          // console.log(response.data)
          // 使えるスキルのid
          for (let i = 0; i < response.data.user_skills.length; i++) {
            this.skillIds.push(response.data.user_skills[i].skill_id)
          }
          console.log('自分が利用できるスキルID')
          console.log(this.skills[1].skills[1].name)
          console.log(this.skillIds)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
      console.log('読み込まれているかの確認1')
    },

    async userInfo() {
      console.log('読み込まれているかの確認2')
      // ここにスキルの情報を格納していく
      // 各カテゴリごと
      for (let j = 0; j < 5; j++) {
        console.log('読み込まれているかの確認3')
        console.log(this.skillIds)
        console.log(this.skills[1].skill.length)
        // console.log('利用できるスキルID')
        for (let i = 0; i < this.skillIds.length; i++) {
          // カテゴリごとに保存されている詳細スキルを一つずつ見ていく
          console.log('カテゴリごとに保存されている詳細スキルを一つずつ見ていく')
          console.log(this.skills[1].skill.length)
          // 2と６
          for (let a = 0; a < this.skills[j].skills.length; a++) {
            if ((this.skills[j].this.skills[a].id = this.skillIds[i])) {
              await this.skillName.push({ name: this.skills[j].skills[a].name, color: this.skills[j].color })
            }
          }
        }
      }
      console.log('オブジェクトの中身')
      console.log(this.skillName)
    },
  },
  components: {
    BulletinList: () => import('../components/BulletinList.vue'),
  },
}
</script>
