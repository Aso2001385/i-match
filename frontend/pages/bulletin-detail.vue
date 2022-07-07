<template>
  <v-flex>
    <v-row class="mt-5 pa-0 justify-center">
        <v-card style="width:80%;" class="ml-15 pl-10 pb-0">
            <v-card-title style="border-bottom:2px solid lightgrey;width: 90%;">内容</v-card-title>
            <v-row class="mt-0 pa-0">
                <v-col cols="2"><v-card-title>●タイトル：</v-card-title></v-col>
                <v-col cols="8" class="text-h6"><v-card-title>Flaskの勉強会をしましょう。</v-card-title></v-col>
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
                <v-col cols="2"><v-card-title>●スキル</v-card-title></v-col>
                <v-col cols="10" class="ml-10">
                    <p>PHP・Laravel</p>
                </v-col>
            </v-row>
                <v-row>
                    <v-col>
                        <NuxtLink to="/bulletin-detail" style="text-decoration: none;">
                        <v-row class="justify-center ml-5" style="width:90%;">
                            <v-col  cos="12" class="mb-5 mt-3" style="border: 1px solid lightgrey;text-align:center;"><p class="pt-3">申し込み</p></v-col>
                        </v-row>
                        </NuxtLink>
                    </v-col>
                </v-row>
        </v-card>
    </v-row>

  </v-flex>
</template>
<script defer>
export default {
    data() {
        return {}
    },
}
