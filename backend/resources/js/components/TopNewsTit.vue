<template>
    <div class="top-news-tit">
        <h2 id="top-news-tit">お知らせ</h2>
        <select name="top-news-sorting" class="top-news-sorting">
            <option value="0">新着順</option>
            <option value="1">投稿順</option>
        </select>
      <TopNewsList1></TopNewsList1>
    </div>

</template>
  <script>
  import TopNewsList1 from './TopNewsList.vue';
      export default {
        components: {
          TopNewsList1,
        }
      }
  </script>