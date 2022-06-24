<template>
<div>
    <div class="chat-room-tit">
        <h2 id="chat-user-name">チャットする相手のニックネーム</h2>
    </div>
    <ChatRoom1></ChatRoom1>
    <ChatEnter1></ChatEnter1>
</div>
</template>
<script>
import ChatRoom1 from './ChatRoom.vue'
import ChatEnter1 from './ChatEnter.vue'

    export default {
        // どのユーザ情報なのかpropを利用してデータを渡す
        data: function() {
            return {
                name: ''
            }
        },
        mathods: {
            chat_(name) {
                this.name = id;
            }
        },
        components: {
            ChatRoom1,
            ChatEnter1
        }
    }
</script>