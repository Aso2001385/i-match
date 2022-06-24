<!-- アカウントスキル詳細 -->
<template>
<div>
    <div class="userskill-detail">
        <div id="basicinfo-container">
            <p id="image-scss">◯</p>
            <p class="user-information">麻生太郎</p>
            <p class="user-information" id="user-info-text">asoaso@aso.ac.jp</p>
            <router-link to="/user-info-detail">
                <div id="useraccount-edit-url"><button id="useraccount-edit">編集</button></div>
            </router-link>
        </div>
        <div id="skillinfo-container">
            <div class="userinfo-container">
                <p id="skillinfo-title">スキル一覧</p>
                <div class="user-skill-box scrolly">
                    <p class="skill-information">▶︎言語：<span><button @click="popup" class="skill-url">PHP</button>・<button @click="popup" class="skill-url">Java</button>・<button @click="popup" class="skill-url">Python</button>
                    </span></p>
                    <p class="skill-information">▶︎フレームワーク：<span><button @click="popup" class="skill-url">Laravel</button>・<button @click="popup" class="skill-url">Vue.js</button>・<button @click="popup" class="skill-url">Flask</button>
                    </span></p>
                    <p class="skill-information">▶︎DB：<span><button @click="popup" class="skill-url">MySQL</button>・<button @click="popup" class="skill-url">SQLite</button>・<button @click="popup" class="skill-url">MariaDB</button>
                    </span></p>
                    <p class="skill-information">▶︎インフラ：<span><button @click="popup" class="skill-url">AWS</button>・<button @click="popup" class="skill-url">Azure</button>・<button @click="popup" class="skill-url">Linux</button>
                    </span></p>
                    <p class="skill-information">▶︎その他：<span><button @click="popup" class="skill-url">figma</button>・<button @click="popup" class="skill-url">Github</button>・<button @click="popup" class="skill-url">Node.js</button>
                    </span></p>
                </div>

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