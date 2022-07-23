<template>
  <div>
    <SkillSignupTit1></SkillSignupTit1>
    <div class="skill-signup-container">
      <!-- <h2 id="skill-signup">スキル登録</h2> -->
      <div class="skillcheckbox-container scroll">
        <p class="skill-genre" id="skill-genre-lan">言語</p>
        <!--   ボタンの記述例
                 <router-link v-bind:to="{name: 'skillsignup.detail', params: {taskId: どのジャンルかをデータベースから取得して代入.id }}">
                    <button class="btn btn-success">Java</button>
                </router-link> -->

        <div class="skill-genre-con">
          <router-link to="/edit-detail">
            <div class="skill-button" v-for="(value, key) in LangBox" :key="key">
              <button type="submit" class="skill-sel"><span>◯</span>{{ value.name }}</button>
            </div>
          </router-link>
        </div>

        <p class="skill-genre" id="skill-genre-frame">フレームワーク</p>
        <div class="skill-genre-con">
          <router-link to="/edit-detail">
            <div class="skill-button" v-for="(value, key) in FrameBox" :key="key">
              <button type="submit" class="skill-sel"><span>◯</span>{{ value.name }}</button>
            </div>
          </router-link>
        </div>

        <p class="skill-genre" id="skill-genre-db">DB</p>
        <div class="skill-genre-con">
          <router-link to="/edit-detail">
            <div class="skill-button" v-for="(value, key) in DbBox" :key="key">
              <button type="submit" class="skill-sel"><span>◯</span>{{ value.name }}</button>
            </div>
          </router-link>
        </div>

        <p class="skill-genre" id="skill-genre-inf">インフラ</p>
        <div class="skill-genre-con">
          <router-link to="/edit-detail">
            <div class="skill-button" v-for="(value, key) in InfraBox" :key="key">
              <button type="submit" class="skill-sel"><span>◯</span>{{ value.name }}</button>
            </div>
          </router-link>
        </div>

        <p class="skill-genre" id="skill-genre-oft">その他</p>
        <div class="skill-genre-con">
          <router-link to="/edit-detail">
            <div class="skill-button" v-for="(value, key) in OftenBox" :key="key">
              <button type="submit" class="skill-sel"><span>◯</span>{{ value.name }}</button>
            </div>
          </router-link>
        </div>
      </div>
      <router-link to="/recruit-edit">
        <div class="skillsignup-back-btn"><button id="skillsignup-back-btn">戻る</button></div>
      </router-link>
      <!-- ローカルに一時的に保存したデータをデータベースに完全に保存する -->
      <router-link to="/recruit-edit">
        <div class="skillsignup-comp-btn"><button @click="set()" id="skillsignup-comp-btn">登録</button></div>
      </router-link>
      <!-- <div class="skillsignup-back-url"><a href="/UserAccountEdit" id="skillsignup-back-url">戻る</a></div> -->
      <!-- <div><button @click="set()">登録</button></div>
        <button @click="detaSet()">データの保存・削除</button> -->
    </div>
  </div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import SkillSignupTit1 from './SkillSignupTit.vue'
import axios from 'axios'
import skilllang from '../assets/skill-lang.json'
import skillframe from '../assets/skill-frame.json'
import skilldb from '../assets/skill-db.json'
import skillinfra from '../assets/skill-infra.json'
import skilloften from '../assets/skill-often.json'

export default {
  data: function () {
    return {
      // LangSkillJSON: [],
      LangBox: [],
      FrameBox: [],
      DbBox: [],
      InfraBox: [],
      OftenBox: [],
    }
  },
  methods: {
    async getLang() {
      var url = skilllang
      await axios.get(url).then(x => {
        this.LangBox = require('../assets/skill-lang.json')
      })
    },
    async getFrame() {
      var url = skillframe
      await axios.get(url).then(x => {
        this.FrameBox = require('../assets/skill-frame.json')
      })
    },
    async getDb() {
      var url = skilldb
      await axios.get(url).then(x => {
        this.DbBox = require('../assets/skill-db.json')
      })
    },
    async getInfra() {
      var url = skillinfra
      await axios.get(url).then(x => {
        this.InfraBox = require('../assets/skill-infra.json')
      })
    },
    async getOften() {
      var url = skilloften
      await axios.get(url).then(x => {
        this.OftenBox = require('../assets/skill-often.json')
      })
    },
  },
  mounted() {
    this.getLang()
    this.getFrame()
    this.getDb()
    this.getInfra()
    this.getOften()
  },
  components: {
    SkillSignupTit1,
  },
}
</script>
