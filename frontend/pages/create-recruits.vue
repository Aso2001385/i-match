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
                <!-- <v-text-field label="タイトル" @change="informationBull(1, tit)">{{
                  sessionStorage.getItem('infoContent')
                }}</v-text-field> -->
                <v-text-field v-model="tit" label="タイトル" @change="informationBull"></v-text-field>
              </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
              <v-col cols="10">
                <v-textarea
                  v-model="content"
                  name="input-7-1"
                  label="概要"
                  value="一緒にプログラミングの勉強をしましょう！！"
                  hint="Hint text"
                  @change="informationBull"
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
              <v-col cols="10" class="d-flex">
                <BulletinContent />
              </v-col>
            </v-row>

            <v-row class="mt-0 pa-0">
              <v-col cols="12">
                <span v-for="value in chipSkills" :key="value" style="float: left" class="mt-2">
                  <v-chip :class="colors(value)" class="mr-2 mb-1 white--text" deletable-chips
                    >{{ value }}<v-icon dark right small @click="deleteSkill(value)">mdi-minus-circle</v-icon></v-chip
                  >
                </span>
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
  components: {
    BulletinContent: () => import('../components/BulletinContent.vue'),
    CreateBulletinSkill: () => import('./create-bulletin-skill.vue'),
  },
  data() {
    return {
      menu: false,
      menu2: false,
      openFlag: false,
      deleteFlg: 0,
      openFlg: 0,
      tit: '',
      content: '',
      date: '',
      time: '',
      inputText: '',
      bulletin: [],
      skills: [],
      levels: [],
      exps: [],
      skill: '',
      chipSkills: [],
      levelSkills: [],
      skillId: [],
    }
  },
  mounted() {
    this.getDelFlg()
    this.getSession()
  },
  methods: {
    informationBull() {
      sessionStorage.setItem('infoTitle', this.tit)
      sessionStorage.setItem('infoContent', this.content)
      sessionStorage.setItem('infoTime', this.time)
      sessionStorage.setItem('infoDate', this.date)
    },
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
      sessionStorage.removeItem('category')
      sessionStorage.removeItem('parson')
      sessionStorage.removeItem('infoTitle')
      sessionStorage.removeItem('infoContent')
      sessionStorage.removeItem('infoDate')
      sessionStorage.removeItem('infoTime')
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
    createBulletin() {
      this.sendBulletin()
    },
    sendBulletin() {
      // このデータを入れる前にスキルのIDを知って配列に入れる
      const second = 0
      console.log(this.time)
      console.log(sessionStorage.getItem('infoDate') + '日にちと時間' + sessionStorage.getItem('infoTime'))
      const sendBulletin = {
        user_id: 1,
        title: sessionStorage.getItem('infoTitle'),
        contents: sessionStorage.getItem('infoContent'),
        purpose: sessionStorage.getItem('category'),
        persons: Number(sessionStorage.getItem('parson')),
        due: sessionStorage.getItem('infoDate') + ' ' + sessionStorage.getItem('infoTime') + ':' + second + second,
        skills: [],
      }
      console.log(sendBulletin.due)
      const levelBox = sessionStorage.getItem('levels')
      const levs = levelBox.replace(',', '').split(',')

      for (let i = 0; i < this.chipSkills.length; i++) {
        for (let j = 0; j < this.langs.length; j++) {
          if (this.chipSkills[i] === this.langs[j].skillName) {
            sendBulletin.skills.push({ skill_id: this.langs[j].id, level: Number(levs[i]) })
          }
        }
      }
      for (let i = 0; i < this.chipSkills.length; i++) {
        for (let j = 0; j < this.frameworks.length; j++) {
          if (this.chipSkills[i] === this.frameworks[j].skillName) {
            sendBulletin.skills.push({ skill_id: this.frameworks[j].id, level: Number(levs[i]) })
          }
        }
      }
      for (let i = 0; i < this.chipSkills.length; i++) {
        for (let j = 0; j < this.dbs.length; j++) {
          if (this.chipSkills[i] === this.dbs[j].skillName) {
            sendBulletin.skills.push({ skill_id: this.dbs[j].id, level: Number(levs[i]) })
          }
        }
      }
      for (let i = 0; i < this.chipSkills.length; i++) {
        for (let j = 0; j < this.infs.length; j++) {
          if (this.chipSkills[i] === this.infs[j].skillName) {
            sendBulletin.skills.push({ skill_id: this.infs[j].id, level: Number(levs[i]) })
          }
        }
      }
      for (let i = 0; i < this.chipSkills.length; i++) {
        for (let j = 0; j < this.oths.length; j++) {
          if (this.chipSkills[i] === this.oths[j].skillName) {
            sendBulletin.skills.push({ skill_id: this.oths[j].id, level: Number(levs[i]) })
          }
        }
      }
      console.log(sendBulletin)
      this.$axios
        .post('https://i-match.click/api/recruits', sendBulletin)
        // .post('https://i-match.click/api/recruits', sendBulletin)
        .then(response => {
          console.log('ちゃんと通っている１')
          console.log(response.data)
          this.$router.push('/bulletin-list')
        })
        .catch(err => {
          console.log('通ってないよー')
          return err.response
        })
      this.sessionClear()
    },

    getDelFlg() {
      sessionStorage.setItem('deleteFlg', this.deleteFlg)
      sessionStorage.setItem('openFlg', this.openFlg)
    },
    getSession() {
      const skillBox = sessionStorage.getItem('skills')
      const levelBox = sessionStorage.getItem('levels')
      const expBox = sessionStorage.getItem('exps')
      this.tit = sessionStorage.getItem('infoTitle')
      this.content = sessionStorage.getItem('infoContent')
      this.date = sessionStorage.getItem('infoDate')
      this.time = sessionStorage.getItem('infoTime')
      this.skills.push(skillBox)
      this.levels.push(levelBox)
      this.exps.push(expBox)
      this.skill = this.skills.toString()
      if (sessionStorage.getItem('deleteFlg') === '0' && this.skills.indexOf(',') === 0) {
        this.skill = this.skill.replace(/"/g, '').replace(',', '').replace(',', '・')
        const count = (this.skill.match(/,/g) || []).length
        for (let i = 0; i < count; i++) {
          this.skill = this.skill.replace(',', '・')
        }
        this.chipSkills = this.skill.split('・')
      } else {
        this.chipSkills = this.skill.split(',')
      }
      for (let i = 0; i < this.chipSkills.length; i++) {
        this.chipSkills[i] = this.chipSkills[i].replace(/"/g, '')
      }
      if (this.chipSkills[0] === '') {
        this.chipSkills.shift()
      }
      sessionStorage.setItem('chip', this.chipSkills)
    },
    deleteSkill(value) {
      // 文字列になっている
      this.deleteFlg = 1
      sessionStorage.setItem('deleteFlg', this.deleteFlg)
      const levelBox = sessionStorage.getItem('levels')
      this.levels.push(levelBox)
      const sessionChip = sessionStorage.getItem('chip')
      for (let i = 0; i < this.levels.length; i++) {
        this.levels[i] = Number(this.levels[i])
      }
      console.log(this.levels + '削除できているか')
      const placeLev = this.chipSkills.indexOf(value)
      delete this.levels[placeLev]
      console.log(this.levels)
      // 配列にしている
      console.log(sessionStorage.getItem('chip'))
      console.log(sessionStorage.getItem('skills'))
      const chipBox = sessionChip.split(',')
      const cnt = chipBox.indexOf(value)
      if (cnt >= 0) {
        chipBox.splice(cnt, 1)
      }
      sessionStorage.setItem('chip', chipBox)
      sessionStorage.setItem('levels', levelBox)
      sessionStorage.setItem('skills', chipBox)
      // console.log(this.chipSkills)
      return this.chipSkills.splice(this.chipSkills.indexOf(value), 1)
    },
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
