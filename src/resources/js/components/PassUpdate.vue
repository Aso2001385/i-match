<template>
<div>
    <PassUpdatePro1></PassUpdatePro1>
    <div class="pass-update">
        <div class="pass-text-con">
            <p class="pass-text">現在のパスワード</p>
            <input type="password" id="now-pass-text" class="form-control">
            <p class="pass-text">新しいパスワード</p>
            <input type="password" id="new-pass-text" class="form-control">
            <p class="pass-text">新しいパスワード(確認)</p>
            <input type="password" id="new-pass-text-conf" class="form-control">
            <p class="pass-error-text">※パスワードが違います。</p>
            <router-link to="/user-info-detail"><div class="pass-update-con"><button class="info-update-btn">更新</button></div></router-link>
        </div>
    </div>
</div>
</template>
  <script>
    import PassUpdatePro1 from './PassUpdatePro.vue'

      export default {
        components: {
            PassUpdatePro1,
        }
      }
  </script>