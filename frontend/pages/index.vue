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
          <BulletinList />
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
    BulletinList: () => import('../components/BulletinList.vue'),
    SearchSkill: () => import('../components/SearchSkill.vue'),
  },
  data() {
    return {
      bulletinFlg: 1,
      langSea: [],
      frameSea: [],
      dbSea: [],
      infSea: [],
      othSea: [],
      langs: [
        { id: 0, skillCategory: 0, skillName: 'Java' },
        { id: 1, skillCategory: 0, skillName: 'PHP' },
        { id: 2, skillCategory: 0, skillName: 'JavaScript' },
        { id: 3, skillCategory: 0, skillName: 'Python' },
        { id: 4, skillCategory: 0, skillName: 'C' },
        { id: 5, skillCategory: 0, skillName: 'C++' },
        { id: 6, skillCategory: 0, skillName: 'C#' },
        { id: 7, skillCategory: 0, skillName: 'GO' },
        { id: 8, skillCategory: 0, skillName: 'Kotlin' },
        { id: 9, skillCategory: 0, skillName: 'Swift' },
        { id: 10, skillCategory: 0, skillName: 'Ruby' },
        { id: 11, skillCategory: 0, skillName: 'HTML' },
        { id: 12, skillCategory: 0, skillName: 'CSS' },
        { id: 13, skillCategory: 0, skillName: 'SQL' },
        { id: 14, skillCategory: 0, skillName: 'mark down' },
      ],
      frameworks: [
        { id: 0, skillCategory: 1, skillName: 'Spring' },
        { id: 1, skillCategory: 1, skillName: 'Laravel' },
        { id: 2, skillCategory: 1, skillName: 'CakePHP' },
        { id: 3, skillCategory: 1, skillName: 'Symfony' },
        { id: 4, skillCategory: 1, skillName: 'React' },
        { id: 5, skillCategory: 1, skillName: 'Angular' },
        { id: 6, skillCategory: 1, skillName: 'Vue.js' },
        { id: 7, skillCategory: 1, skillName: 'Next.js' },
        { id: 8, skillCategory: 1, skillName: 'Nuxt.js' },
        { id: 9, skillCategory: 1, skillName: 'Django' },
        { id: 10, skillCategory: 1, skillName: 'Flask' },
        { id: 11, skillCategory: 1, skillName: 'Qt' },
        { id: 12, skillCategory: 1, skillName: 'Sinatra' },
        { id: 13, skillCategory: 1, skillName: 'Tailwind CSS' },
        { id: 14, skillCategory: 1, skillName: 'Bulma' },
      ],
      dbs: [
        { id: 0, skillCategory: 2, skillName: 'PostgreSQL' },
        { id: 1, skillCategory: 2, skillName: 'Oracle Database' },
        { id: 2, skillCategory: 2, skillName: 'MongoDB' },
        { id: 3, skillCategory: 2, skillName: 'MySQL' },
        { id: 4, skillCategory: 2, skillName: 'SQLite' },
        { id: 5, skillCategory: 2, skillName: 'MariaDB' },
      ],
      infs: [
        { id: 0, skillCategory: 3, skillName: 'Linux' },
        { id: 1, skillCategory: 3, skillName: 'Windows' },
        { id: 2, skillCategory: 3, skillName: 'iOS' },
        { id: 3, skillCategory: 3, skillName: 'Andoroid' },
        { id: 4, skillCategory: 3, skillName: 'AWS' },
        { id: 5, skillCategory: 3, skillName: 'Azure' },
        { id: 6, skillCategory: 3, skillName: 'Google Cloud' },
        { id: 7, skillCategory: 3, skillName: 'Firebase' },
        { id: 8, skillCategory: 3, skillName: 'Salesforce' },
        { id: 9, skillCategory: 3, skillName: 'Docker' },
        { id: 10, skillCategory: 3, skillName: 'xampp' },
      ],
      oths: [
        { id: 0, skillCategory: 4, skillName: 'figma' },
        { id: 1, skillCategory: 4, skillName: 'GitHub' },
        { id: 2, skillCategory: 4, skillName: 'git' },
        { id: 3, skillCategory: 4, skillName: 'Swagger' },
        { id: 4, skillCategory: 4, skillName: 'Postman' },
        { id: 5, skillCategory: 4, skillName: 'Node.js' },
      ],
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
