<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
        <v-card style="width:80%;" class="ml-15 pl-10 pb-0">
            <v-card-title style="border-bottom:2px solid lightgrey;width: 90%;">内容</v-card-title>
            <v-row class="mt-0 pa-0">
                <v-col cols="2"><v-card-title>●タイトル：</v-card-title></v-col>
                <v-col cols="10" class="text-h6"><v-card-title>Flaskの勉強会をしましょう。</v-card-title></v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
                <v-col cols="12"><v-card-title>●概要</v-card-title></v-col>
            </v-row>
                           <v-row class="mt-0 pa-0" style="width:95%; overflow: hidden !important; height:20vh; overflow-y: auto">
                <v-col cols="12">
                    〇〇さんへオファーが来ました。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんあああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんああああああああああああああああああああああああああああああああああああああああああああああああああ
                </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
                <v-col cols="2"><v-card-title>●募集人数：</v-card-title></v-col>
                <v-col cols="2" class="mt-5">3/6人
                </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
                <v-col cols="2"><v-card-title>●募集期間：</v-card-title></v-col>
                <v-col cols="2" class="mt-5">2022/6/30:12:30まで
                </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
                <v-col cols="4" class="d-flex">
                    
                </v-col>
            </v-row>
            <v-row class="mt-0 pa-0">
                <v-col><v-card-title>●スキル</v-card-title></v-col>
            </v-row>
            <!-- <v-row> -->
                <v-col cols="11">PHP・Laravel</v-col>
            <!-- </v-row> -->
        </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
    data() {
        return {}
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
    mounted() {
        // this.getAccount()
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
        // getAccount() {
        // this.$axios
        // .get('http://localhost:8080/api/', getAccount)
        // .then(response => {
        //     console.log('ちゃんと通っている１')
        //     console.log(response.data)
        //     this.$router.push('/bulletin-list')
        // })
        // .catch(err => {
        //     console.log('通ってないよー')
        //     return err.response
        // })
        // alert('通ったっす！')
        // },
    },
}
