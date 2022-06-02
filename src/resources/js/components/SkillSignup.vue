<template>
    <div class="skillsignup-detail-container">
        <h2 id="skill-signup">スキル登録</h2>
        <div class="skillcheckbox-container">
            <p class="skill-genre">言語</p>
            <!--   ボタンの記述例
                 <router-link v-bind:to="{name: 'skillsignup.detail', params: {taskId: どのジャンルかをデータベースから取得して代入.id }}">
                    <button class="btn btn-success">Java</button>
                </router-link> -->
            <div class="skill-genre-con">
                <router-link to="/skill-signup-detail">
                    <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Java</button></div>
                </router-link>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>PHP</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>JavaScript</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Python</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>C</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>C++</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>C#</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>GO</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Kotlin</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Swift</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Ruby</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>HTML</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>CSS</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>SQL</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>mark down</button></div>
            </div>

            <p class="skill-genre">フレームワーク</p>
            <div class="skill-genre-con">
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Spring</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Laravel</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>CakePHP</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Symfony</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>React</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Angular</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Vue.js</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Next.js</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Nuxt.js</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Django</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Flask</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Qt</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Sinatra</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Tailwind CSS</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Bulma</button></div>
            </div>
            <p class="skill-genre">DB</p>
            <div class="skill-genre-con">
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>PostgreSQL</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Oracle Database</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>MongoDB</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>MySQL</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>SQLite</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>MariaDB</button></div>
            </div>
            <p class="skill-genre">インフラ</p>
            <div class="skill-genre-con">
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Linux</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Windows</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>iOS</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Android</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>AWS</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Azure</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Google Cloud</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Firebase</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Salesforce</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Docker</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>xampp</button></div>
            </div>
            <p class="skill-genre">その他</p>
            <div class="skill-genre-con">
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>figma</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>github</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>git</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Swagger</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Postman</button></div>
                <div class="skill-button"><button type="submit" class="skill-sel"><span>◯</span>Node.js</button></div>
            </div>
        </div>
        <router-link to="/UserAccountEdit">
            <div class="skillsignup-back-btn"><button id="skillsignup-back-btn">戻る</button></div>
        </router-link>
        <!-- ローカルに一時的に保存したデータをデータベースに完全に保存する -->
        <router-link to="/bulletin-list">
            <div class="skillsignup-comp-btn"><button  @click="set()" id="skillsignup-comp-btn">登録</button></div>
        </router-link>
        <!-- <div class="skillsignup-back-url"><a href="/UserAccountEdit" id="skillsignup-back-url">戻る</a></div> -->
        <!-- <div><button @click="set()">登録</button></div>
        <button @click="detaSet()">データの保存・削除</button> -->
    </div>
</template>
<script>
      export default {
        methods: {
            set() {
                localStorage.setItem('obj', JSON.stringify({
                    id: 1,
                    name: 'tanaka',
                    age: 20
                }))
            },
            detaSet() {
                // 保存したら配列を削除するようにする(登録するスキルの配列)
                localStorage.removeItem('obj');
                localStorage.clear();
            }   
        }
      }
</script>