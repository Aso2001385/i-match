<!-- アカウントスキル詳細 -->
<template>
<div>
    <div class="userskill-detail">
        <p id="image-scss">◯</p>
        <div id="useraccount-edit-url"><a href="/userskill-detail" id="useraccount-edit">編集</a></div>
        <div id="basicinfo-container">
            <div class="userinfo-container">
                <p id="basicinfo-title">基本情報</p>
                <p class="user-information">ニックネーム：麻生太郎</p>
                <p class="user-information">メールアドレス：asoaso@aso.ac.jp</p>
            </div>
        </div>
        <div id="skillinfo-container">
            <div class="userinfo-container">
                <p id="skillinfo-title">スキル情報</p>
                <p class="skill-information">言語：<span><button @click="popup" class="skill-url">PHP</button>・<button @click="popup" class="skill-url">Java</button>・<button @click="popup" class="skill-url">Python</button>
                </span></p>
                <p class="skill-information">フレームワーク：<span><button @click="popup" class="skill-url">Laravel</button>・<button @click="popup" class="skill-url">Vue.js</button>・<button @click="popup" class="skill-url">Flask</button>
                </span></p>
                <p class="skill-information">DB：<span><button @click="popup" class="skill-url">MySQL</button>・<button @click="popup" class="skill-url">SQLite</button>・<button @click="popup" class="skill-url">MariaDB</button>
                </span></p>
                <p class="skill-information">インフラ：<span><button @click="popup" class="skill-url">AWS</button>・<button @click="popup" class="skill-url">Azure</button>・<button @click="popup" class="skill-url">Linux</button>
                </span></p>
                <p class="skill-information">その他：<span><button @click="popup" class="skill-url">figma</button>・<button @click="popup" class="skill-url">Github</button>・<button @click="popup" class="skill-url">Node.js</button>
                </span></p>
            </div>
        </div>
    </div>
    <UserSkillDetail1 v-if="skilldetail"></UserSkillDetail1>
    <div v-if="skilldetail" class="pop-con"><button @click="popup" class="pop-clo">✖️</button></div>
</div>

</template>
  <script>
    import UserSkillDetail1 from './UserSkillDetails.vue'

      export default {
        data() {
            return {
                skilldetail: false,
                isActive:true
            };
        },
        methods: {
            popup() {
                this.skilldetail = !(this.skilldetail);
            }
        },
        components: {

            UserSkillDetail1,
        }
      }

  </script>