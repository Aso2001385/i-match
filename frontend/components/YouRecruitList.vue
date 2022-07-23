<template>
  <v-container>
    <v-row v-for="value in recruitCount" :key="value">
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 pl-15 ml-2">
            <v-col cols="4" class="ml-2"
              >締め切り：<span>{{ dueList[value] }}</span></v-col
            >
            <v-col cols="4"
              >募集人数：<span>3</span>/<span>{{ personsList[value] }}</span
              >人</v-col
            ></v-row
          >
          <v-row class="pl-15 ml-2">
            <v-col cols="12" class="ml-2"
              ><h2>{{ recruitList[value] }}</h2></v-col
            >
          </v-row>
          <v-row class="pl-12">
            <v-col cols="8" class="ml-10" justify="center">
              <div style="width: 70%" id="recruit_skill">
                <span v-for="skllValue in skillCount(value)" :key="skllValue">
                  <v-chip :class="colors(skllValue)" class="mr-2 white--text" small>{{ getSkillId() }}</v-chip>
                </span>
              </div>
            </v-col>
            <NuxtLink to="/recruit-detail" class="white--text" style="text-decoration: none">
              <v-col cols="12" md="12" class="ml-8">
                <span class="black--text" @click="getRecruitDetail(recruitIdList[value])">Read More </span>
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
      recruitCount: 0,
      recruitIdList: [],
      recruitList: [],
      // userId: 0,
      dueList: [],
      personsList: [],
      allSkill: ['Java', 'Python', 'Spring', 'C', 'AWS', 'figma', 'Kotlin', 'C#', 'Qt', 'Flask'],
      recruitSkillId: [],
      recruitSkillCount: [],
      boxSkill: -1,
      langs: [
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
      ],
      frameworks: [
        { id: 0, skillCategory: 1, skillName: 'Spring' },
        { id: 1, skillCategory: 1, skillName: 'Laravel' },
        { id: 2, skillCategory: 1, skillName: 'CakePHP' },
        { id: 3, skillCategory: 1, skillName: 'Symfony' },
        { id: 4, skillCategory: 1, skillName: 'React' },
        { id: 5, skillCategory: 1, skillName: 'Angular' },
        { id: 6, skillCategory: 1, skillName: 'Vue.js' },
        { id: 7, skillCategory: 1, skillName: 'Next.js' },
        { id: 8, skillCategory: 1, skillName: 'Nuxt.js' },
        { id: 9, skillCategory: 1, skillName: 'Django' },
        { id: 10, skillCategory: 1, skillName: 'Flask' },
        { id: 11, skillCategory: 1, skillName: 'Qt' },
        { id: 12, skillCategory: 1, skillName: 'Sinatra' },
        { id: 13, skillCategory: 1, skillName: 'Tailwind CSS' },
        { id: 14, skillCategory: 1, skillName: 'Bulma' },
      ],
      dbs: [
        { id: 0, skillCategory: 2, skillName: 'PostgreSQL' },
        { id: 1, skillCategory: 2, skillName: 'Oracle Database' },
        { id: 2, skillCategory: 2, skillName: 'MongoDB' },
        { id: 3, skillCategory: 2, skillName: 'MySQL' },
        { id: 4, skillCategory: 2, skillName: 'SQLite' },
        { id: 5, skillCategory: 2, skillName: 'MariaDB' },
      ],
      infs: [
        { id: 0, skillCategory: 3, skillName: 'Linux' },
        { id: 1, skillCategory: 3, skillName: 'Windows' },
        { id: 2, skillCategory: 3, skillName: 'iOS' },
        { id: 3, skillCategory: 3, skillName: 'Andoroid' },
        { id: 4, skillCategory: 3, skillName: 'AWS' },
        { id: 5, skillCategory: 3, skillName: 'Azure' },
        { id: 6, skillCategory: 3, skillName: 'Google Cloud' },
        { id: 7, skillCategory: 3, skillName: 'Firebase' },
        { id: 8, skillCategory: 3, skillName: 'Salesforce' },
        { id: 9, skillCategory: 3, skillName: 'Docker' },
        { id: 10, skillCategory: 3, skillName: 'xampp' },
      ],
      oths: [
        { id: 0, skillCategory: 4, skillName: 'figma' },
        { id: 1, skillCategory: 4, skillName: 'GitHub' },
        { id: 2, skillCategory: 4, skillName: 'git' },
        { id: 3, skillCategory: 4, skillName: 'Swagger' },
        { id: 4, skillCategory: 4, skillName: 'Postman' },
        { id: 5, skillCategory: 4, skillName: 'Node.js' },
      ],
    }
  },
  mounted() {
    this.getSession()
    this.getRecruit()
  },
  methods: {
    getRecruitDetail(value) {
      sessionStorage.setItem('recruitDetail', value)
    },
    getSession() {
      // とりあえず2の情報を取得
      this.userId = 2
    },
    colors(name) {
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
    skillCount(cnt) {
      return this.recruitSkillCount[cnt - 1]
    },
    getSkillId() {
      this.boxSkill = this.boxSkill + 1
      return this.recruitSkillId[this.boxSkill]
    },
    async getRecruit() {
      await this.$axios
        .get(`${this.$urls.API}/recruits${this.userId}`)
        .then(response => {
          console.log('ちゃんと通っている相手の情報')
          this.recruitCount = response.data.length
          for (let i = 0; i < response.data.length; i++) {
            if (this.userId === response.data[i].user_id) {
              this.recruitList.push(response.data[i].title)
              this.dueList.push(response.data[i].due)
              this.personsList.push(response.data[i].persons)
              this.recruitIdList.push(response.data[i].id)
              this.recruitSkillCount.push(response.data[i].skills.length)
              for (let j = 0; j < response.data[i].skills.length; j++) {
                this.recruitSkillId.push(response.data[i].skills[j].skill_id)
              }
            } else {
              console.log('別の人の情報')
            }
          }
          this.recruitCount = this.recruitIdList.length
          this.recruitIdList.push(this.recruitIdList[0])
          this.recruitList.push(this.recruitList[0])
          this.dueList.push(this.dueList[0])
          this.personsList.push(this.personsList[0])
          this.recruitIdList.unshift(this.recruitIdList[0])
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
<style lang="scss">
#recruit_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style>
