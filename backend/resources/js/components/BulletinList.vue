  <template>
  <div>
      <div class="bulletin-container">
            <BulletinSubmenu1></BulletinSubmenu1>
            <div class="bulletin bulletin-box scroll">
                <!-- <div class="bulletin-list" v-for="(value,key) in users" :key="key"> -->
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
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    import SkillSearch1 from './SkillSearch.vue'
    import BulletinSubmenu1 from './BulletinSubmenu.vue'

      export default {
        data() {
            return{
                class: '',
                name: '',
                email: '',
                password: '',
                users: []
             }
        },
        methods: {
            getUsers: function () {
                axios
                    .get("/api/user")
                    .then((res) => {
                        // 全てのユーザーのclass、name、email取得
                        console.log(res);
                        this.users = res.data.users;

                    })
                    .catch((err) => {
                        console.log(err);
                    })
            },
            getBulletin: function () {
                // 掲示板の内容取得
            }
    
        },
        mounted(){
            // getUsers();
            // getBulletin();
        },
        components: {
            SkillSearch1,
            BulletinSubmenu1,
        }
      }
  </script>