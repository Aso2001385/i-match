<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
      <v-card style="width: 80%" class="mt-10 pl-10 pb-0">
        <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%" class="pt-10">{{ category }}</v-card-title>
        <div style="width: 80%">
          <v-row class="mt-10 pa-0 pt-10">
            <v-col cols="4"
              ><v-card-title
                ><strong style="font-size: 30px; margin-left: 8%">{{ title }}</strong></v-card-title
              ></v-col
            >
            <v-col cols="7"
              ><v-card-title>{{ deadline }}</v-card-title></v-col
            >
          </v-row>
          <v-row
            class="mt-0 pa-0"
            style="width: 95%; overflow: hidden !important; height: 40vh; overflow-y: auto; margin-left: 10%"
          >
            <v-col cols="12">
              {{ content }}
            </v-col>
          </v-row>
          <v-row style="float: right" class="ma-10">
            <v-col cos="12" class="ml-4 mr-10">
              <NuxtLink to="/news-list" style="text-decoration: none">
                <v-col class="mr-0" id="addSkill">承諾</v-col>
              </NuxtLink>
            </v-col>
            <v-col cos="4" class="ml-2 mr-10">
              <NuxtLink to="/news-list" style="text-decoration: none">
                <v-col class="mr-0" id="addSkill">断る </v-col>
              </NuxtLink>
            </v-col>
          </v-row>
        </div>
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      id: 0,
      title: '',
      content: '',
      category: '',
      deadline: '',
    }
  },
  mounted() {
    this.getSession()
    this.getDetail()
  },
  methods: {
    getSession() {
      // お知らせ詳細の情報
      // 3を許可
      this.id = 3
      // this.title = sessionStorage.getItem('newsTitle')
      // this.content = sessionStorage.getItem('newsContent')
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
    async getDetail() {
      await this.$axios
        .get(`http://localhost:8080/api/informations/${this.id}`)
        // .get(`https://localhost:8080/api/informations/${this.id}`)
        .then(response => {
          console.log('ちゃんと通っている詳細取得')
          this.title = response.data.title
          this.content = response.data.contents
          this.category = response.data.category_name
          this.deadline = response.data.created_at
            .substring(0, response.data.created_at.indexOf('.'))
            .replace('T', '　')
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
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
