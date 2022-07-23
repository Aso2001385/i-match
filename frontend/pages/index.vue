<template>
  <v-flex>
    <v-row class="grey darken-2">
      <v-col cols="12" class="mt-5 ml-10 pb-5">
        <NuxtLink to="/create-recruit" class="white--text" style="text-decoration: none"
          ><strong><v-icon color="orange">mdi-plus-box</v-icon>掲示板作成</strong></NuxtLink
        >
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="8" class="ma-0 pa-0" style="overflow: hidden !important; height: 84vh; overflow-y: auto">
        <v-row>
          <RecruitList />
        </v-row>
      </v-col>
      <v-col cols="4">
        <SearchSkill />
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  components: {
    RecruitList: () => import('../components/RecruitList.vue'),
    SearchSkill: () => import('../components/SearchSkill.vue'),
  },
  data() {
    return {
      recruitFlg: 1,
    }
  },
  methods: {
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else if (sort === 1) {
        this.sortId = 2
      } else {
        this.sortId = 0
      }
    },
  },
}
</script>
