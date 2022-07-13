<template>
  <v-row class="justify-center">
    <v-col cols="6">
      <v-card class="pb-10" style="background-color: whitesmoke; border-radius: 10px">
        <v-row class="mb-5 ml-10">
          <v-col cols="10">スキル</v-col>
        </v-row>
        <div style="border: 1px solid lightgrey; width: 85%" class="ml-12 pb-5">
          <v-row style="text-align: center">
            <v-col class="text-h4 mt-3">スキルカード</v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon x-large>mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="level"
                    item-text="level"
                    item-value="value"
                    :items="devLevel"
                    attach
                    label="利用スキル"
                    class="mb-0"
                  >
                  </v-select> </v-col
              ></v-row>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon large>mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="level"
                    item-text="level"
                    item-value="value"
                    :items="devLevel"
                    attach
                    label="レベル"
                    class="mb-0"
                  >
                  </v-select>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
          <v-row>
            <v-col class="ml-15" cols="2"><v-icon color="transparent">mdi-alpha-v-box</v-icon></v-col>
            <v-col>
              <v-row
                ><v-col>
                  <v-select
                    style="width: 50%"
                    v-model="exp"
                    item-text="exp"
                    item-value="value"
                    :items="devExp"
                    attach
                    label="開発経験"
                    class="mb-0"
                  ></v-select>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </div>
        <v-row class="justify-center mt-5 pa-1">
          <v-btn href="create-bulletin" id="addSkill" class="mr-15">戻る</v-btn>
          <v-btn href="create-bulletin" id="addSkill" class="ml-15">追加</v-btn>
        </v-row>
      </v-card>
    </v-col>
  </v-row>
</template>
<script defer>
export default {
  data() {
    return {
      props: ['openFlag'],
      devExp: [
        { id: 0, exp: 'あり' },
        { id: 1, exp: 'なし' },
      ],
      devLevel: [
        { id: 0, level: 'レベル1' },
        { id: 1, level: 'レベル2' },
        { id: 2, level: 'レベル3' },
        { id: 3, level: 'レベル4' },
        { id: 4, level: 'レベル5' },
      ],
    }
  },
  methods: {
    closeModal() {
      this.openFlag = !this.openFlag
    },
  },
  computed: {
    exp: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
      },
    },
    level: {
      get() {
        console.log('get')
        return ''
      },
      set(val) {
        console.log('set')
      },
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
