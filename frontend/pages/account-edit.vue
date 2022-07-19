<template>
  <v-flex>
    <v-row class="mt-5 pa-0 justify-center">
      <v-card style="width: 80%" class="mt-0 pl-10 pb-10">
        <!-- <v-row class="mt-2 pa-0">
          <v-col cols="4"><v-card-title class="text-h1">〇</v-card-title></v-col>
          <NuxtLink to="/bulletin-detail" style="text-decoration: none">
             <v-col>画像変更</v-col>
            </NuxtLink>
          <v-col cols="7" class="mt-10"><v-btn>画像変更</v-btn></v-col>
        </v-row> -->
        <v-card style="width: 90%" class="ml-10 mt-5">
          <v-row class="mt-5 ml-5 pt-5">
            <v-col cols="4"><h2>基本情報</h2></v-col>
          </v-row>
          <v-row class="ml-5">
            <v-col cols="10"
              ><v-text-field v-model="name" label="ニックネーム" @change="informationBull"></v-text-field
            ></v-col>
          </v-row>
          <v-row class="ml-5">
            <v-col cols="10"
              ><v-text-field v-model="email" label="メールアドレス" @change="informationBull"></v-text-field
            ></v-col>
          </v-row>
          <v-row style="float: right; margin-right: 10%">
            <v-col><v-btn>保存</v-btn></v-col>
          </v-row>
          <v-row class="ml-5 pb-10 mr-10">
            <NuxtLink to="/update-password" class="blue--text">
              <v-col cols="12">
                <span>パスワード変更</span>
              </v-col>
            </NuxtLink></v-row
          >
        </v-card>

        <v-card style="width: 90%" class="ml-10">
          <v-row class="mt-5 ml-5 pt-5">
            <v-col cols="4"><h2>スキル情報</h2></v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" id="user_bulletin_skill"
              ><span v-for="value in langList" :key="value">
                <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" id="user_bulletin_skill"
              ><span v-for="value in frameList" :key="value">
                <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" id="user_bulletin_skill"
              ><span v-for="value in dbList" :key="value">
                <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" id="user_bulletin_skill"
              ><span v-for="value in infrList" :key="value">
                <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row style="width: 100%" class="ml-5">
            <v-col cols="12" id="user_bulletin_skill"
              ><span v-for="value in othList" :key="value">
                <v-chip :class="colors(value)" class="mr-2 white--text" small>{{ value }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row>
            <v-col style="float: right; margin-left: 60%">
              <v-btn class="mb-5" href="skill-signup">登録</v-btn>
            </v-col>
            <v-col>
              <v-btn class="mb-5" href="skill-update">更新</v-btn>
            </v-col>
          </v-row>
        </v-card>
        <!-- <v-row style="text-align: center">
          <v-col><v-btn class="mb-5" href="account">更新</v-btn></v-col>
        </v-row> -->
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      userId: 1,
      name: '',
      email: '',
      langList: ['Java', 'Swift', 'HTML', 'Kotlin'],
      frameList: ['Laravel', 'Flask', 'Spring', 'React'],
      dbList: ['MySQL', 'MongoDB', 'SQLite', 'MariaDB'],
      infrList: ['AWS', 'Linux', 'Azure', 'iOS'],
      othList: ['figma', 'GitHub', 'git', 'Swagger'],
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
    this.getAccount()
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
    getAccount() {
      this.$axios
        // .get('http://localhost:8080/api/users?id=this.userId')
        .get(`https://localhost:8080/api/users/${this.userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data[0])
          this.name = response.data[0].name
          this.email = response.data[0].email
          console.log(response.data[0])
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
      alert('通ったっす！')
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
#user_bulletin_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style>
