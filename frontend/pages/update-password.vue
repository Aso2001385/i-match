<template>
  <v-flex>
    <v-row class="mt-15 pa-0 pt-15 justify-center">
      <v-card style="width: 80%" class="mt-10 pl-10 pb-0">
        <!-- <v-card style="width: 90%" class="ml-10"> -->
        <v-row class="mt-5 ml-5 pt-5">
          <v-col cols="4"><h2>パスワード変更</h2></v-col>
        </v-row>
        <v-row class="ml-5">
          <v-col cols="10"><v-text-field v-model="oldPassword" label="現在のパスワード"></v-text-field></v-col>
        </v-row>
        <v-row class="ml-5">
          <v-col cols="10"><v-text-field v-model="password" label="新しいパスワード"></v-text-field></v-col>
        </v-row>
        <v-row class="ml-5">
          <v-col cols="10"><v-text-field v-model="confPassword" label="新しいパスワード確認"></v-text-field></v-col>
        </v-row>
        <v-col cols="12" class="ml-7 pb-10"><v-btn @click="updatePass">更新</v-btn></v-col>
        <!-- </v-card> -->
      </v-card>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      userId: 1,
      oldPassword: '',
      password: '',
      confPassword: '',
    }
  },
  methods: {
    updatePass() {
      if (this.password === this.confPassword) {
        this.putPassword()
      }
    },
    putPassword() {
      const password = {
        id: this.userId,
        old_password: this.oldPassword,
        password: this.password,
      }
      this.$axios
        // .put('http://localhost:8080/api/user/password', password)
        .put('http://3.113.81.143/api/user/password', password)
        .then(response => {
          console.log('ちゃんと通っている')
          //   console.log(response.data[0])
          //   console.log(response.data[0])
          console.log(response.data)
        })
        .catch(err => {
          console.log('通ってないよー')
          console.log(err)
          return err.response
        })
      alert('通ったっす！')
    },
  },
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
#user_bulletin_skill {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  -webkit-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
}
</style>
