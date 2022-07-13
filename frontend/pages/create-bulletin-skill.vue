<template>
  <v-row class="justify-center">
    <v-col cols="6">
      <v-card class="pb-10" style="background-color: whitesmoke; border-radius: 10px">
        <v-row class="mb-5 ml-10">
          <v-col cols="10">スキル</v-col>
        </v-row>
        <div style="border: 1px solid lightgrey; width: 85%" class="ma-0 pb-5">
          <v-row style="text-align: center">
            <v-col class="text-h4 mt-3">スキルカード</v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon x-large>mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="paramsSkill.name"
                    item-text="skillName"
                    item-value="value"
                    :items="devSkill"
                    attach
                    label="利用スキル"
                    class="mb-0"
                  >
                  </v-select> </v-col
              ></v-row>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon large>mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="paramsSkill.lev"
                    item-text="levels"
                    item-value="value"
                    :items="devLevel"
                    attach
                    label="レベル"
                    class="mb-0"
                  >
                  </v-select>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon color="transparent">mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="exp"
                    item-text="exps"
                    item-value="value"
                    :items="devExp"
                    attach
                    label="開発経験"
                    class="mb-0"
                  ></v-select>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </div>
        <v-row class="justify-center mt-5 pa-1">
          <v-btn href="create-bulletin" id="addSkill" class="mr-15">戻る</v-btn>
          <v-btn href="create-bulletin" id="addSkill" class="ml-15" @click="sessionSet">追加</v-btn>
          <!-- <span href="create-bulletin" id="addSkill" class="ml-15" @click="sessionSet">見てみる</span> -->
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>
<script defer>
export default {
  data() {
    return {
      EXP: '',
      devSkill: [
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
      devExp: [
        { id: 0, exps: 'あり' },
        { id: 1, exps: 'なし' },
      ],
      devLevel: [
        { id: 0, levels: 1 },
        { id: 1, levels: 2 },
        { id: 2, levels: 3 },
        { id: 3, levels: 4 },
        { id: 4, levels: 5 },
      ],
      paramsSkill: {
        name: '',
        lev: 99,
        expBool: true,
      },
      skills: [],
      levels: [],
      exps: [],
      bulletinSkills: [],
    }
  },
  methods: {
    sessionSet() {
      if (this.exp === 'あり') {
        this.$set(this.paramsSkill, 'expBool', true)
      } else {
        this.$set(this.paramsSkill, 'expBool', false)
      }
      console.log(JSON.stringify(this.paramsSkill.name))
      this.skills.push(JSON.stringify(this.paramsSkill.name))
      this.levels.push(JSON.stringify(this.paramsSkill.lev))
      this.exps.push(JSON.stringify(this.paramsSkill.expBool))
      console.log(this.skills)

      sessionStorage.setItem('skills', this.skills)
      sessionStorage.setItem('levels', this.levels)
      sessionStorage.setItem('exps', this.exps)
    },
    getSession() {
      const skillBox = sessionStorage.getItem('skills')
      const levelBox = sessionStorage.getItem('levels')
      const expBox = sessionStorage.getItem('exps')
      this.skills.push(skillBox)
      this.levels.push(levelBox)
      this.exps.push(expBox)
    },
  },
  computed: {
    exp: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
      },
    },
    level: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
      },
    },
  },
  mounted() {
    this.getSession()
  },
  // mounted() {
  //   axios
  //     // .get('http://18.183.25.12/api/user') awsのURL
  //     .get('http://localhost:8000/api/user')
  //     .then(res => {
  //       console.log(res.data)
  //       this.message = res.data
  //     })
  //     .catch(error => {
  //       console.log(error)
  //     })
  // },
  //   async asyncData({ $axios }) {
  // 	// 取得先のURL
  // const url = "https://qiita.com/api/v2/items";
  // 	// リクエスト（Get）
  // const response = await $axios.$get(url);
  // 	// 配列で返ってくるのでJSONにして返却
  // 	return {
  // 		posts: response
  // 	};
  // },
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
