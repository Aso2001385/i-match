<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
      <v-card style="width: 80%" class="mt-10 pl-10 pb-0">
        <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">{{ category }}</v-card-title>
        <v-row class="mt-10 pa-0">
          <v-col cols="4"
            ><v-card-title>{{ title }}</v-card-title></v-col
          >
          <v-col cols="7"><v-card-title>3/6 12:10</v-card-title></v-col>
        </v-row>
        <v-row class="mt-0 pa-0" style="width: 95%; overflow: hidden !important; height: 40vh; overflow-y: auto">
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
    }
  },
  mounted() {
    this.getSession()
  },
  methods: {
    getSession() {
      this.id = sessionStorage.getItem('id')
      this.title = sessionStorage.getItem('tit')
      this.content = sessionStorage.getItem('con')
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
    getDetail() {
      this.$axios
        .get(`http://localhost:8080/api/informations/${this.id}`)
        .then(response => {
          console.log('ちゃんと通っている詳細取得')
          this.category.push(response.data[0].category_name)
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
