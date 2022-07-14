<template>
  <v-row>
    <v-col cols="12" class="pl-3 mt-2">
      <v-row class="justify-center mb-1">
        <v-col>
          <v-row>
            <v-col cols="6"
              ><p style="text-align: center"><v-btn color="green">検索</v-btn></p></v-col
            >
            <v-col cols="6">
              <v-btn color="orange" @click="alldeleteSkill()">clear<v-icon dark right>mdi-minus-circle</v-icon></v-btn>
            </v-col>
            <v-col cols="12" style="overflow: hidden !important; height: 15vh; overflow-y: auto"
              ><span v-for="value in allSkill" :key="value">
                <v-chip :class="colors(value)" class="mr-2 mb-1 white--text" deletable-chips small
                  >{{ value }}<v-icon dark right @click="deleteSkill(value)" small>mdi-minus-circle</v-icon></v-chip
                >
              </span>
            </v-col>
          </v-row>
        </v-col>
        <v-row style="overflow: hidden !important; height: 60vh; overflow-y: auto; padding-bottom: 80%">
          <v-col cols="12" sm="11">
            <v-select
              v-model="langSea"
              item-text="skillName"
              item-value="value"
              :items="langs"
              attach
              color="red"
              item-color="red"
              label="言語"
              class="mb-0 skillLang ml-10"
              style="width: 80%"
            ></v-select>
          </v-col>
          <v-col cols="11" sm="11">
            <v-select
              v-model="frameSea"
              item-text="skillName"
              item-value="value"
              :items="frameworks"
              attach
              color="blue"
              item-color="blue"
              class="ml-10"
              label="フレームワーク"
              style="width: 80%"
            ></v-select>
          </v-col>
          <v-col cols="11" sm="11">
            <v-select
              v-model="dbSea"
              item-text="skillName"
              item-value="value"
              :items="dbs"
              attach
              color="green"
              item-color="green"
              class="ml-10"
              label="DB"
              style="width: 80%"
            ></v-select>
          </v-col>
          <v-col cols="11" sm="11">
            <v-select
              v-model="infSea"
              item-text="skillName"
              item-value="value"
              :items="infs"
              attach
              color="purple"
              item-color="purple"
              class="ml-10"
              label="インフラ"
              style="width: 80%"
            ></v-select>
          </v-col>
          <v-col cols="11" sm="11">
            <v-select
              v-model="othSea"
              item-text="skillName"
              item-value="value"
              :items="oths"
              attach
              color="lightgrey"
              item-color="lightgrey"
              class="ml-10"
              label="その他"
              style="width: 80%"
            ></v-select>
          </v-col>
        </v-row>
      </v-row>
    </v-col>
  </v-row>
</template>
<script defer>
export default {
  data() {
    return {
      allSkill: [],
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
  methods: {
    deleteSkill(value) {
      return this.allSkill.splice(this.allSkill.indexOf(value), 1)
    },
    alldeleteSkill() {
      return this.allSkill.splice(0, this.allSkill.length)
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
  },

  computed: {
    langSea: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('lang-set')
        if (!this.allSkill.includes(val)) {
          this.allSkill.push(val)
          // console.log(this.allSkill.indexOf(this.langSea))
        } else {
          const prace = this.allSkill.indexOf(val)
          console.log(prace)
          // this.allSkill.splice(prace, 1)
        }
      },
    },
    frameSea: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
        if (!this.allSkill.includes(val)) {
          this.allSkill.push(val)
          // console.log(this.allSkill.indexOf(val))
        } else {
          const prace = this.allSkill.indexOf(val)
          console.log(prace)
          // this.allSkill.splice(prace, 1)
        }
      },
    },
    dbSea: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
        if (!this.allSkill.includes(val)) {
          this.allSkill.push(val)
          // console.log(this.allSkill.indexOf(val))
        } else {
          const prace = this.allSkill.indexOf(val)
          console.log(prace)
          // this.allSkill.splice(prace, 1)
        }
      },
    },
    infSea: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
        if (!this.allSkill.includes(val)) {
          this.allSkill.push(val)
          console.log(this.allSkill.indexOf(val))
        } else {
          const prace = this.allSkill.indexOf(val)
          console.log(prace)
          // this.allSkill.splice(prace, 1)
        }
      },
    },
    othSea: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
        if (!this.allSkill.includes(val)) {
          this.allSkill.push(val)
          console.log(this.allSkill.indexOf(val))
        } else {
          const prace = this.allSkill.indexOf(val)
          console.log(prace)
          // this.allSkill.splice(prace, 1)
        }
      },
    },
  },
}
</script>
