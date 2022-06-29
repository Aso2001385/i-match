<template>
    <div>
        <div class="top-tit-con" id="top-dev-tit">
            <h2 class="top-title-name">開発グループ募集</h2>
        </div>
        <TopDevList1></TopDevList1>
        <TopStyTit1></TopStyTit1>
        <TopStyList1></TopStyList1>
        <TopNewsTit1></TopNewsTit1>
    </div>
</template>
<script>
// 開発のリスト、勉強会のリスト、お知らせリストを表示するようにする
import TopStyTit1 from './TopStyTit';
import TopDevList1 from './TopDevList';
import TopStyList1 from './TopStyList';
import TopNewsTit1 from './TopNewsTit.vue';


       export default {
        components: {
            TopStyTit1,
            TopDevList1,
            TopStyList1,
            TopNewsTit1,
        }
      }
</script>