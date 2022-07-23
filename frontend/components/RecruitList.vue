<template>
  <v-container>
    <v-row v-for="recruit in recruits" :key="recruit.id">
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 px-15">
            <v-col cols="3">募集締め切り：{{ recruit.due }}</v-col>
            <v-col cols="2">募集人数 {{ recruit.member }}/{{ recruit.persons }}人</v-col>
            <v-col cols="1">
              <v-chip small>{{ recruit.purpose }}</v-chip>
            </v-col>
            <v-col cols="12">
              <h2>{{ recruit.title }}</h2>
            </v-col>
          </v-row>
          <v-row class="pl-12">
            <v-col cols="10" justify="center">
              <div style="width: 70%" id="recruit_skill">
                <!-- 何個スキルを表示するか -->
                <span v-for="skill in recruit.skills" :key="skill.id">
                  <v-chip :class="categoryColor[skill.category_name] + ' mr-2 white--text'" small>
                    {{ skill.name }}
                  </v-chip>
                </span>
              </div>
            </v-col>
            <v-col cols="2"> <span class="black--text" @click="pushPage(recruit.id)">Read More </span> </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
export default {
  data() {
    return {
      recruits: [],
      recruitCount: 0,
      recruitList: [],
      recruitIdList: [],
      dueList: [],
      personsList: [],
      recruitSkillId: [],
      boxSkill: -1,
    }
  },
  mounted() {
    this.recruits = this.getrecruit()
  },
  methods: {
    getrecruit() {
      this.$axios
        .get(`${this.$urls.API}/recruits/other/${this.$store.state.user.id}`)
        .then(response => {
          this.recruits = response.data
          return response.data
        })
        .catch(err => {
          console.log(err)
          return err.response
        })
    },
  },
}
</script>
<style lang="scss">
#recruit_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style>
