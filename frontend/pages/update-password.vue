<template>
  <v-flex>
    <v-row class="mt-15 pa-0 pt-15" justify="center">
      <v-col cols="8">
        <v-card class="mt-10 pb-0">
          <v-row class="mt-5 pt-5 ml-15">
            <v-col cols="12"><h2>パスワード変更</h2></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="oldPassword" label="現在のパスワード"></v-text-field></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="password" label="新しいパスワード"></v-text-field></v-col>
          </v-row>
          <v-row class="ml-15">
            <v-col cols="11"><v-text-field v-model="confPassword" label="新しいパスワード確認"></v-text-field></v-col>
          </v-row>
          <v-row class="mt-5 pb-5" style="width: 80%; margin-left: 10%">
            <v-col cols="12">
              <api-event-button color="grey darken-4" @click="updatePass">更新</api-event-button>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-flex>
</template>
<script defer>
export default {
  data() {
    return {
      // userId: 1,
      oldPassword: '',
      password: '',
      confPassword: '',
    }
  },
  computed: {
    user() {
      return this.$store.state.user
    },
  },
  methods: {
    updatePass() {
      if (this.oldPassword === '' || this.password === '' || this.confPassword === '') {
        return alert('入力されていない欄があります。')
      }
      if (this.password === this.confPassword) {
        this.putPassword()
      } else {
        return alert('新しいパスワードと確認用のパスワードが違います。')
      }
    },
    putPassword() {
      const password = {
        id: this.$store.state.user.id,
        old_password: this.oldPassword,
        password: this.password,
      }
      console.log(password)
      this.$axios
        .put(`${this.$urls.API}/user/password`, password)
        .then(response => {
          // console.log('ちゃんと通っている')
          console.log(response.data)
          alert('パスワード変更成功')
          this.$router.push(`/account`)
        })
        .catch(err => {
          // console.log('通ってないよー')
          console.log(err)
          alert('パスワード変更失敗')
          return err.response
        })
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
