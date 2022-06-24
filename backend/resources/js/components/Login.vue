<template>
<div>
    <LoginTit1></LoginTit1>
    <div class="login-container">
        <div id="login-container">
            <div id="login-subtitle-con"><p id="login-subtitle">ログイン</p></div>
            <form v-on:submit="signupSubmit">
                <div class="login-text-con">
                    <p>メールアドレス
                        <!-- <input type="text" class="login-text" v-model="email"> -->
                        <input type="text" class="login-text">
                    </p>
                </div>
                <div class="login-text-con">
                    <p>パスワード　　
                        <!-- <input type="password" class="login-text" v-model="pass"> -->
                        <input type="password" class="login-text" >
                    </p>
                </div>
                <div class="login-btn-con"><button  class="login-btn">Login</button></div>
            </form>
            <router-link to="/register-enter">
                <div class="sign-btn-con"><button class="login-btn">新規登録</button></div>
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
        //         email: '',
        //         pass: '',
        //         remember: false,
        //         users: {}
        //     }
        // },
        // methods: {
        //     loginSubmit () {
        //         this.users = {
        //             email: this.email,
        //             password: this.password
        //         }
        //         axios
        //             .post('/login', this.users)
        //             .then((res) => {
        //                 // ログイン成功
        //                 console.log(res);
        //                 this.$router.push({name: 'top.dev.tit'})
        //                 // location.href = '/app';
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
