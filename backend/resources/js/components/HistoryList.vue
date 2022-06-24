<template>
<div>
    <div class="historys-list">
        <HistoryListTit1></HistoryListTit1>
        <div class="historys-list-con historys-list-box scroll">
            <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>

            <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>

            <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>

            <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>

             <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>

            <router-link to="/history-detail">
                <button class="historys-con-btn">
                    <div class="historys-con">
                        <p class="historys-title">〇〇さんからオファーが届いています。</p>
                        <p class="historys-day">実施期間　<span>3/6 12:10~ 3/10 24:00</span></p>
                    </div>
                </button>
            </router-link>
        </div>
    </div>
</div>
</template>
<script>
    import HistoryListTit1 from './HistoryListTit.vue'

    export default {
        components: {
            HistoryListTit1,
        }
	}
</script>