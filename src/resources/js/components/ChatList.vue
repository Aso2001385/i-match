<template>
<div>
    <div class="chat-list">
        <UserChatTit1></UserChatTit1>
        <div class="chat-list-con chat-list-box scroll">
            <router-link to="/chat-room-tit">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/chat-room">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/chat-room">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/chat-room">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/chat-room">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/chat-room">
                <button class="chat-con-btn">
                    <div class="chat-con">
                        <p class="partner-name">相手のニックネーム</p>
                        <p class="chat-day">3/6 12:10</p>
                        <p class="final-chat">最終メッセージ</p>
                    </div>
                </button>
            </router-link>
        </div>
    </div>
</div>

</template>
  <script>
    import UserChatTit1 from './UserChatTit.vue'

    export default {
        components: {
            UserChatTit1,
        }
	}
  </script>