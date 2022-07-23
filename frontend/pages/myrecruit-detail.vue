<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
      <v-card style="width: 80%" class="ml-10 pl-10 pb-0">
        <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●タイトル：</v-card-title></v-col>
          <v-col cols="8" class="text-h6">
            <v-text-field v-model="title" label="タイトル" readonly></v-text-field>
          </v-col>
          <v-col cols="2"
            ><v-chip>{{ purpose }}</v-chip></v-col
          >
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="12"><v-card-title>●概要</v-card-title></v-col>
        </v-row>
        <v-row class="mt-0 pa-0" style="width: 95%; overflow: hidden !important; height: 20vh; overflow-y: auto">
          <v-col cols="12">
            <v-text-field v-model="contets" label="概要" readonly></v-text-field>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2" class="mt-5">
            <v-text-field v-model="persons" label="募集人数" readonly></v-text-field>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2" class="mt-5">
            <v-text-field v-model="due" label="募集期間" readonly></v-text-field>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="4" class="d-flex"> </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●スキル</v-card-title></v-col>
          <v-col cols="10" class="ml-10">
            <span v-for="value in skills" :key="value">
              <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
            </span>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <NuxtLink to="/myrecruit-detail-edit" style="text-decoration: none">
              <v-row class="justify-center ml-10" style="width: 90%">
                <v-col
                  id="addSkill"
                  cos="12"
                  class="mb-5 mt-3 pb-5"
                  style="border: 1px solid lightgrey; text-align: center"
                  >編集</v-col
                >
              </v-row>
            </NuxtLink>
          </v-col>
        </v-row>
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      recruitDetailId: 0,
      title: '',
      contents: '',
      purpose: '',
      due: '',
      persons: 0,
      //   仮
      skills: [
        'Java',
        'Swift',
        'HTML',
        'Kotlin',
        'Laravel',
        'Flask',
        'Spring',
        'React',
        'AWS',
        'Linux',
        'Azure',
        'iOS',
      ],
      langs: [
        { id: 1, skillCategory: 0, skillName: 'Java' },
        { id: 2, skillCategory: 0, skillName: 'PHP' },
        { id: 3, skillCategory: 0, skillName: 'JavaScript' },
        { id: 4, skillCategory: 0, skillName: 'Python' },
        { id: 5, skillCategory: 0, skillName: 'C' },
        { id: 6, skillCategory: 0, skillName: 'C++' },
        { id: 7, skillCategory: 0, skillName: 'C#' },
        { id: 8, skillCategory: 0, skillName: 'GO' },
        { id: 9, skillCategory: 0, skillName: 'Kotlin' },
        { id: 10, skillCategory: 0, skillName: 'Swift' },
        { id: 11, skillCategory: 0, skillName: 'Ruby' },
        { id: 12, skillCategory: 0, skillName: 'HTML' },
        { id: 13, skillCategory: 0, skillName: 'CSS' },
        { id: 14, skillCategory: 0, skillName: 'SQL' },
        { id: 15, skillCategory: 0, skillName: 'mark down' },
      ],
      frameworks: [
        { id: 16, skillCategory: 1, skillName: 'Spring' },
        { id: 17, skillCategory: 1, skillName: 'Laravel' },
        { id: 18, skillCategory: 1, skillName: 'CakePHP' },
        { id: 19, skillCategory: 1, skillName: 'Symfony' },
        { id: 20, skillCategory: 1, skillName: 'React' },
        { id: 21, skillCategory: 1, skillName: 'Angular' },
        { id: 22, skillCategory: 1, skillName: 'Vue.js' },
        { id: 23, skillCategory: 1, skillName: 'Next.js' },
        { id: 24, skillCategory: 1, skillName: 'Nuxt.js' },
        { id: 25, skillCategory: 1, skillName: 'Django' },
        { id: 26, skillCategory: 1, skillName: 'Flask' },
        { id: 27, skillCategory: 1, skillName: 'Qt' },
        { id: 28, skillCategory: 1, skillName: 'Sinatra' },
        { id: 29, skillCategory: 1, skillName: 'Tailwind CSS' },
        { id: 30, skillCategory: 1, skillName: 'Bulma' },
      ],
      dbs: [
        { id: 31, skillCategory: 2, skillName: 'PostgreSQL' },
        { id: 32, skillCategory: 2, skillName: 'Oracle Database' },
        { id: 33, skillCategory: 2, skillName: 'MongoDB' },
        { id: 34, skillCategory: 2, skillName: 'MySQL' },
        { id: 35, skillCategory: 2, skillName: 'SQLite' },
        { id: 36, skillCategory: 2, skillName: 'MariaDB' },
      ],
      infs: [
        { id: 37, skillCategory: 3, skillName: 'Linux' },
        { id: 38, skillCategory: 3, skillName: 'Windows' },
        { id: 39, skillCategory: 3, skillName: 'iOS' },
        { id: 40, skillCategory: 3, skillName: 'Andoroid' },
        { id: 41, skillCategory: 3, skillName: 'AWS' },
        { id: 42, skillCategory: 3, skillName: 'Azure' },
        { id: 43, skillCategory: 3, skillName: 'Google Cloud' },
        { id: 44, skillCategory: 3, skillName: 'Firebase' },
        { id: 45, skillCategory: 3, skillName: 'Salesforce' },
        { id: 46, skillCategory: 3, skillName: 'Docker' },
        { id: 47, skillCategory: 3, skillName: 'xampp' },
      ],
      oths: [
        { id: 48, skillCategory: 4, skillName: 'figma' },
        { id: 49, skillCategory: 4, skillName: 'GitHub' },
        { id: 50, skillCategory: 4, skillName: 'git' },
        { id: 51, skillCategory: 4, skillName: 'Swagger' },
        { id: 52, skillCategory: 4, skillName: 'Postman' },
        { id: 53, skillCategory: 4, skillName: 'Node.js' },
      ],
    }
  },
  mounted() {
    this.getSession()
    this.getRecruitDetail()
  },
  methods: {
    getSession() {
      // クリックされた掲示板の詳細を受け取るためのid
      this.recruitDetailId = sessionStorage.getItem('recruitDetail')
    },
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
      console.log(this.chipSkills)
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
    getRecruitDetail() {
      this.$axios
        .get(`${this.$urls.API}/recruits/${this.recruitDetailId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          this.title = response.data.title
          this.contents = response.data.contents
          this.purpose = response.data.purpose
          this.due = response.data.due
          this.persons = response.data.persons

          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
    },
  },
}
</script>
<style lang="scss">
#addSkill {
  border: 1px solid grey;
  border-radius: 5px;
  background-color: grey;
  color: white;
}
#addSkill:hover {
  background-color: white;
  color: orange;
  border: 1px solid orange;
}
</style>
