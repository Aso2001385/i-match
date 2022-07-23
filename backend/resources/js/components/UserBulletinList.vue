<!-- アカウント情報 -->
<template>
  <div>
    <div class="recruit-container">
      <UserRecruitSpace1></UserRecruitSpace1>
      <div class="recruit recruit-box scroll">
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
            <router-link to="/recruit-detail-me">
              <button class="readmore-detail">Read More</button>
            </router-link>
          </div>
        </div>
        <!-- <div class="recruit-list">
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
                        <router-link to="/recruit-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="recruit-list">
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
                        <router-link to="/recruit-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="recruit-list">
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
                        <router-link to="/recruit-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="recruit-list">
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
                        <router-link to="/recruit-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="recruit-list">
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
                        <router-link to="/recruit-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div> -->
      </div>
    </div>
    <UserInformation1></UserInformation1>
  </div>
</template>

<script>
// import RecruitSorting1 from './RecruitSorting.vue'
import UserInformation1 from './UserInformation.vue'
import UserRecruitSpace1 from './UserRecruitSpace.vue'

export default {
  components: {
    // RecruitSorting1,
    UserInformation1,
    UserRecruitSpace1,
  },
}
</script>
