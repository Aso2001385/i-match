<template>
  <div class="box" style="position: relative">
    <CreateBulletinSkill
      v-if="openFlag"
      style="position: absolute; z-index: 2; top: 10%; width: 80%; margin-left: 10%"
    />
    <v-row class="justify-center mt-5">
      <v-flex>
        <v-row class="mt-5 pa-0 justify-center">
          <v-card style="width: 80%" class="pl-10 pb-0">
            <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
            <v-row class="mt-0 pa-0">
              <v-col cols="10">
                <v-text-field label="タイトル"></v-text-field>
              </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
              <v-col cols="10">
                <v-textarea
                  name="input-7-1"
                  label="概要"
                  value="一緒にプログラミングの勉強をしましょう！！"
                  hint="Hint text"
                ></v-textarea>
              </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
              <v-col cols="10" class="mt-5"
                ><div>
                  <v-menu
                    ref="menu"
                    v-model="menu"
                    :close-on-content-click="false"
                    :return-value.sync="date"
                    transition="scale-transition"
                    offset-y
                    min-width="auto"
                  >
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="date"
                        label="Picker in menu"
                        prepend-icon="mdi-calendar"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker v-model="date" no-title scrollable>
                      <v-spacer></v-spacer>
                      <v-btn text color="primary" @click="menu = false"> Cancel </v-btn>
                      <v-btn text color="primary" @click="$refs.menu.save(date)"> OK </v-btn>
                    </v-date-picker>
                  </v-menu>
                </div>
              </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
              <v-col cols="10" class="d-flex">
                <BulletinContent />
              </v-col>
            </v-row>

            <v-row class="mt-0 pa-0">
              <!-- <v-col cols="2"><v-card-title>●スキル</v-card-title></v-col> -->
              <v-col cols="12">
                <span v-for="value in chipSkills" :key="value" style="float: left" class="mt-2">
                  <v-chip :class="colors(value)" class="mr-2 mb-1 white--text" deletable-chips
                    >{{ value }}<v-icon dark right @click="deleteSkill(value)" small>mdi-minus-circle</v-icon></v-chip
                  > </span
                ><span style="float: left"
                  ><v-col
                    @click="openModal"
                    id="addSkill"
                    class="black--text"
                    style="background-color: white; border: 1px solid white"
                    >追加</v-col
                  ></span
                >
              </v-col>
            </v-row>
            <v-row class="pb-5 ml-10">
              <v-col style="text-align: center">
                <span class="mb-5">
                  <div class="justify-center">
                    <v-col id="addBulletin" style="width: 90%; text-align: center" @click="createBulletin">登録</v-col>
                  </div>
                </span>
              </v-col>
            </v-row>
          </v-card>
        </v-row>
      </v-flex>
    </v-row>
  </div>
</template>
<script defer>
export default {
  data() {
    return {
      menu: false,
      openFlag: false,
      inputText: '',
      bulletin: [],
      skills: [],
      levels: [],
      exps: [],
      skill: '',
      chipSkills: [],
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
    BulletinContent: () => import('../components/BulletinContent.vue'),
    CreateBulletinSkill: () => import('./create-bulletin-skill.vue'),
  },
  methods: {
    openModal() {
      this.openFlag = !this.openFlag
    },
    charaLimit(inputText) {
      return inputText.length > 30 ? inputText.slice(0, -1) : inputText
    },
    sessionClear() {
      sessionStorage.removeItem('skills')
      sessionStorage.removeItem('levels')
      sessionStorage.removeItem('exps')
    },
    createBulletin() {
      // axios
      //   .post('http://18.183.25.12/api/user', this.bulletin)
      //   .then(res => {
      //     this.$router.push({ name: '' })
      //   })
      //   .then(res => {
      //     console.log(res.data)
      //     this.$router.push('/bulletin-list')
      //   })
      //   .catch(error => {
      //     console.log(error)
      //   })

      // データベースに保存してセッションのスキルの中身を削除してから掲示板リストに遷移するようにしている
      this.sessionClear()
      this.$router.push('/bulletin-list')
    },
    getSession() {
      const skillBox = sessionStorage.getItem('skills')
      this.skills.push(skillBox)
      console.log(this.skills)
      this.skill = this.skills.toString().replace(/"/g, '').replace(',', '').replace(',', '・')
      const count = (this.skill.match(/,/g) || []).length
      console.log(count)
      for (let i = 0; i < count; i++) {
        this.skill = this.skill.replace(',', '・')
      }
      console.log(this.skill)
      this.chipSkills = this.skill.split('・')
      console.log(this.chipSkills)
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
    deleteSkill(value) {
      return this.chipSkills.splice(this.chipSkills.indexOf(value), 1)
    },
  },
  // },
  mounted() {
    this.getSession()
  },
}
</script>
<style lang="scss">
.background {
  background-color: grey;
  color: black;
}
#addBulletin {
  border: 1px solid grey;
  border-radius: 5px;
  background-color: grey;
  color: white;
}
#addBulletin:hover {
  background-color: white;
  color: orange;
  border: 1px solid orange;
}
#addSkill {
  border: 1px solid transparent;
  background-color: transparent;
  color: black;
}
#cloSkill {
  width: 3.5%;
  border: 1px solid grey;
  border-radius: 5px;
  background-color: gray;
  color: white;
}
#clo:hover {
  background-color: white;
  color: orange;
  border: 1px solid orange;
}
</style>
