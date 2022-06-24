  <template>
  <div>
      <div class="bulletin-container">
            <BulletinSubmenu1></BulletinSubmenu1>
            <BulletinSorting1></BulletinSorting1>
            <div class="bulletin bulletin-box scroll">
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
            </div>
      </div>
      <SkillSearch1></SkillSearch1>
  </div>

        
      
  </template>
  
  <script>
    import SkillSearch1 from './SkillSearch.vue'
    import BulletinSubmenu1 from './BulletinSubmenu.vue'
    import BulletinSorting1 from './BulletinSorting.vue'

      export default {
        components: {
            SkillSearch1,
            BulletinSubmenu1,
            BulletinSorting1
        }
      }
  </script>