<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
      <v-card style="width: 80%" class="ml-10 pl-10 pb-0">
        <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●タイトル：</v-card-title></v-col>
          <v-col cols="8" class="text-h6"
            ><v-card-title>{{ title }}</v-card-title></v-col
          >
          <v-col cols="2"
            ><v-chip>{{ purpose }}</v-chip></v-col
          >
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="12"><v-card-title>●概要</v-card-title></v-col>
        </v-row>
        <v-row class="mt-0 pa-0" style="width: 95%; overflow: hidden !important; height: 20vh; overflow-y: auto">
          <v-col cols="12">
            {{ contents }}
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●募集人数：</v-card-title></v-col>
          <v-col cols="2" class="mt-5"
            >3/<span>{{ persons }}</span
            >人</v-col
          >
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●募集期間：</v-card-title></v-col>
          <v-col cols="2" class="mt-5">{{ due }}</v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="4" class="d-flex"> </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●スキル</v-card-title></v-col>
          <v-col cols="10" class="ml-10">
            <p>PHP・Laravel</p>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <NuxtLink to="/bulletin-detail" style="text-decoration: none">
              <v-row class="justify-center ml-10" style="width: 90%">
                <v-col
                  id="addSkill"
                  cos="12"
                  class="mb-5 mt-3 pb-5"
                  style="border: 1px solid lightgrey; text-align: center"
                  >申し込み</v-col
                >
              </v-row>
            </NuxtLink>
          </v-col>
        </v-row>
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      bulletinDetailId: 0,
      title: '',
      contents: '',
      purpose: '',
      due: '',
      persons: 0,
    }
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
    getBulletinDetail() {
      this.$axios
        .get(`${this.$urls.API}/recruits/${this.bulletinDetailId}`)
        .then(response => {
          console.log('ちゃんと通っている')
          this.title = response.data.title
          this.contents = response.data.contents
          this.purpose = response.data.purpose
          this.due = response.data.due
          this.persons = response.data.persons

          console.log(response.data)
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
