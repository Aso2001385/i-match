<template>
  <div class="skillsignup-detail-container">
    <h2 id="skill-signup-detail">スキル詳細</h2>
    <p id="skillimage-detail">◯</p>
    <p id="skill-title">Vue.js</p>
    <div class="about-skill-con">
      <p class="about-skill">レベル</p>
      <select name="level-sorting" class="level-sorting">
        <option value="0">レベル１</option>
        <option value="1">レベル２</option>
        <option value="2">レベル３</option>
        <option value="4">レベル４</option>
        <option value="5">レベル５</option>
      </select>
    </div>

    <div class="about-skill-con" id="about-skill-exp">
      <p class="about-skill">開発経験</p>
      <select name="exp-sorting" class="exp-sorting">
        <option value="0">あり</option>
        <option value="1">なし</option>
      </select>
    </div>
    <div class="skill-signup-con">
      <router-link to="/recruit-list"><button id="skillsignupdetail-url">登録</button></router-link>
      <router-link to="/skill-signup"><button id="skillsignupdetail-back-url">戻る</button></router-link>
    </div>
  </div>
</template>
