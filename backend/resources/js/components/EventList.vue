<template>
  <div>
    <div class="recruit-container">
      <RecruitSubmenu1></RecruitSubmenu1>
      <RecruitSorting1></RecruitSorting1>
      <div class="recruit recruit-box scroll">
        <div class="recruit-list" v-for="n in 10">
          <p>
            <span id="deadline">募集期間：</span>
            <span id="deadline-day">1月1日〜12月31日</span>
            <span id="people">１チーム：</span>
            <span id="people-count">5人まで</span>
          </p>
          <p class="title-sentence">自作WebAPI作成ハッカソン</p>
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
        <!-- <div class="recruit-list">
                    <p>
                        <span id="deadline">募集期間：</span>
                        <span id="deadline-day">1月1日〜12月31日</span>
                        <span id="people">１チーム：</span>
                        <span id="people-count">5人まで</span>
                    </p>
                    <p class="title-sentence">自作WebAPI作成ハッカソン</p>
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
                <div class="recruit-list">
                    <p>
                        <span id="deadline">募集期間：</span>
                        <span id="deadline-day">1月1日〜12月31日</span>
                        <span id="people">１チーム：</span>
                        <span id="people-count">5人まで</span>
                    </p>
                    <p class="title-sentence">自作WebAPI作成ハッカソン</p>
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
                <div class="recruit-list">
                    <p>
                        <span id="deadline">募集期間：</span>
                        <span id="deadline-day">1月1日〜12月31日</span>
                        <span id="people">１チーム：</span>
                        <span id="people-count">5人まで</span>
                    </p>
                    <p class="title-sentence">自作WebAPI作成ハッカソン</p>
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
                <div class="recruit-list">
                    <p>
                        <span id="deadline">募集期間：</span>
                        <span id="deadline-day">1月1日〜12月31日</span>
                        <span id="people">１チーム：</span>
                        <span id="people-count">5人まで</span>
                    </p>
                    <p class="title-sentence">自作WebAPI作成ハッカソン</p>
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
                <div class="recruit-list">
                    <p>
                        <span id="deadline">募集期間：</span>
                        <span id="deadline-day">1月1日〜12月31日</span>
                        <span id="people">１チーム：</span>
                        <span id="people-count">5人まで</span>
                    </p>
                    <p id="title-sentence">自作WebAPI作成ハッカソン</p>
                    <div class="skill-container">
                        <span class="skill">◯</span>
                        <span class="skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/recruit-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div> -->
      </div>
    </div>
    <SkillSearch1></SkillSearch1>
  </div>
</template>

<script>
import SkillSearch1 from './SkillSearch.vue'
import RecruitSubmenu1 from './RecruitSubmenu.vue'
import RecruitSorting1 from './RecruitSorting.vue'

export default {
  components: {
    SkillSearch1,
    RecruitSubmenu1,
    RecruitSorting1,
  },
}
</script>
