<template>
<div>
    <LoginTit1></LoginTit1>
    <div class="register-container">
        <div id="login-container">
            <div id="login-subtitle-con"><p id="login-subtitle">新規登録</p></div>

            <form v-on:submit="signupSubmit">
                <div class="login-text-con">
                    <p>クラス　　　　
                    <!-- <input type="text" class="login-text" v-model="email"> -->
                    <select name="class">
                        <option value="1">SD1A</option>
                        <option value="2">SD2A</option>
                        <option value="3">SD3A</option>
                        <option value="4">SD4A</option>
                    </select>
                    </p>
                </div>
                <div class="login-text-con">
                    <p>ニックネーム　
                        <!-- <input type="text" class="login-text" v-model="email"> -->
                        <input type="text" class="login-text">
                    </p>
                </div>
                <div class="login-text-con">
                    <p>メールアドレス
                        <!-- <input type="text" class="login-text" v-model="email"> -->
                        <input type="text" class="login-text">
                    </p>
                </div>
                <div class="login-text-con">
                    <p>パスワード　　
                        <!-- <input type="password" class="login-text" v-model="password"> -->
                        <input type="password" class="login-text" >
                    </p>
                </div>
                <div class="login-btn-con"><button  class="login-btn">Register</button></div>
            </form>
            <router-link to="/login-enter">
                <div class="sign-btn-con"><button class="login-btn">ログイン</button></div>
            </router-link>
                
        </div>
    </div>
</div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    import LoginTit1 from './LoginTit.vue'

      export default {
        // data() {
        //     return{
        //         class: '',
        //         name: '',
        //         email: '',
        //         password: '',
        //         request: {}
        //     }
        // },
        // methods: {
        //     signupSubmit () {
        //         this.request = {
        //             class: this.clsss,
        //             name: this.name,
        //             email: this.email,
        //             password: this.password
        //         }
        //         axios
        //             .post('/api/user', this.request)
        //             .then((res) => {
        //                 // 登録成功
        //                 // セッションにユーザーid、name、email保存する
        //                 console.log(res);
        //                 this.$router.push({name: 'top.dev.tit'})
        //             .catch((err) => {
        //                 console.log(err);
        //             });
        //         });
        //     }
        // },
        components: {
            LoginTit1,
        },
      }
</script>
