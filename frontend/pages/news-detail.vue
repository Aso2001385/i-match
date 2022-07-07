<template>
  <v-flex>
    <v-row class="mt-15 pa-0 justify-center">
        <v-card style="width:80%;" class="mt-10 pl-10 pb-0">
            <v-card-title style="border-bottom:2px solid lightgrey;width: 90%;">オファー</v-card-title>
            <v-row class="mt-10 pa-0">
                <v-col cols="4"><v-card-title>〇〇さんからのオファー</v-card-title></v-col>
                <v-col cols="7"><v-card-title>3/6 12:10</v-card-title></v-col>
            </v-row>
            <v-row class="mt-0 pa-0" style="width:95%; overflow: hidden !important; height:40vh; overflow-y: auto">
                <v-col cols="12">
                    〇〇さんへオファーが来ました。あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんあああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああんああああああああああああああああああああああああああああああああああああああああああああああああああ
                </v-col>
            </v-row>
            <v-row style="float:right;" class="ma-10">
                <v-col cos="12" class="ml-4 mr-10">
                    <NuxtLink to="/news-list" style="text-decoration: none;">
                    <v-col class="mr-0" style="color: black;border:1px solid lightgrey;border-radius:5px;">承諾</v-col>
                    </NuxtLink>
                    <!-- <span class="ml-5"><v-btn class="mb-5" href="news-list">承諾</v-btn></span> -->
                </v-col>
                    <v-col cos="4" class="ml-2 mr-10">
                        <NuxtLink to="/news-list" style="text-decoration: none;">
                        <v-col class="mr-0" style="color: black;border:1px solid lightgrey;border-radius:5px;">断る
                        </v-col>

                        </NuxtLink>
                    <!-- <span class="ml-5"><v-btn class="mb-5" href="news-list">断る</v-btn></span> -->
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
