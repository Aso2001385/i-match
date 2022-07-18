<!-- <template>
  <v-flex>
    <v-row>
      <v-col cols="8">
        <v-row class="grey darken-2">
          <v-col cols="8" class="mt-3">
            <v-btn href="account-edit" text color="link" class="white--text ml-5 text-h6">開発グループ募集</v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col
            cols="12"
            class="ma-0 pa-0 mb-5 pb-5"
            style="overflow: hidden !important; height: 36vh; overflow-y: auto"
          >
            <BulletinList v-for="n in 3" :key="n"
          /></v-col>
        </v-row>
        <v-row class="grey darken-2">
          <v-col cols="8" class="mt-3">
            <v-btn href="account-edit" text color="link" class="white--text ml-5 text-h6">勉強グループ募集</v-btn>
          </v-col>
        </v-row>
        <v-row>
          <v-col
            cols="12"
            class="ma-0 pa-0 mb-5 pb-5"
            style="overflow: hidden !important; height: 36vh; overflow-y: auto"
          >
            <BulletinList v-for="n in 3" :key="n"
          /></v-col>
        </v-row>
      </v-col>
      <v-col cols="4" class="pl-3 mt-10">
        <v-row>
          <v-col cols="8">
            <p class="ml-3 mt-2 text-h6">お知らせ</p>
          </v-col>
          <v-col class="d-flex white--text" cols="3">
            <v-btn @click="sortSection(sortId)" class="mt-3">{{ sortName[sortId] }}</v-btn>
          </v-col>
        </v-row>
        <v-row class="justify-center mb-3">
          <v-row class="justify-center">
            <v-col cols="10" style="overflow: hidden !important; height: 70vh; overflow-y: auto">
              <v-card v-for="n in 30" :key="n" elevation="2" class="text-h6">お知らせリスト</v-card>
            </v-col>
          </v-row>
        </v-row>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script>
import BulletinList from '../components/BulletinList.vue'
export default {
  data() {
    return {
      items: ['新着順', '投稿順'],
      sortName: ['新着順', '投稿順'],
      sortId: 0,
    }
  },
  methods: {
    sortSection(sort) {
      if (sort === 0) {
        this.sortId = 1
      } else {
        this.sortId = 0
      }
    },
  },
  components: {
    BulletinList,
  },
}
</script>
<style lang="scss"></style> -->
