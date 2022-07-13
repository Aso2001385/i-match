<template>
  <div class="box" style="position: relative">
    <CreateBulletinSkill
      v-if="openFlag"
      style="position: absolute; z-index: 2; top: 10%; width: 80%; margin-left: 10%"
    />
    <v-flex>
      <v-row class="mt-5 pa-0 justify-center">
        <v-card style="width: 80%" class="ml-15 pl-10 pb-0">
          <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
          <v-row class="mt-0 pa-0">
            <v-col cols="12"><v-card-title>●タイトル</v-card-title></v-col>
            <v-col cols="12"
              ><input style="border: 1px solid lightgrey; width: 30vh; border-radius: 5px" v-model="inputText"
            /></v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="12"><v-card-title>●概要</v-card-title></v-col>
            <v-col cols="12">
              <textarea
                style="border: 1px solid lightgrey; border-radius: 5px; width: 80%"
                row="2"
                col="240"
              ></textarea>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="2"><v-card-title>●募集期間</v-card-title></v-col>
            <v-col cols="6" class="mt-5"
              ><div>
                <DatePicker style="border: 1px solid lightgrey; display: inline-block; border-radius: 5px" />
              </div>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="4" class="d-flex">
              <BulletinContent />
            </v-col>
          </v-row>

          <v-row class="mt-0 pa-0">
            <v-col cols="2"><v-card-title>●スキル</v-card-title></v-col>
            <v-btn @click="openModal" cols="12" id="addSkill" class="mt-6 pl-5 pr-5">追加</v-btn>

            <v-col cols="12">
              <input type="text" />
              <!-- <span v-for="skill in skills" :key="skill">{{ skill }}</span> -->
              <span>{{ skill }}</span>
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
  </div>
</template>
<script defer>
// import DatePicker from 'vuejs-datepicker/src/components/Datepicker.vue'

export default {
  data() {
    return {
      openFlag: false,
      inputText: '',
      bulletin: [],
      skills: [],
      levels: [],
      exps: [],
      skill: '',
    }
  },
  components: {
    // DatePicker,
    BulletinContent: () => import('../components/BulletinContent.vue'),
    CreateBulletinSkill: () => import('./create-bulletin-skill.vue'),
  },
  methods: {
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
    },
    createBulletin() {
      // axios
      //   .post('http://18.183.25.12/api/user', this.bulletin)
      //   .then(res => {
      //     this.$router.push({ name: '' })
      //   })
      //   .then(res => {
      //     console.log(res.data)
      //     this.$router.push('/bulletin-list')
      //   })
      //   .catch(error => {
      //     console.log(error)
      //   })

      // データベースに保存してセッションのスキルの中身を削除してから掲示板リストに遷移するようにしている
      this.sessionClear()
      this.$router.push('/bulletin-list')
    },
    getSession() {
      const skillBox = sessionStorage.getItem('skills')
      this.skills.push(skillBox)
      console.log(this.skills)
      this.skill = this.skills.toString().replace(/"/g, '').replace(',', '').replace(',', '・')
      const count = (this.skill.match(/,/g) || []).length
      console.log(count)
      for (let i = 0; i < count; i++) {
        this.skill = this.skill.replace(',', '・')
      }
      console.log(this.skill)
      // console.log(this.skill.replace(',', '・'))
      // var result = this.skill.indexOf( ',' );
    },
  },
  mounted() {
    this.getSession()
  },
}
</script>
<style lang="scss">
.background {
  background-color: grey;
  color: black;
}
#addSkill,
#addBulletin {
  border: 1px solid grey;
  border-radius: 5px;
  background-color: grey;
  color: white;
}
#addSkill:hover,
#addBulletin:hover {
  background-color: white;
  color: orange;
  border: 1px solid orange;
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
