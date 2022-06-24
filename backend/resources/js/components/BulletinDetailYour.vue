<!-- 掲示板詳細(相手側)申し込み用 -->
<template>
    <div class="bulletin-detail">
        <div class="bulletin-detail-your-container">
            <h3 class="bulletin-title">●タイトル</h3>
            <p class="bulletin-title-con">Flaskの勉強会をしませんか？
                <span class="bulletin-cate">勉強会</span>
            </p>
            <h3 class="bulletin-over">●概要</h3>
            <p class="bulletin-over-con bulletin-over-con-box scroll">概要の内容あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああの内容あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ内容あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああの内容ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
            <h3 class="now-number">●募集人数</h3>
            <p class="now-number-count">3/6 人</p>
            <h3 id="bulletin-day">●募集期限</h3>
            <p id="bulletin-day-con">6月30日まで</p>
            <h3 class="bulletin-skill-title">●スキル</h3>
            <p class="bulletin-skill-con">・PHP・Laravel</p>
            <router-link to="/bulletin-list">
                <div class="bulletin-detail-btn-con"><button class="bulletin-detail-button">申し込み</button></div>
            </router-link>

        </div>
    </div>
</template>