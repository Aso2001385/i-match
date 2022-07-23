<template>
  <div class="sidebar__item--fixed">
    <div class="menu-box scrolly">
      <div class="menu_bar">
        <div class="menubar-container">
          <router-link to="/news-list">
            <button class="menu-list" id="menu-news"><span class="menu-image">⚪️</span>お知らせ</button>
          </router-link>
          <!-- <span class="menu-image">⚪️</span>
                    <a href="/news-list" class="menu-list" id="menu-news">お知らせ</a> -->
        </div>
        <div class="menubar-container">
          <router-link to="/recruit-list">
            <button class="menu-list" id="menu-recruit"><span class="menu-image">⚪️</span>掲示板</button>
          </router-link>
          <!-- <span class="menu-image">⚪️</span>
                    <a href="/recruit-list" class="menu-list" id="menu-recruit">掲示板</a> -->
        </div>
        <div class="menubar-container">
          <router-link to="/chat-list">
            <button class="menu-list" id="menu-chat"><span class="menu-image">⚪️</span>チャット</button>
          </router-link>
          <!-- <span class="menu-image">⚪️</span>
                    <a href="/chat-list" class="menu-list" id="menu-chat">チャット</a> -->
        </div>
        <div class="menubar-container">
          <router-link to="/user-list">
            <button class="menu-list" id="menu-user"><span class="menu-image">⚪️</span>ユーザーリスト</button>
          </router-link>
          <!-- <span class="menu-image">⚪️</span>
                    <a href="/recruit-list" class="menu-list" id="menu-user">ユーザーリスト</a> -->
        </div>
        <div class="menubar-container">
          <router-link to="/history-list">
            <button class="menu-list" id="menu-history"><span class="menu-image">⚪️</span>参加履歴</button>
          </router-link>
          <!-- <span class="menu-image">⚪️</span>
                    <a href="/recruit-list" class="menu-list" id="menu-history">参加履歴</a> -->
        </div>
        <div class="menubar-container">
          <!-- <router-link v-bind:to="{name: userrecruit.list, params: {userId: userId}}"> -->
          <router-link to="/user-recruit-list">
            <button class="menu-list" id="menu-account"><span class="menu-image">⚪️</span>アカウント名(仮)</button>
          </router-link>

          <!-- <a href="/user-recruit-list" class="menu-list" id="menu-account"></a> -->
        </div>
      </div>
    </div>
  </div>
</template>

<!-- ユーザー情報取得 -->
<script>
export default {}
</script>
