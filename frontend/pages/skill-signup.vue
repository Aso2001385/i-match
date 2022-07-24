<template>
  <v-flex>
    <v-row class="mt-15 pa-0 pt-15" justify="center">
      <v-col cols="8">
        <v-card class="mt-10 pb-0">
          <v-row class="mt-5 pt-5 ml-15">
            <v-col cols="12"><h2>スキル登録</h2></v-col>
          </v-row>
          <v-row justify="center">
            <v-col cols="8">
              <v-select
                v-model="selectSkill"
                item-text="name"
                item-value="id"
                :items="unselSkill"
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
                item-text="name"
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
            <v-col cols="8">
              <api-event-button color="grey darken-4" @click="sendSkill">登録</api-event-button>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
import ApiEventButton from '~/components/ui/ApiEventButton.vue'
import SkillInfo from '~/assets/skillinfo.json'

export default {
  components: {
    ApiEventButton,
  },
  data() {
    return {
      bulletinDetailId: 0,
      //   detail: [],
      //   allSkill: [],
      selectSkill: '',
      selectLevel: 99,
      skillId: [],
      // 選択されていないスキル集
      unselSkill: [],
      levels: [1, 2, 3, 4, 5],
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
    skillUnits() {
      return this.$store.state.skills
    },
  },
  mounted() {
    this.getSession()
    this.getSkills()
  },

  // 自分の情報から持っているスキルのidを取得してselectに表示するものを考える。

  methods: {
    getSession() {
      // クリックされた掲示板の詳細を受け取るためのid
      //   this.bulletinDetailId = sessionStorage.getItem('bulletinDetail')

      console.log(SkillInfo)
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
      // ユーザーのスキルidが配列で格納してある
      //   const userId = this.$store.state.user.id
      console.log(this.$store.state.user.user_skills)
      const userId = 1
      await this.$axios
        .get(`${this.$urls.API}/users/${userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          const account = response.data
          for (let i = 0; i < account.user_skills.length; i++) {
            this.skillId.push(account.user_skills[i].skill_id)
          }
          for (let i = 0; i < SkillInfo.length; i++) {
            if (this.skillId.includes(SkillInfo[i].id)) {
              console.log('既に登録されているスキル')
            } else {
              this.unselSkill.push({ categoryId: SkillInfo[i].skillCategory, name: SkillInfo[i].skillName })
            }
          }
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    async sendSkill() {
      // ユーザーのスキルidが配列で格納してある
      // const userId = this.$store.state.user.id
      let id = 0
      for (let i = 0; i < this.unselSkill.length; i++) {
        if (this.unselSkill[i].name === this.selectSkill) {
          id = this.unselSkill[i].categoryId
          break
        }
      }
      //   型が違う
      const skill = {
        category_id: id,
        name: this.selectSkill,
      }
      console.log(this.$store.state.user.user_skills)
      await this.$axios
        .post(`${this.$urls.API}/skills`, skill)
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
