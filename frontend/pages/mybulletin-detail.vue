<template>
  <v-container>
    <v-row class="mt-15 pa-0" justify="center">
      <v-col cols="12" lg="12" md="12" sm="12" sx="12">
        <v-card style="width: 80%" class="pb-0 mx-auto px-10">
          <v-row>
            <v-col cols="4" class="mt-1"><span style="color: grey">募集人数</span></v-col
            ><v-col cols="4" class="mt-1"><span style="color: grey">募集期間</span></v-col>
            <v-col cols="4"
              ><v-chip>{{ detail.purpose }}</v-chip></v-col
            >
          </v-row>
          <v-row>
            <v-col cols="4"
              >1/<span>{{ detail.persons }}</span
              >人</v-col
            >
            <v-col cols="4">{{ detail.due }}</v-col>
          </v-row>
          <v-card-title style="border-bottom: 2px solid lightgrey; width: 100%"></v-card-title>
          <v-row class="mt-0 pt-5">
            <v-col cols="8" class="mt-1"><span style="color: grey">タイトル</span></v-col>
          </v-row>
          <v-row class="mt-0 ml-2" style="width: 95%">
            <v-col cols="12"
              ><span
                ><strong class="text-h4">{{ detail.title }}</strong></span
              ></v-col
            >
          </v-row>
          <v-row class="mt-0">
            <v-col cols="10" class="mt-3 mb-2"><span style="color: grey">概要</span></v-col>
          </v-row>
          <v-row class="mt-0 ml-2" style="width: 95%; overflow: hidden !important; height: 20vh; overflow-y: auto">
            <v-col cols="12">
              {{ detail.contents }}
            </v-col>
          </v-row>
          <v-row class="mt-0">
            <v-col cols="4" class="mt-1 mb-5"><span style="color: grey">スキル</span></v-col>
            <v-col cols="10" class="ml-10">
              <span v-for="skill in skillName" :key="skill" class="mr-1">
                <v-chip :color="color(skill.categoryId)" class="white--text"
                  ><p>lev:{{ skill.level }}</p>
                  {{ skill.name }}
                </v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0 pb-15">
            <v-col>
              <v-row class="mt-5" justify="center">
                <v-col cols="6">
                  <NuxtLink to="/mybulletin-edit" style="text-decoration: none">
                    <v-btn color="grey darken-4" class="white--text" style="width: 100%">編集</v-btn>
                  </NuxtLink>
                  <!-- <api-event-button color="grey darken-4"> 編集 </api-event-button> -->
                </v-col>
              </v-row>
              <!-- </NuxtLink> -->
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
// import ApiEventButton from '~/components/ui/ApiEventButton.vue'
import SkillInfo from '~/assets/skillinfo.json'

export default {
  // components: {
  //   ApiEventButton,
  // },
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
</style>
