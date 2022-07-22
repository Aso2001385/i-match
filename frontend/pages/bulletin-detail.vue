<template>
  <v-container>
    <v-row class="mt-15 pa-0" justify="center">
      <v-col cols="12" lg="12" md="12" sm="12" sx="12">
        <v-card style="width: 80%" class="pb-0 mx-auto px-10">
          <v-card-title style="border-bottom: 2px solid lightgrey; width: 100%">内容</v-card-title>
          <v-row class="mt-0 pt-5">
            <v-col cols="8" class="mt-1"><span>タイトル</span></v-col>
            <v-col cols="2" class="mr-5"
              ><v-chip>{{ detail.purpose }}</v-chip></v-col
            >
            <v-col cols="12"
              ><span
                ><strong class="text-h4">{{ detail.title }}</strong></span
              ></v-col
            >
          </v-row>
          <v-row class="mt-0">
            <v-col cols="10" class="mt-3 mb-2"><span>概要</span></v-col>
          </v-row>
          <v-row class="mt-0 ml-2" style="width: 95%; overflow: hidden !important; height: 20vh; overflow-y: auto">
            <v-col cols="12">
              {{ detail.contents }}
            </v-col>
          </v-row>
          <v-row class="mt-0">
            <v-col cols="4" class="mt-3 mb-5"><span>募集人数</span></v-col>
            <v-col cols="8" class="mt-1 mb-5"
              >1/<span>{{ detail.persons }}</span
              >人</v-col
            >
          </v-row>
          <v-row class="mt-0">
            <v-col cols="4" class="mt-1 mb-5"><span>募集期間</span></v-col>
            <v-col cols="8" class="mt-1 mb-5">{{ detail.due }}</v-col>
          </v-row>
          <v-row class="mt-0 pa-0">
            <v-col cols="4" class="d-flex"> </v-col>
          </v-row>
          <v-row class="mt-0">
            <v-col cols="4" class="mt-1 mb-5"><span>スキル</span></v-col>
            <v-col cols="10" class="ml-10">
              <span v-for="skill in skillName" :key="skill" class="mr-1">
                <v-chip :color="color(skill.categoryId)" class="white--text">{{ skill.name }}</v-chip>
              </span>
            </v-col>
          </v-row>
          <v-row class="mt-0 pa-0 pb-15 ml-15">
            <v-col>
              <NuxtLink to="/bulletin-detail" style="text-decoration: none">
                <v-row class="mt-5 ml-15" justify="center" style="width: 70%">
                  <v-col cols="12">
                    <api-event-button color="grey darken-4" :click-callback="submit"> 申し込み </api-event-button>
                  </v-col>
                </v-row>
              </NuxtLink>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
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
        .get(`http://localhost:8080/api/recruits/${this.bulletinDetailId}`)
        .then(response => {
          console.log('通ってるよー')
          console.log(response.data)
          this.detail = response.data
          console.log(this.detail.skills[0].skill_id - 1)
          for (let i = 0; i < this.detail.skills.length; i++) {
            this.skillName.push({
              name: SkillInfo[this.detail.skills[i].skill_id - 1].skillName,
              categoryId: SkillInfo[this.detail.skills[i].skill_id - 1].skillCategory,
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
