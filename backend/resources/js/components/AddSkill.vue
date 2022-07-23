<template>
  <div>
    <div class="add-skill">
      <div class="addskill-container">
        <p id="required-skill">スキル</p>
        <div class="add-skill-con">
          <h2 id="skillcard-title">スキルカード</h2>
          <div id="skill-card-img-con">
            <p class="skill-card-image">◯</p>
            <p id="sublang-image">◯</p>
          </div>
          <!-- <form v-on:submit="SkillSave"> -->
          <p class="skill-card-title">利用スキル</p>
          <select name="addskill-sorting" class="skill-sorting">
            <!-- <option v-for="(value,key) in SkillJSON" :key="key">value.name </option> -->
            <option value="1">value.name</option>
          </select>
          <p class="about-skill-tit">レベル</p>
          <select name="addlevel-sorting" class="level-sorting">
            <option value="1">レベル1</option>
            <option value="2">レベル2</option>
            <option value="3">レベル3</option>
            <option value="4">レベル4</option>
            <option value="5">レベル5</option>
          </select>
          <p class="about-skill-tit">開発経験</p>
          <select name="addexp-sorting" class="exp-sorting">
            <option value="1">あり</option>
            <option value="2">なし</option>
          </select>
        </div>
      </div>
      <div id="addskill-btn-con">
        <router-link to="/create-recruit"><button id="add-button">追加</button></router-link>
        <!-- </form> -->
        <router-link to="/create-recruit"><button id="addskill-back-url">戻る</button></router-link>
      </div>
    </div>
  </div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import axios from 'axios'
import skill from '../assets/skill.json'
export default {
  data: function () {
    return {
      SkillJSON: [],
    }
  },
  methods: {
    async getSkill() {
      var url = skill
      await axios.get(url).then(x => {
        this.SkillJSON = require('../assets/skill.json')
      })
    },
    // スキルの情報を配列形式にどんどん保存していく
    // 保存ができたら掲示板作成の画面に戻る
    // async SkillSave() {
    //     var SkillObj = {
    //         skillId: '',
    //         skillLevel: ''
    //     };
    //     sessionStorage.setItem('skill_obj', JSON.stringify(SkillObj));
    //     this.$router.push({name: 'create.recruit'});
    // }
  },
  mounted() {
    this.getSkill()
  },
}
</script>
<!--
    スキルをセッション上に保存していく
        $user = Auth::user()->name;
        $user_email = \Auth::user()->email;
        $script = "<script> sessionStorage.setItem('user','$user') </script>";
        $script_email = "<script> sessionStorage.setItem('user_email','$user_email') </script>";
        echo $script;
        echo $script_email; -->
