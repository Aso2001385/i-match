<template>
  <v-container>
    <v-row class="pa-0" justify="center">
      <v-col cols="12" lg="12" md="12" sm="12" sx="12">
        <v-card style="width: 80%" class="pb-0 mx-auto px-10">
          <v-row class="mt-5">
            <v-col cols="11"><v-text-field v-model="detail.title" label="タイトル"></v-text-field></v-col>
          </v-row>
          <v-row class="mt-5">
            <v-col cols="11">
              <v-textarea
                v-model="detail.contents"
                name="input-7-1"
                label="概要"
                value="概要"
                hint="Hint text"
              ></v-textarea>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="11" class="mt-5"
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
                    <v-text-field v-model="date" label="募集期限日" readonly v-bind="attrs" v-on="on"></v-text-field>
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
                  class="pt-5"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-text-field v-model="time" label="募集期限時刻" readonly v-bind="attrs" v-on="on"></v-text-field>
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
          <v-row class="mt-0">
            <v-col cols="11">
              <v-select
                v-model="purpose"
                item-text="purpose"
                item-value="id"
                :items="purposes"
                attach
                color="grey darken-4"
                :item-color="white"
                label="カテゴリ"
                class="mb-0"
                style="width: 100%"
                return-object
              ></v-select>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="11">
              <v-select
                :items="numbersPeople"
                label="募集人数"
                item-text="parson"
                item-color="orange"
                v-model="person"
              ></v-select>
            </v-col>
          </v-row>
          <v-row class="mt-0">
            <v-col cols="4" class="mt-1 mb-5"><span style="color: grey">スキル</span></v-col>
            <v-col cols="10" class="ml-10">
              <span v-for="skill in skillName" :key="skill" class="mr-1">
                <v-chip :color="color(skill.categoryId)" class="white--text">
                  {{ skill.name }}
                </v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0 pb-15">
            <v-col>
              <v-row class="mt-5" justify="center">
                <v-col cols="12">
                  <api-event-button color="grey darken-4" :click-callback="updateBulletin"> 更新 </api-event-button>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
import Common from '~/plugins/common'

export default {
  data() {
    return {
      menu: false,
      menu2: false,
      time: '',
      date: '',
      numbersPeople: ['2', '3', '4', '5', '6', '7', '8', '9', '10'],
      bulletinDetailId: 0,
      detail: [],
      allSkill: [],
      skillName: [],
      purposes: [],
      purpose: '',
      person: '',
    }
  },
  computed: {
    skillUnits() {
      return this.$store.state.skills
    },
    primitiveSkills() {
      return this.$store.state.primitiveSkills
    },
  },
  mounted() {
    this.getSession()
    this.getBulletinDetail()
  },
  methods: {
    getSession() {
      // クリックされた掲示板の詳細を受け取るためのid
      // このidを利用してどの掲示板を更新するかを知る
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
      let priSkill = JSON.parse(JSON.stringify(this.$store.state.primitiveSkills))
      priSkill = Common.orderBy(priSkill, 'id', 'num', true)
      await this.$axios
        .get(`${this.$urls.API}/recruits/${this.bulletinDetailId}`)
        .then(response => {
          console.log('通ってるよー')
          console.log(response.data)
          this.detail = response.data
          console.log(this.detail.skills)
          console.log(this.detail.skills[0].skill_id - 1)
          for (let i = 0; i < this.detail.skills.length; i++) {
            this.skillName.push({
              name: priSkill[this.detail.skills[i].skill_id - 1].name,
              categoryId: priSkill[this.detail.skills[i].skill_id - 1].category_id,
            })
          }
          this.purposes.push(this.detail.purpose)
          if (this.detail.purpose === '開発') {
            console.log('開発がきた')
            this.purposes.push('勉強会')
            this.purposes.push('その他')
          } else if (this.detail.purpose === '勉強会') {
            console.log('勉強会がきた')
            this.purposes.push('開発')
            this.purposes.push('その他')
          } else {
            this.purposes.push('開発')
            this.purposes.push('勉強会')
          }
          console.log(this.purposes)
        })
        .catch(err => {
          console.log('通ってないよー!')
          return err.response
        })
    },
    // 更新処理
    async updateBulletin() {
      const skillList = []
      for (let i = 0; i < this.detail.skills.length; i++) {
        skillList.push({ skil_id: this.detail.skills[i].skill_id, level: this.detail.skills[i].level })
      }
      const sendBulletin = {
        title: this.detail.title,
        contents: this.detail.contents,
        purpose: this.purpose,
        persons: Number(this.person),
        due: this.date + ' ' + this.time + ':' + 0 + 0,
      }
      console.log(sendBulletin)
      await this.$axios
        .put(`${this.$urls.API}/recruits/${this.bulletinDetailId}`, sendBulletin)
        .then(response => {
          console.log('通ってるよー')
          console.log(response.data)
          // 更新に成功したらページの遷移をする
          alert('更新成功しました。')
          this.$router.push(`/account`)
        })
        .catch(err => {
          console.log('通ってないよー!')
          alert('更新失敗しました。')
          return err.response
        })
    },
  },
}
</script>
