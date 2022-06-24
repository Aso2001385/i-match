<template>
    <div class="news-detail">
        <p id="name-cate">オファー</p>
        <div class="news-detail-con">
            <h2 id="news-detail-tit">〇〇さんからのオファー</h2>
            <h5 id="news-detail-day">3/6 12:10</h5>
        </div>
        <div class="news-detail-content">
            <p id="from-who">〇〇さんから</p>
            <p id="news-detail-content">〇〇さんへオファーが来ました。あああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>
        </div>
        <div class="news-detail-con">
            <router-link to="/news-list">
                <div class="consent-con"><button id="consent-btn">承諾</button></div>
            </router-link>
            
            <router-link to="/news-list">
                <div class="torn-down-con"><button id="torn-down-btn">断る</button></div>
            </router-link>
            
        </div>
    </div>
</template>