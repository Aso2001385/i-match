<template>
  <div class="box" style="position: relative">
    <CreateBulletinSkill
      v-if="openFlag"
      v-bind="openFlag"
      style="position: absolute; z-index: 2; top: 10%; width: 80%; margin-left: 10%"
    />
    <v-flex>
      <v-row class="mt-5 pa-0 justify-center">
        <v-card style="width: 80%" class="ml-15 pl-10 pb-0">
          <v-card-title style="border-bottom: 2px solid lightgrey; width: 90%">内容</v-card-title>
          <v-row class="mt-0 pa-0">
            <v-col cols="12"><v-card-title>●タイトル</v-card-title></v-col>
            <v-col cols="12"><input style="border: 1px solid lightgrey; width: 30vh; border-radius: 5px" /></v-col>
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
            </v-col>
          </v-row>
          <v-row class="pb-5 ml-10">
            <v-col style="text-align: center">
              <span class="mb-5">
                <NuxtLink to="/bulletin-list" style="text-decoration: none">
                  <div class="justify-center">
                    <v-col id="addSkill" style="width: 90%; text-align: center">登録</v-col>
                  </div>
                </NuxtLink>
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
  },
  // mounted() {
  //   axios
  //     // .get('http://18.183.25.12/api/user') awsのURL
  //     .get('http://localhost:8000/api/user')
  //     .then(res => {
  //       console.log(res.data)
  //       this.message = res.data
  //     })
  //     .catch(error => {
  //       console.log(error)
  //     })
  // },
  //   async asyncData({ $axios }) {
  // 	// 取得先のURL
  // const url = "https://qiita.com/api/v2/items";
  // 	// リクエスト（Get）
  // const response = await $axios.$get(url);
  // 	// 配列で返ってくるのでJSONにして返却
  // 	return {
  // 		posts: response
  // 	};
  // },
}
</script>
<style lang="scss">
.background {
  background-color: grey;
  color: black;
}
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
