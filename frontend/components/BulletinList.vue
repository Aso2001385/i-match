<template>
  <v-container>
    <v-row>
      <v-col cols="12" class="ma-0">
        <v-card>
          <v-row class="pt-5 pl-10">
            <v-col cols="4" class="ml-7"><v-span>募集締め切り：1月1日</v-span></v-col>
            <v-col cols="4"><v-span>募集人数：3/6人</v-span></v-col>
            <v-col cols="12"><h2 class="ml-10">Flaskの勉強家をしませんか？</h2></v-col>
          </v-row>
          <v-row class="ml-4">
            <v-col cols="10" md="8" class="ml-0 pa-0">
              <v-span v-for="n in 10" :key="n" class="text-h4 ml-0 pa-0">◯</v-span>
            </v-col>
            <v-col cols="12" md="2" class="mr-0">
              <v-btn href="account" text color="link">Read More</v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data() {
    return {}
  },
}
</script>
