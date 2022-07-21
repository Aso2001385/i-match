<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
      <v-card style="width: 80%" class="ml-10 pl-10 pb-0">
        <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
        <v-row class="mt-0 pa-0">
          <v-col cols="10"
            ><v-text-field v-model="tit" label="タイトル" @change="informationBull"></v-text-field
          ></v-col>
          <v-col cols="2"
            ><v-chip>{{ purpose }}</v-chip></v-col
          >
        </v-row>
        <v-row class="mt-0 pa-0" style="width: 95%; overflow: hidden !important; height: 20vh; overflow-y: auto">
          <v-col cols="10">
            <v-textarea
              v-model="content"
              name="input-7-1"
              label="概要"
              hint="Hint text"
              @change="informationBull"
            ></v-textarea>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●募集人数：</v-card-title></v-col>
          <v-col cols="2" class="mt-5"
            >3/<span>{{ persons }}</span
            >人</v-col
          >
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
                    label="募集期限日"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    @change="informationBull"
                  ></v-text-field>
                </template>
                <v-date-picker v-model="date" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="menu = false"> Cancel </v-btn>
                  <v-btn text color="primary" @click="$refs.menu.save(date)"> OK </v-btn>
                </v-date-picker>
              </v-menu>

              <v-menu
                ref="menu2"
                v-model="menu2"
                :close-on-content-click="false"
                :nudge-right="40"
                :return-value.sync="time"
                transition="scale-transition"
                offset-y
                max-width="290px"
                min-width="290px"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="time"
                    label="募集期限時刻"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    @change="informationBull"
                  ></v-text-field>
                </template>
                <v-time-picker
                  v-if="menu2"
                  v-model="time"
                  full-width
                  @click:minute="$refs.menu2.save(time)"
                ></v-time-picker>
              </v-menu>
            </div>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="4" class="d-flex"> </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>スキル</v-card-title></v-col>
          <v-col cols="10" class="ml-10">
            <span v-for="value in skills" :key="value">
              <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
            </span>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-row class="justify-center ml-10" style="width: 90%">
              <NuxtLink to="/bulletin-detail" style="text-decoration: none"
                ><v-col id="addSkill" cos="6" class="mb-5 mt-3 pb-5" style="border: 1px solid lightgrey"
                  >戻る</v-col
                ></NuxtLink
              >
              <NuxtLink to="/account" style="text-decoration: none"
                ><v-col
                  id="addSkill"
                  cos="6"
                  class="mb-5 mt-3 pb-5"
                  style="border: 1px solid lightgrey"
                  @click="sendBulletinInfo"
                  >更新</v-col
                ></NuxtLink
              >
            </v-row>
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
      menu: false,
      menu2: false,
      bulletinDetailId: 0,
      title: '',
      contents: '',
      purpose: '',
      due: '',
      date: '',
      time: '',
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

      //  ログインしている自分のidを利用して掲示板の更新をしていく
      userId: 1,
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
    this.getBulletinDetail()
  },
  methods: {
    getSession() {
      // クリックされた掲示板の詳細を受け取るためのid
      this.bulletinDetailId = sessionStorage.getItem('bulletinDetail')
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
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else if (sort === 1) {
        this.sortId = 2
      } else {
        this.sortId = 0
      }
    },
    getBulletinDetail() {
      this.$axios
        .get(`https://i-match.click/api/recruits/${this.bulletinDetailId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          this.title = response.data.title
          this.contents = response.data.contents
          this.purpose = response.data.purpose
          this.due = response.data.due
          this.skills = response.data.skills
          this.persons = response.data.persons
          const splitDue = this.due.split(' ')
          // 日にちと時間で分けたデータをそれぞれの変数に格納
          this.date = splitDue[0]
          this.time = splitDue[1]

          // 期限日と期限時刻に分ける
          console.log(splitDue)
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
    },
    sendBulletinInfo() {
      const second = 0
      // 更新ボタンで掲示板の内容を更新する
      const updateBulletin = {
        title: this.title,
        contents: this.contents,
        purpose: this.purpose,
        persons: this.persons,
        due: sessionStorage.getItem('infoDate') + ' ' + sessionStorage.getItem('infoTime') + ':' + second + second,
        skills: this.skills,
      }
      this.$axios
        .put(`https://localhost:8080/api/recruits/${this.userId}`, updateBulletin)
        .then(response => {
          console.log('ちゃんと通っている')

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
