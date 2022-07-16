<template>
  <v-container>
    <v-row v-for="value in bulletinCount" :key="value">
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 pl-15">
            <v-col cols="4" class="ml-8"
              >募集締め切り：<span>{{ dueList[value] }}</span></v-col
            >
            <v-col cols="4"
              >募集人数：<span>3</span>/<span>{{ personsList[value] }}</span
              >人</v-col
            >
            <v-col cols="12"
              ><h2 class="ml-8">{{ bulletinList[value] }}</h2></v-col
            >
          </v-row>
          <v-row class="pl-12">
            <v-col cols="8" class="ml-10" justify="center">
              <div style="width: 70%" id="bulletin_skill">
                <span v-for="value in allSkill" :key="value">
                  <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
                </span>
              </div>
            </v-col>
            <NuxtLink to="/bulletin-detail" class="white--text" style="text-decoration: none">
              <v-col cols="12" md="12" class="ml-10">
                <span class="black--text">Read More </span>
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
      bulletinCount: 0,
      bulletinList: [],
      // skillIdList: [],
      dueList: [],
      personsList: [],
      allSkill: ['Java', 'Python', 'Spring', 'C', 'AWS', 'figma', 'Kotlin', 'C#', 'Qt', 'Flask'],
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
    this.getBulletin()
  },
  methods: {
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
    getBulletin() {
      this.$axios
        .get('http://54.65.0.194/api/recruits')
        // .get('http://localhost:8080/api/recruits')
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          console.log('内容確認')
          this.bulletinCount = response.data.length
          for (let i = 0; i < response.data.length; i++) {
            this.bulletinList.push(response.data[i].title)
            // this.skillIdList[response.data[0].skill]
            this.dueList.push(response.data[i].due)
            this.personsList.push(response.data[i].persons)
          }
          console.log(response.data[0].contents)
          // this.$router.push('/bulletin-list')
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
      // alert('通ったっす！')
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
