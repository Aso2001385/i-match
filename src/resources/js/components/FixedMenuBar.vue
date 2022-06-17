<template>
    <div class="sidebar__item--fixed">
        <div class="menu-box scrolly">
            <div class="menu_bar">
                <div class="menubar-container">
                    <span class="menu-image">⚪️</span>
                    <a href="/news-list" class="menu-list" id="menu-news">お知らせ</a>
                </div>
                <div class="menubar-container">
                    <span class="menu-image">⚪️</span>
                    <a href="/bulletin-list" class="menu-list" id="menu-bulletin">掲示板</a>
                </div>
                <div class="menubar-container">
                    <span class="menu-image">⚪️</span>
                    <a href="/chat-list" class="menu-list" id="menu-chat">チャット</a>
                </div>
                <div class="menubar-container">
                    <span class="menu-image">⚪️</span>
                    <a href="/bulletin-list" class="menu-list" id="menu-user">ユーザーリスト</a>
                </div>
                <div class="menubar-container">
                    <span class="menu-image">⚪️</span>
                    <a href="/bulletin-list" class="menu-list" id="menu-history">参加履歴</a>
                </div>
                <div class="menubar-container">
                    <router-link v-bind:to="{name: userbulletin.list, params: {userId: userId}}">
                        <butten class="menu-list" id="menu-account"><span class="menu-image">⚪️</span>アカウント名(仮)</butten>
                    </router-link>
                    
                    <!-- <a href="/user-bulletin-list" class="menu-list" id="menu-account"></a> -->
                </div>
            </div>
        </div>
    </div>
</template>

<!-- ユーザー情報取得 -->
<script>
    export default {
        data: function () {
            return {
                // 初期にuseridを何かしら入れておく
                userId: 9999
            }
        },
        methods: {
            getUser() {
                // どんなurlを叩いたらユーザーのidを取得できるのか、福元くんと話し合う
                axios.get('/api/user')
                    .then((res) => {
                        this.userId = res.data;
                    });
            }
        },
        mounted() {
            this.getUser();
        }
    }

</script>