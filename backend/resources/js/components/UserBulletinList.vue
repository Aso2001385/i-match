<!-- アカウント情報 -->
  <template>
  <div>
      <div class="bulletin-container">
            <UserBulletinSpace1></UserBulletinSpace1>
            <div class="bulletin bulletin-box scroll">
                <div class="bulletin-list" v-for="n in 10">
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
                        <router-link to="/bulletin-detail-me">
                            <button class="readmore-detail">Read More</button>
                        </router-link>
                    </div>
                </div>
                <!-- <div class="bulletin-list">
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
                        <router-link to="/bulletin-detail-me">
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
                    <p class="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">◯</span>
                        <span class="skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/bulletin-detail-me">
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
                    <p class="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">◯</span>
                        <span class="skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/bulletin-detail-me">
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
                    <p class="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">◯</span>
                        <span class="skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/bulletin-detail-me">
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
                    <p class="title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="skill-container">
                        <span class="skill">◯</span>
                        <span class="skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <router-link to="/bulletin-detail-me">
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
    // import BulletinSorting1 from './BulletinSorting.vue'
    import UserInformation1 from './UserInformation.vue'
    import UserBulletinSpace1 from './UserBulletinSpace.vue'

    export default {
        components: {
            // BulletinSorting1,
            UserInformation1,
            UserBulletinSpace1,
        }
	}
  </script>

