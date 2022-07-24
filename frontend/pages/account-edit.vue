<template>
  <v-flex>
    <v-row class="mt-5 pa-0 justify-center">
      <v-card style="width: 80%" class="mt-0 pl-10 pb-10">
        <v-card style="width: 90%" class="ml-10 mt-5">
          <v-row class="mt-5 ml-5 pt-5">
            <v-col cols="4"><h2>基本情報</h2></v-col>
          </v-row>
          <v-row class="ml-5">
            <v-col cols="10"><v-text-field v-model="name" label="ニックネーム"></v-text-field></v-col>
          </v-row>
          <v-row class="ml-5">
            <v-col cols="10"><v-text-field v-model="email" label="メールアドレス" readonly></v-text-field></v-col>
          </v-row>
          <v-row style="float: right; margin-right: 15%">
            <api-event-button color="grey darken-4" class="mb-5" @click="saveAccount()"> 保存 </api-event-button>
            <!-- <v-col><v-btn @click="saveAccount()">保存</v-btn></v-col> -->
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
          <v-row>
            <v-col style="overflow: hidden !important; height: 25vh; overflow-y: auto" class="ml-5">
              <span v-if="skillName.length !== 0">
                <span v-for="skill in skillName" :key="skill" class="mr-1">
                  <v-chip :class="color(skill.categoryId)" class="white--text mb-1 mr-4"> {{ skill.name }}</v-chip>
                </span>
              </span>
              <span v-else
                ><v-chip :class="color(6)" class="white--text mb-1 ml-4">登録しているスキルなし</v-chip></span
              >
            </v-col>
          </v-row>
          <v-row>
            <v-col style="margin-left: 55%">
              <NuxtLink to="/skill-signup" style="text-decoration: none">
                <v-btn color="grey darken-4" class="white--text">登録</v-btn>
              </NuxtLink>
            </v-col>
            <v-col style="margin-right: 2%">
              <NuxtLink to="/skill-update" style="text-decoration: none">
                <!-- <api-event-button color="grey darken-4" class="mb-5 pr-5"> 更新 </api-event-button> -->
                <v-btn class="mb-5 white--text" color="grey darken-4">更新</v-btn>
              </NuxtLink>
            </v-col>
          </v-row>
        </v-card>
      </v-card>
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
      name: '',
      email: '',
      account: [],
      skillName: [],
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
  },
  mounted() {
    this.getAccount()
  },
  methods: {
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
    async getAccount() {
      this.name = this.$store.state.user.name
      this.email = this.$store.state.user.email
      console.log(this.$store.state.user)
      // const userId = this.$store.state.user.id
      // とりあえずid1の人の情報を出す時に利用
      const userId = 1
      await this.$axios
        .get(`${this.$urls.API}/users/${userId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          console.log(response.data)
          this.account = response.data
          for (let i = 0; i < this.account.user_skills.length; i++) {
            this.skillName.push({
              name: SkillInfo[this.account.user_skills[i].skill_id - 1].skillName,
              categoryId: SkillInfo[this.account.user_skills[i].skill_id - 1].skillCategory,
            })
          }
          this.skillName.sort(function (first, second) {
            if (first.categoryId > second.categoryId) {
              return 1
            } else if (first.categoryId < second.categoryId) {
              return -1
            } else {
              return 0
            }
          })
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
    saveAccount() {
      console.log(SkillInfo)
      // const userId = this.$store.state.user.id
      // とりあえずid1の人の情報を出す時に利用
      // const userId = 1
      // this.$axios
      //   .pose(`${this.$urls.API}/users/${userId}`)
      //   .then(response => {
      //     console.log(response.data)
      //     console.log('ちゃんと通っている')
      //     console.log(response.data)
      //     this.account = response.data
      //     for (let i = 0; i < this.account.user_skills.length; i++) {
      //       this.skillName.push({
      //         name: SkillInfo[this.account.user_skills[i].skill_id - 1].skillName,
      //         categoryId: SkillInfo[this.account.user_skills[i].skill_id - 1].skillCategory,
      //       })
      //     }
      //     console.log('表示されてる？')
      //     console.log(this.skillName)
      //   })
      //   .catch(err => {
      //     console.log('通ってないよー')
      //     console.log(err)
      //     return err.response
      //   })
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
