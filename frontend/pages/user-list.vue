<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col><h3 class="white--text ma-5 pt-2">ユーザーリスト</h3></v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="pb-5" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-card v-for="userList in cnt" :key="userList">
          <v-row>
            <v-col cols="12"
              ><p style="text-align: right" class="mr-5 mb-1" @click="session(userIdList[userList])">
                <NuxtLink to="/otherparty-account" class="white--text text-h6" style="text-decoration: none"
                  ><v-icon class="text-h3" aria-hidden="false">mdi-chat-processing-outline</v-icon></NuxtLink
                >
              </p></v-col
            >
          </v-row>
          <v-row>
            <v-col cols="11" class="ml-10 mt-0">
              <h2>{{ nameList[userList] }}</h2>
            </v-col>
          </v-row>
          <v-row>
            <v-col cols="12" class="ml-0 pa-0">
              <p style="text-align: right; width: 90%">
                <span v-for="skillList in 5" :key="skillList" class="text-h4 ml-0 pa-0">◯</span>
              </p>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
      <v-col cols="4">
        <SearchSkill />
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      userId: 1,
      firstName: '',
      userIdList: [],
      nameList: [],
      nameTitle: [],
      cnt: 0,
      userCount: 0,
      userSkillId: [],
      langSea: [],
      frameSea: [],
      dbSea: [],
      infSea: [],
      othSea: [],
      userInfo: 0,
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
  components: {
    SearchSkill: () => import('../components/SearchSkill.vue'),
  },
  mounted() {
    this.getUser()
  },
  methods: {
    session(value) {
      console.log(value)
      sessionStorage.setItem('userInfo', value)
    },
    async getUser() {
      await this.$axios
        // .get('http://localhost:8080/api/users')
        .get('http://3.113.81.143/api/users')
        .then(response => {
          console.log('ちゃんと通っている')
          this.userCount = response.data.length
          for (let i = 0; i < this.userCount; i++) {
            this.userIdList.push(response.data[i].id)
            this.nameList.push(response.data[i].name)
            this.nameTitle.push(response.data[i].name)
          }
          // this.userIdList.shift()
          this.nameTitle.shift()

          console.log(this.nameTitle[0])
          const count = this.nameTitle.length
          this.cnt = count

          console.log(response.data)
          console.log(this.nameList)
          console.log(this.userIdList)
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
    },
  },
}
</script>
