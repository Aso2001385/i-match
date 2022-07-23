<template>
  <div>
    <div class="recruit-container">
      <RecruitSubmenu1></RecruitSubmenu1>
      <div class="recruit recruit-box scroll">
        <!-- <div class="recruit-list" v-for="(value,key) in users" :key="key"> -->
        <div class="recruit-list" v-for="n in 10">
          <p>
            <span id="deadline">募集締め切り：</span>
            <span id="deadline-day">1月1日(仮)</span>
            <span id="people">募集人数：</span>
            <span id="people-count">3/6人(仮)</span>
          </p>
          <p class="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
          <div class="skill-container">
            <span class="skill">◯</span>
            <span class="skill">◯</span>
          </div>
          <div class="readmore-container">
            <router-link to="/recruit-detail-your">
              <button class="readmore-detail">Read More</button>
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <SkillSearch1></SkillSearch1>
  </div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import SkillSearch1 from './SkillSearch.vue'
import RecruitSubmenu1 from './RecruitSubmenu.vue'

export default {
  data() {
    return {
      class: '',
      name: '',
      email: '',
      password: '',
      users: [],
    }
  },
  methods: {
    getUsers: function () {
      axios
        .get('/api/user')
        .then(res => {
          // 全てのユーザーのclass、name、email取得
          console.log(res)
          this.users = res.data.users
        })
        .catch(err => {
          console.log(err)
        })
    },
    getRecruit: function () {
      // 掲示板の内容取得
    },
  },
  mounted() {
    // getUsers();
    // getRecruit();
  },
  components: {
    SkillSearch1,
    RecruitSubmenu1,
  },
}
</script>
