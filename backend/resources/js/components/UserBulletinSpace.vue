<!-- アカウント情報には表示されないサブメニューの仮のコンポーネント -->
<template>
    <div class="submenu-bulletin-space">
        <p id="submenu-bulletin-tit">アカウント情報</p>
        <select name="sorting" class="user-sorting">
            <!-- valueが0の状態がデフォの状態 -->
            <option value="0">並び替え</option>
            <option value="1">新着順</option>
            <option value="2">投稿順</option>
            <option value="3">締め切りが近い順</option>
        </select>
    </div>
</template>