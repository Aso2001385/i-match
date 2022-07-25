<template>
  <v-flex>
    <v-row class="mt-15 pa-0 pt-15" justify="center">
      <v-col cols="8">
        <v-card class="mt-10 pb-0">
          <v-row class="mt-5 pt-5 ml-15">
            <v-col cols="12"><h2>スキル更新</h2></v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="8">
              <v-select
                v-model="selectName"
                item-text="name"
                item-value="id"
                :items="skills"
                attach
                color="grey darken-4"
                :item-color="white"
                label="スキル"
                class="mb-0"
                style="width: 100%"
                return-object
              ></v-select>
            </v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="8">
              <v-select
                v-model="selectLevel"
                item-text="level"
                item-value="id"
                :items="levels"
                attach
                color="grey darken-4"
                :item-color="white"
                label="レベル"
                class="mb-0"
                style="width: 100%"
                return-object
              ></v-select>
            </v-col>
          </v-row>
          <v-row class="mt-5 pb-5" justify="center">
            <v-col cols="6">
              <ApiEventButton color="grey darken-4" :click-callback="sendSkill">更新</ApiEventButton>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
// import ApiEventButton from '~/components/ApiEventButton.vue'
// import SkillInfo from '~/assets/skillinfo.json'
// import Common from '~/plugins/common'

export default {
  data() {
    return {
      bulletinDetailId: 0,
      selectName: '',
      selectLevel: 99,
      skillId: [],
      skillLev: [],
      // 選択されていないスキル集
      skills: [],
      // 選択されたスキルの名前
      skill: '',
      levels: [1, 2, 3, 4, 5],
      // 選択されたレベル値
      level: 0,
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    skillUnits() {
      return this.$store.state.skills
    },
    primitiveSkills() {
      return this.$store.state.primitiveSkills
    },
  },
  mounted() {
    this.getSession()
    this.getSkills()
  },

  // 自分の情報から持っているスキルのidを取得してselectに表示するものを考える。

  methods: {
    getSession() {
      console.log(this.$store.state.user)
      // console.log(SkillInfo)
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
    color(value) {
      console.log(value)
      if (value === 1) {
        return 'red'
      } else if (value === 2) {
        return 'blue'
      } else if (value === 3) {
        return 'green'
      } else if (value === 4) {
        return 'purple'
      } else {
        return 'indigo darken-3'
      }
    },
    async getSkills() {
      // const userId = this.$store.state.user.id
      // テストでid1の人のデータを入れていた
      const userId = 1

      // let priSkill = JSON.parse(JSON.stringify(this.$store.state.primitiveSkills))
      // priSkill = Common.orderBy(priSkill, 'id', 'num', true)
      await this.$axios
        .get(`${this.$urls.API}/users/${userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          const account = response.data
          for (let i = 0; i < account.user_skills.length; i++) {
            this.skills.push({
              id: account.user_skills[i].skill_id,
              name: account.user_skills[i].name,
              level: account.user_skills[i].level,
            })
            this.skillId.push(account.user_skills[i].skill_id)
            this.skillLev.push(account.user_skills[i].level)
          }
          // id入っている
          console.log(this.skills)
          // for (let i = 0; i < SkillInfo.length; i++) {
          //   if (this.skillId.includes(SkillInfo[i].id)) {
          //     this.skills.push({ categoryId: SkillInfo[i].skillCategory, name: SkillInfo[i].skillName })
          //   }
          // }
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    levelUp() {},
    async sendSkill() {
      // ユーザーのスキルidが配列で格納してある
      // const userId = this.$store.state.user.id
      let id = 0
      for (let i = 0; i < this.skills.length; i++) {
        console.log(this.skills[i].name)
        console.log(this.selectName.name)
        console.log(this.skills[i].name === this.selectName.name)
        if (this.skills[i].name === this.selectName.name) {
          id = this.skills[i].id
          break
        }
      }
      console.log(this.skills)
      const skill = {
        user_id: 1,
        skill_id: id,
        level: this.selectLevel,
      }
      console.log(skill)
      await this.$axios
        .put(`${this.$urls.API}/user-skill`, skill)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          alert('登録しました。')
          this.$router.push(`/account-edit`)
        })
        .catch(err => {
          console.log('通ってないよー')
          alert('登録失敗しました。')
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
