  <template>
  <div>
      <div class="user-container">
            <UserListTit1></UserListTit1>
            <div class="user user-box scroll">
                <div class="user-list" v-for="n in 10">
                    <p class="user-title-sentence">ニックネーム</p>
                        <div class="user-readmore-container">
                            <router-link to="/partner-user-detail">
                                <button class="user-readmore-detail">💬</button>
                            </router-link>
                        </div>
                        <div class="user-skill-con">
                            <p class="user-skill-image"><span>〇 〇</span></p>
                        </div>
                </div>

                <!-- <div class="user-list">
                    <p class="user-title-sentence">ニックネーム</p>
                    <div class="user-readmore-container">
                        <router-link to="/partner-user-detail">
                            <button class="user-readmore-detail">💬</button>
                        </router-link>
                    </div>
                    <div class="user-skill-con">
                        <p class="user-skill-image"><span>〇 〇</span></p>
                    </div>
                </div>

                <div class="user-list">
                    <p class="user-title-sentence">ニックネーム</p>
                    <div class="user-readmore-container">
                        <router-link to="/partner-user-detail">
                            <button class="user-readmore-detail">💬</button>
                        </router-link>
                    </div>
                    <div class="user-skill-con">
                        <p class="user-skill-image"><span>〇 〇</span></p>
                    </div>
                </div>

                <div class="user-list">
                    <p class="user-title-sentence">ニックネーム</p>
                    <div class="user-readmore-container">
                        <router-link to="/partner-user-detail">
                            <button class="user-readmore-detail">💬</button>
                        </router-link>
                    </div>
                    <div class="user-skill-con">
                        <p class="user-skill-image"><span>〇 〇</span></p>
                    </div>
                </div>

                <div class="user-list">
                    <p class="user-title-sentence">ニックネーム</p>
                    <div class="user-readmore-container">
                        <router-link to="/partner-user-detail">
                            <button class="user-readmore-detail">💬</button>
                        </router-link>
                    </div>
                    <div class="user-skill-con">
                        <p class="user-skill-image"><span>〇 〇</span></p>
                    </div>
                </div>

                <div class="user-list">
                    <p class="user-title-sentence">ニックネーム</p>
                    <div class="user-readmore-container">
                        <router-link to="/partner-user-detail">
                            <button class="user-readmore-detail">💬</button>
                        </router-link>
                    </div>
                    <div class="user-skill-con">
                        <p class="user-skill-image"><span>〇 〇</span></p>
                    </div>
                </div> -->

            </div>
      </div>
      <SkillSearch1></SkillSearch1>
  </div>

        
      
  </template>
  
  <script>
    import SkillSearch1 from './SkillSearch.vue'
    import UserListTit1 from './UserListTit.vue'

      export default {
        components: {
            SkillSearch1,
            UserListTit1,
        }
      }
  </script>