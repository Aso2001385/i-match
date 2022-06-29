<template>
    <div class="chat-room chat-room-box scroll">
        <!-- <div class="skill-checkcon" v-for="(value,key) in LangBox" :key="key">
            <p class="" :id="key">{{ value.name }}</p>
        </div> -->

        <!-- 自分と相手でdivのclass名を変えて表示する場所を変える -->
        <div v-for="item in 11">
            <div v-if="item%2 == 1">
                <div class="chat-container-partner">
                    <p class="chat-day">1/1<span>12:12:32</span></p>
                    <div class="chat-content-con-partner">
                        <p class="chat-content">こんにちは。これは、例です。</p>
                    </div>
            </div>
            </div>
            <div v-else>
                <div class="chat-container-me">
                    <p class="chat-day">1/1<span>12:12:32</span></p>
                    <div class="chat-content-con-me">
                        <p class="chat-content">こんにちは。これは、例です。あああああああああああああああああああああああああああああああああああああ</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="search-space"></div>
    </div>
</template>
<script>
    export default {
        props: {
            // どのユーザか名前を入れる
            // user_name: String
        },
        data: function() {
            return {
            }
            
        },
        methods: {
        },
        mounted(){
        },
        components: {
            
        }
    }
</script>