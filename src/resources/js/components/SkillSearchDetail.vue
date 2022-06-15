<template>
<div>
    <div class="skill-search-detail">
        <p id="skill-card">詳細設定</p>
        <div id="search-skillimage-container">
            <p id="skillimage-scss">◯</p>
            <p id="subskillimage-scss">◯</p>
        </div>
        <!-- <h2 id="skillname">{{ id }}</h2> -->
        <h2 id="skillname">{{ name }}</h2>
        <div id="skilldetail-container">
            <p class="search-about-skill">レベル</p>
            <select name="search-level-sorting" class="search-level-sorting" v-model="level">
                <option value="0">レベル１</option>
                <option value="1">レベル２</option>
                <option value="2">レベル３</option>
                <option value="3">レベル４</option>
                <option value="4">レベル５</option>
            </select>
            <p class="search-about-skill">開発経験</p>
            <select name="search-exp-sorting" class="search-exp-sorting" v-model="exp">
                <option value="0">YES</option>
                <option value="1">NO</option>
            </select>
        </div>
        <div class="skilldel-save-con"><button @click="skill_save" class="skilldel-save-btn">保存</button></div>
        
    </div>
    <div class="search-pop-con"><button @click="skill_pop_back" class="pop-clo">✖️</button></div>
</div>
</template>
<script>

    export default {
        props: {
            id: {
                type: Number
            },
            name: {
                type: String
            }
        },
        data: function() {
            return {
                level: '',
                exp: '',
                skillBox: [],
                levelBox: [],
                expBox: [],
            }  
        },
        mounted(){
            // 後でセッションでの管理にする
            if(localStorage.levelBox){
                this.skillBox = localStorage.skillBox;
                this.levelBox = localStorage.levelBox;
                this.expBox = localStorage.expBox;
            }
           
        },
        methods: {
            skill_save() {
                localStorage.skillBox = this.id;
                localStorage.levelBox = this.level;
                localStorage.expBox = this.exp;
                 this.$router.go({ name: 'bulletin.list' });
            },
            skill_pop_back() {
                this.$router.go({ name: 'bulletin.list' });
            }
        },

    }
</script>
