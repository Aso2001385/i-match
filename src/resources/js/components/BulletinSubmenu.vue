<template>
<!-- サブメニュー -->
    <div class="submenu-bulletin">
        <router-link to="/event-list">
            <p class="submenu" id="submenu-event"><button class="submenu-button">イベント</button></p>
        </router-link>   
        <router-link to="/bulletin-list">
            <p class="submenu" id="submenu-recruitment"><button class="submenu-button">メンバー募集</button></p>
        </router-link>
        <!-- 仮の配置 aタグにするかbuttonにするか-->
        <router-link to="/create-bulletin">
            <p class="submenu" id="submenu-bulletin" style="float: left;"><button class="submenu-button">投稿作成(仮)</button></p>
        </router-link>
        <!-- <p class="submenu" id="submenu-bulletin"><a href="/create-bulletin">掲示板作成(仮)</a></p> -->
    </div>
</template>