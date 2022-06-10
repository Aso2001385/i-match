  <template>
  <div>
      <div class="bulletin-container">
            <BulletinSubmenu1></BulletinSubmenu1>
            <BulletinSorting1></BulletinSorting1>
            <div class="bulletin bulletin-box scroll">
                <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/bulletin-detail-your">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div>
                <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div>
                    <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div>
                    <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div>
                    <div class="bulletin-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">スキルの画像(仮)</span>
                        <span class="skill">スキルの画像(仮)</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
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