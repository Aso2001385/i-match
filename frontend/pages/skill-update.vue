<template>
  <v-flex>
    <v-row class="mt-15 pa-0 pt-15" justify="center">
      <v-col cols="8">
        <v-card class="mt-10 pb-0">
          <v-row class="mt-5 pt-5 ml-15">
            <v-col cols="12"><h2>スキル更新</h2></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="oldPassword" label="現在のパスワード"></v-text-field></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="password" label="新しいパスワード"></v-text-field></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="confPassword" label="新しいパスワード確認"></v-text-field></v-col>
          </v-row>
          <v-row class="mt-5 pb-5" style="width: 80%; margin-left: 10%">
            <v-col cols="12">
              <api-event-button color="grey darken-4" @click="updatePass">更新</api-event-button>
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
      detail: [],
      allSkill: [],
      skillName: [],
    }
  },
  computed: {
    skillUnits() {
      return this.$store.state.skills
    },
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
    async getBulletinDetail() {
      await this.$axios
        .get(`${this.$urls.API}/recruits/${this.bulletinDetailId}`)
        .then(response => {
          console.log('通ってるよー')
          console.log(response.data)
          this.detail = response.data
          console.log(this.detail.skills[0].skill_id - 1)
          for (let i = 0; i < this.detail.skills.length; i++) {
            this.skillName.push({
              name: SkillInfo[this.detail.skills[i].skill_id - 1].skillName,
              categoryId: SkillInfo[this.detail.skills[i].skill_id - 1].skillCategory,
              level: this.detail.skills[i].level,
            })
          }
        })
        .catch(err => {
          console.log('通ってないよー!')
          return err.response
        })
    },
  },
}
</script>
