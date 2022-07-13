<template>
  <v-container>
    <v-row class="mt-0 pa-0">
      <v-col><v-select :items="categorys" label="カテゴリ" item-color="orange"></v-select> </v-col>
    </v-row>
    <v-row class="mt-0 pa-0">
      <v-col> <v-select :items="numbersPeople" label="募集人数" item-color="orange"></v-select> </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
export default {
  data() {
    return {
      numbersPeople: [2, 3, 4, 5, 6, 7, 8, 9, 10],
      categorys: ['開発', '勉強会'],
    }
  },
}
</script>
