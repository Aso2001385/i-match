<template>
<div>
    <UserInformationPro1></UserInformationPro1>
    <div class="user-information-detail">
        <div id="image-info-con">
            <p id="image-info-detail">◯</p>
            <router-link to="/user-info-detail">
                <div id="image-update-con"><button id="image-update-btn">画像変更</button></div>
            </router-link>
        </div>
        <div id="basic-info-con">
            <div class="info-update">
                <h3 id="basic-info-tit">基本情報　</h3>
                <!-- <router-link to="/basic-update-edit"> -->
                    <div class="info-update-con"><button class="info-update-btn">保存</button></div>
                <!-- </router-link> -->
            </div>
            <div id="basic-info">
                <p class="basic-info">▶︎ニックネーム：</p>
                <div class="basic-info"><input type="text" value="テスト" class="basic-info-text form-control"></div>
                <p class="basic-info">▶︎メールアドレス：</p>
                <div class="basic-info"><input type="text"  value="test@asojuku.ac.jp" class="basic-info-text form-control"></div>
                <p class="basic-info" id="basic-info-url"><a href="/pass-update">パスワード変更</a></p>
            </div>
            <div id="basic-info-pro">
                <p id="info-pro-tit">▶︎プロフィール文：</p>
                <div><textarea rows="5" cols="50" value="テストテスト" id="info-pro-text"></textarea></div>
            </div>
        </div>
        <div id="skill-info-con">
            <div class="info-update">
                <h3 id="skill-info-tit">スキル情報</h3>
                <router-link to="/skill-signup">
                    <div class="info-update-con"><button class="info-update-btn">更新</button></div>
                </router-link>
            </div>
            <div class="skill-info-box scroll">
                <p class="skill-info">▶︎言語：PHP・Java</p>
                <p class="skill-info">▶︎フレームワーク：Laravel・Spring</p>
                <p class="skill-info">▶︎DB：PostgreSQL・MySQL</p>
                <p class="skill-info">▶︎インフラ：Linux・AWS・Azure</p>
                <p class="skill-info">▶︎その他：figma・github</p>
            </div>
        </div>
        <!-- 削除完了画面を出す場合はルートの値を変える -->
        <router-link to="/top-dev-tit"><div class="user-account-con"><button class="user-account-btn">削除</button></div></router-link>
    </div>
</div>
</template>
  <script>
    import UserInformationPro1 from './UserInformationPro.vue'

      export default {
        components: {
            UserInformationPro1,
        }
      }
  </script>