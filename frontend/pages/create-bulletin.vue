<template>
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
            <textarea style="border: 1px solid lightgrey; border-radius: 5px; width: 80%" row="2" col="240"></textarea>
          </v-col>
        </v-row>
        <v-row class="mt-0 pa-0">
          <v-col cols="2"><v-card-title>●募集期間</v-card-title></v-col>
          <v-col cols="6" class="mt-5"
            ><div>
              <!-- <DatePicker style="border: 1px solid lightgrey; display: inline-block; border-radius: 5px" /> -->
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
          <!-- <v-col cols="6"><v-btn class="mt-3" @click="show()">追加</v-btn></v-col> -->
          <NuxtLink to="/create-bulletin-akill" class="" style="text-decoration: none">
            <v-col cols="12" id="addSkill" class="mt-5" style="border: 1px solid lightgrey; border-radius: 5px"
              >追加</v-col
            >
          </NuxtLink>
          <!-- <v-col cols="6"><v-btn class="mt-3">追加</v-btn></v-col> -->
          <v-col cols="12">
            <input type="text" />
          </v-col>
        </v-row>
        <v-row>
          <v-col cos="12" class="ml-4" style="text-align: center">
            <span class="ml-5"><v-btn class="mb-5">登録</v-btn></span>
          </v-col>
        </v-row>
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
// import DatePicker from 'vuejs-datepicker/src/components/Datepicker.vue'

export default {
  data() {
    return {}
  },
  components: {
    // DatePicker,
    BulletinContent: () => import('../components/BulletinContent.vue'),
  },
}
</script>
<!-- <style lang="scss">
#addSkill {
  border: 1px solid lightgrey;
  border-radius: 5px;
  background-color: white;
  color: orange;
}
#addSkill:hover {
  background-color: lightblue;
  color: green;
}
</style> -->
