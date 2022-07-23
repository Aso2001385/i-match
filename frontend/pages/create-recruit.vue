<template>
  <v-container fill-height>
    <v-row justify="center">
      <v-col cols="12" lg="6" md="9" sm="10" xs="10">
        <v-card class="pb-10 mx-auto fill-width">
          <v-card-title class="d-flex justify-center pa-4">
            <h3 class="text-center grey--text text--darken-3">募集掲示板に投稿する</h3>
          </v-card-title>
          <v-divider class="pb-5"> </v-divider>
          <v-form>
            <div class="pa-10">
              <v-text-field
                v-model="title"
                label="タイトル"
                :error-messages="titleErrors"
                @input="$v.title.$touch()"
                @blur="$v.title.$touch()"
              />
              <v-textarea
                v-model="contents"
                label="概要"
                value="一緒にプログラミングの勉強をしましょう！！"
                :error-messages="contentsErrors"
                @input="$v.contents.$touch()"
                @blur="$v.contents.$touch()"
              />
              <v-select
                v-model="purpose"
                :items="categorys"
                label="募集目的"
                item-text="category"
                item-color="orange"
              />
              <v-text-field
                v-model="persons"
                type="number"
                hint="1人 ~ 20人"
                label="募集人数"
                :error-messages="personsErrors"
                @input="$v.persons.$touch()"
                @blur="$v.persons.$touch()"
              />
              <v-menu
                ref="menu"
                v-model="menu"
                :close-on-content-click="false"
                :return-value.sync="due"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field v-model="due" label="募集期限日" readonly v-bind="attrs" v-on="on" />
                </template>
                <v-date-picker v-model="due" no-title scrollable>
                  <v-spacer></v-spacer>
                  <v-btn text color="primary" @click="menu = false"> Cancel </v-btn>
                  <v-btn text color="primary" @click="$refs.menu.save(due)"> OK </v-btn>
                </v-date-picker>
              </v-menu>
              <v-card-title class="d-flex justify-center pa-4">
                <h3 class="text-center grey--text text--darken-2">スキル選択</h3>
              </v-card-title>
              <v-row>
                <v-col cols="12" style="overflow: hidden !important; height: 15vh; overflow-y: auto">
                  <v-chip
                    v-for="(skillChip, index) in skillChips"
                    :key="index"
                    :class="skillChip.color"
                    class="mr-2 pr-0 mb-1 white--text"
                    small
                  >
                    {{ skillChip.name }}
                    <v-icon class="mx-1" dark small @click="deleteSkillChip(index)">mdi-minus-circle</v-icon>
                  </v-chip>
                  <v-btn icon class="mb-1" color="yellow darken-2" @click="deleteSkillChips()"
                    ><v-icon>mdi-close-circle-outline</v-icon></v-btn
                  >
                </v-col>
              </v-row>
              <div class="mx-10 pb-10">
                <v-select
                  v-for="skillUnit in skillUnits"
                  :key="skillUnit.category"
                  v-model="selectSkill"
                  item-text="name"
                  item-value="id"
                  :items="skillUnit.skills"
                  attach
                  :color="skillUnit.color"
                  :item-color="skillUnit.color"
                  :label="skillUnit.jp_name"
                  return-object
                  @change="addSkillChip"
                />
              </div>
              <div class="mt-10 pt-5 position: relative">
                <v-row justify="center">
                  <v-col cols="4">
                    <ApiEventButton color="grey darken-4" :click-callback="submit"> 投稿 </ApiEventButton>
                  </v-col>
                </v-row>
              </div>
              <v-row class="mt-10" justify="center">
                <NuxtLink to="/sign-up">戻る</NuxtLink>
              </v-row>
            </div>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
import { validationMixin } from 'vuelidate'
import { required, maxLength, minLength, maxValue, minValue, decimal, integer } from 'vuelidate/lib/validators'

import Common from '@/plugins/common'

export default {
  mixins: [validationMixin],
  validations: {
    title: { required, minLength: minLength(2), maxLength: maxLength(30) },
    contents: { required, maxLength: maxLength(300) },
    persons: {
      required,
      minValue: minValue(1),
      maxValue: maxValue(20),
      decimal,
      integer,
    },
  },

  data() {
    return {
      menu: false,
      categorys: ['開発', '勉強会'],
      skillChips: [],
      selectSkill: {
        level: 3,
      },
      title: '',
      contents: '',
      category: '',
      due: '',
      purpose: '',
      persons: '',
    }
  },
  computed: {
    skillUnits() {
      return this.$store.state.skills
    },
    titleErrors() {
      const errors = []
      if (!this.$v.title.$dirty) return errors
      !this.$v.title.minLength && errors.push('2文字以上入力してください')
      !this.$v.title.maxLength && errors.push('30文字以上入力してください')
      !this.$v.title.required && errors.push('この項目は必須項目です')
      return errors
    },
    contentsErrors() {
      const errors = []
      if (!this.$v.contents.$dirty) return errors
      !this.$v.contents.maxLength && errors.push('入力できるのは300文字までです')
      !this.$v.contents.required && errors.push('この項目は必須項目です')
      return errors
    },
    personsErrors() {
      const errors = []
      if (!this.$v.persons.$dirty) return errors
      !this.$v.persons.minValue && errors.push('1人以上入力してください')
      !this.$v.persons.maxValue && errors.push('入力できるのは20人までです')
      !this.$v.persons.required && errors.push('この項目は必須項目です')
      !this.$v.persons.decimal && errors.push('10進法で入力してください')
      !this.$v.persons.integer && errors.push('整数で入力してください')
      return errors
    },
  },
  methods: {
    async submit() {
      const SEND = {
        user_id: this.$store.state.user.id,
        title: this.title,
        contents: this.contents,
        due: this.due,
        purpose: this.purpose,
        persons: this.persons,
        skills: this.skillChips,
      }

      await this.$axios
        .post(`${this.$urls.API}/recruits`, SEND)
        .then(async response => {
          console.log(response.data)
          await this.$router.push('/recruit-list')
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
    },
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
  },
}
</script>
<style lang="scss">
.background {
  background-color: grey;
  color: black;
}
#addRecruit {
  border: 1px solid grey;
  border-radius: 5px;
  background-color: grey;
  color: white;
}
#addRecruit:hover {
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
