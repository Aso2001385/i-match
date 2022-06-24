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
            <p class="submenu" id="submenu-bulletin" style="float: left;"><button class="submenu-button">投稿作成</button></p>
        </router-link>
        <!-- <div class="sorting-bulletin"> -->
        <select name="sorting" class="sorting">
            <!-- valueが0の状態がデフォの状態 -->
            <option value="0">並び替え</option>
            <option value="1">新着順</option>
            <option value="2">投稿順</option>
            <option value="3">締め切りが近い順</option>
        </select>
    <!-- </div> -->
    </div>
</template>