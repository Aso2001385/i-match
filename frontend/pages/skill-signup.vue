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
                v-model="selectSkillId"
                item-text="name"
                item-value="id"
                :items="unselSkill"
                attach
                color="grey darken-4"
                :item-color="white"
                label="スキル"
                class="mb-0"
                style="width: 100%"
              />
            </v-col>
          </v-row>

          <v-row class="mt-5 pb-5" justify="center">
            <v-col cols="8">
              <ApiEventButton color="grey darken-4" :click-callback="sendSkill">登録</ApiEventButton>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
// import SkillInfo from '~/assets/skillinfo.json'
import Common from '~/plugins/common'

export default {
  data() {
    return {
      bulletinDetailId: 0,
      selectSkill: '',
      selectLevel: 99,
      skillId: [],
      // 選択されていないスキル集
      unselSkill: [],
      levels: [1, 2, 3, 4, 5],
      selectSkillId: '',
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
      // クリックされた掲示板の詳細を受け取るためのid
      //   this.bulletinDetailId = sessionStorage.getItem('bulletinDetail')
    },
    // sortSection(sort) {
    //   if (sort === 0) {
    //     this.sortId = 1
    //   } else if (sort === 1) {
    //     this.sortId = 2
    //   } else {
    //     this.sortId = 0
    //   }
    // },
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
      const userId = this.$store.state.user.id
      // const userId = 1
      let priSkill = JSON.parse(JSON.stringify(this.$store.state.primitiveSkills))
      priSkill = Common.orderBy(priSkill, 'id', 'num', true)
      await this.$axios
        .get(`${this.$urls.API}/users/${userId}`)
        .then(response => {
          const account = response.data

          for (let i = 0; i < account.user_skills.length; i++) {
            this.skillId.push(account.user_skills[i].skill_id)
          }

          for (let i = 0; i < priSkill.length; i++) {
            if (!this.skillId.includes(priSkill[i].id))
              this.unselSkill.push({ id: priSkill[i].id, name: priSkill[i].name })
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

      const SKILL = {
        user_id: this.$store.state.user.id,
        skill_id: this.selectSkillId,
        level: 3,
      }

      console.log(SKILL)
      await this.$axios
        .post(`${this.$urls.API}/user-skill`, SKILL)
        .then(response => {
          alert('登録しました。')
          this.$router.push(`/account-edit`)
        })
        .catch(err => {
          alert('登録失敗しました。')
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
