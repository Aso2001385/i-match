<template>
<div>
    <div class="news-list">
        <UserNewsTit1></UserNewsTit1>
        <div class="news-list-con news-list-box scroll">
            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">オファー</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">チャット</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">参加希望</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">オファー</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">オファー</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>

            <router-link to="/news-detail">
                <button class="news-con-btn">
                    <div class="news-con">
                        <p class="news-cate">オファー</p>
                        <p class="news-day">3/6 12:10</p>
                        <p class="news-title">〇〇さんからオファーが届いています。</p>
                    </div>
                </button>
            </router-link>
        </div>
    </div>
</div>

</template>
  <script>
    import UserNewsTit1 from './UserNewsTit.vue'

    export default {
        components: {
            UserNewsTit1,
        }
	}
  </script>