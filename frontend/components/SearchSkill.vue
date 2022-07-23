<template>
  <v-row>
    <v-col cols="12" class="pl-3 mt-2">
      <v-row class="justify-center mb-1">
        <v-col>
          <v-row>
            <v-col cols="6">
              <p style="text-align: center">
                <v-btn href="/bulletin-list" color="green" @click="searchSkills()">検索</v-btn>
              </p>
            </v-col>
            <v-col cols="6">
              <v-btn color="orange" @click="deleteSkillChips()"
                >Clear<v-icon dark right>mdi-minus-circle</v-icon></v-btn
              >
            </v-col>
            <v-col cols="12" style="overflow: hidden !important; height: 15vh; overflow-y: auto">
              <v-chip
                v-for="(skillChip, index) in skillChips"
                :key="index"
                :class="skillChip.color"
                class="mr-2 mb-1 white--text"
                small
              >
                {{ skillChip.name }}
                <v-icon dark right small @click="deleteSkillChip(index)">mdi-minus-circle</v-icon>
              </v-chip>
            </v-col>
          </v-row>
        </v-col>
        <v-row style="overflow: hidden !important; height: 60vh; overflow-y: auto; padding-bottom: 80%">
          <v-col v-for="skillUnit in skillUnits" :key="skillUnit.category" cols="12" sm="11">
            <v-select
              v-model="selectSkill"
              item-text="name"
              item-value="id"
              :items="skillUnit.skills"
              attach
              :color="skillUnit.color"
              :item-color="skillUnit.color"
              :label="skillUnit.jp_name"
              class="mb-0 ml-10"
              style="width: 80%"
              return-object
              @change="addSkillChip"
            ></v-select>
          </v-col>
        </v-row>
      </v-row>
    </v-col>
  </v-row>
</template>
<script defer>
import Common from '~/plugins/common'
export default {
  data() {
    return {
      skillChips: [],
      selectSkill: {},
    }
  },
  computed: {
    skillUnits() {
      return this.$store.state.skills
    },
  },
  methods: {
    addSkillChip() {
      this.skillChips.push(this.selectSkill)
      this.skillChips = Common.orderBy(this.skillChips, 'category_id', 'num', true, {
        keys: ['id'],
        mode: 'num',
        asc: true,
      })
      this.skillChips = this.skillChips.filter((ele, index, self) => self.findIndex(e => e.id === ele.id) === index)
    },
    deleteSkillChip(index) {
      this.skillChips.splice(index, 1)
    },
    deleteSkillChips() {
      this.skillChips = []
    },

    searchSkills() {
      console.log(this.skillChips)
      const sendSearch = []
      for (let i = 0; i < this.skillChips.length; i++) {
        sendSearch.push({ id: this.skillChips[i].id, name: this.skillChips[i].name })
      }
      console.log('配列の中身確認')
      console.log(sendSearch)

      // 検索ボタンが押されたらセッションにそのデータを格納する。あと検索をしたというフラグもおく(1)
      sessionStorage.setItem('sendSearch', JSON.stringify(sendSearch))
      sessionStorage.setItem('searchFlg', 1)

      // this.$axios
      //   .post(`${this.$urls.API}/search/skill`, sendSearch)
      //   // .get(`${this.$urls.API}/search/skill`)
      //   .then(response => {
      //     console.log('通っている')
      //     console.log(response.data)
      //   })
      //   .catch(err => {
      //     console.log('通ってないよー')
      //     console.log(err)
      //     return err.response
      //   })
    },
    // searchSkill() {},
  },
}
</script>
