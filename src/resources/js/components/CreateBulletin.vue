<!-- 掲示板作成 -->
<template>
    <div class="create-bulletin">
        <div class="create-bulletin-container">
            <p id="content-title">内容</p>
            <p id="createbulletin-title">タイトル</p>
            <input type="text" name="bulletin-title" id="createbulletin-title-text">
            <p id="createbulletin-over">概要</p>
            <textarea name="overview-text" rows="4" cols="40" id="createbulletin-title-textarea"></textarea>
            <p id="createbulletin-rec">募集人数</p>
            <select name="rec-number" class="rec-number">
                <option value="1">2人</option>
                <option value="2">3人</option>
                <option value="3">4人</option>
                <option value="4">5人</option>
                <option value="5">6人</option>
                <option value="6">7人</option>
                <option value="7">8人</option>
                <option value="8">9人</option>
                <option value="9">10人</option>
            </select>
            <p id="createbulletin-cate">カテゴリ</p>
            <select name="category" class="category">
                <option value="1">開発</option>
                <option value="2">勉強会</option>
            </select>
            <p id="cratebulletin-skill">スキル</p>
            <router-link to="/add-skill">
                <div><button  id="add-url">追加</button></div>
            </router-link>
            <p class="add-skills">PHP・Laravel</p>
        </div>
            <router-link to="/bulletin-list">
                <div class="create-bulletin-url-con"><button id="create-bulletin-url">登録</button></div>
            </router-link>
    </div>
</template>