<!-- 掲示板詳細(自分側)編集用 -->
<template>
  <div class="recruit-detail">
    <div class="recruit-detail-your-container">
      <h3 class="recruit-title">●タイトル</h3>
      <p class="recruit-title-con">
        Flaskの勉強会をしませんか？
        <span class="recruit-cate">勉強会</span>
      </p>
      <h3 class="recruit-over">●概要</h3>
      <p class="recruit-over-con recruit-over-con-box scroll">
        概要の内容あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ
      </p>
      <h3 class="now-number">●募集人数</h3>
      <p class="now-number-count">3/6 人</p>
      <h3 id="recruit-day">●募集期限</h3>
      <p id="recruit-day-con">6月30日まで</p>
      <h3 class="recruit-skill-title">●スキル</h3>
      <p class="recruit-skill-con">・PHP・Laravel</p>
      <router-link to="/recruit-edit">
        <div class="recruit-detail-btn-con"><button class="recruit-detail-button">編集</button></div>
      </router-link>
    </div>
  </div>
</template>
