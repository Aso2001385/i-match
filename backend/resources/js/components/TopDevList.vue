<template>
  <div class="top-dev-list">
    <div class="top-dev-recruit">
      <div class="top-recruit-list" v-for="n in 3">
        <p>
          <span id="deadline">募集締め切り：</span>
          <span id="deadline-day">1月1日(仮)</span>
          <span id="people">募集人数：</span>
          <span id="people-count">3/6人(仮)</span>
        </p>
        <p id="top-title-sentence">Flaskの勉強会をしませんか？(仮)</p>
        <div class="top-skill-container">
          <span class="top-skill">◯</span>
          <span class="top-skill">◯</span>
        </div>
        <div class="readmore-container">
          <router-link to="/recruit-detail-your">
            <button class="readmore-detail">Read More</button>
          </router-link>
        </div>
      </div>
      <!-- <div class="top-recruit-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="top-title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="top-skill-container">
                        <span class="top-skill">◯</span>
                        <span class="top-skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div>
                <div class="top-recruit-list">
                    <p>
                        <span id="deadline">募集締め切り：</span>
                        <span id="deadline-day">1月1日(仮)</span>
                        <span id="people">募集人数：</span>
                        <span id="people-count">3/6人(仮)</span>
                    </p>
                    <p id="top-title-sentence">Flaskの勉強会をしませんか？(仮)</p>
                    <div class="top-skill-container">
                        <span class="top-skill">◯</span>
                        <span class="top-skill">◯</span>
                    </div>
                    <div class="readmore-container">
                        <button class="readmore-detail">Read More</button>
                    </div>
                </div> -->
    </div>
  </div>
</template>
