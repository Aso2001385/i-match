<template>
  <v-container>
    <v-row class="mt-0 pa-0">
      <v-col cols="12"
        ><v-select
          :items="categorys"
          label="カテゴリ"
          item-text="category"
          item-color="orange"
          @change="sendSelect"
          v-model="category"
        ></v-select>
      </v-col>
    </v-row>
    <v-row class="mt-0 pa-0">
      <v-col cols="12">
        <v-select
          :items="numbersPeople"
          label="募集人数"
          item-text="parson"
          item-color="orange"
          @change="sendSelect"
          v-model="parson"
        ></v-select>
      </v-col>
    </v-row>
  </v-container>
</template>
<script defer>
export default {
  data() {
    return {
      numbersPeople: ['2', '3', '4', '5', '6', '7', '8', '9', '10'],
      categorys: ['開発', '勉強会'],
      category: '',
      parson: '',
    }
  },
  methods: {
    sendSelect() {
      sessionStorage.setItem('category', this.category)
      sessionStorage.setItem('parson', this.parson)
    },
    getSession() {
      this.category = sessionStorage.getItem('category')
      this.parson = sessionStorage.getItem('parson')
    },
  },
  mounted() {
    this.getSession()
  },
}
</script>
