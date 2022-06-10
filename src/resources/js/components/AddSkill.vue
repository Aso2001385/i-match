<template>
<div>
    <div class="add-skill">
        <div class="addskill-container">
            <p id="required-skill">スキル</p>
            <div class="add-skill-con">
                <h2 id="skillcard-title">スキルカード</h2>
                <div id="skill-card-img-con">
                    <p class="skill-card-image">◯</p>
                    <p id="sublang-image">◯</p>
                </div>
                <p class="skill-card-title">利用スキル</p>
                <select name="addskill-sorting" class="skill-sorting">
                    <option v-for="(value,key) in SkillJSON" :key="key">{{ value.name }}</option>
                </select>
                <p class="about-skill-tit">レベル</p>
                <select name="addlevel-sorting" class="level-sorting">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p class="about-skill-tit">開発経験</p>
                <select name="addexp-sorting" class="exp-sorting">
                    <option value="1">あり</option>
                    <option value="2">なし</option>
                </select>
            </div>
        </div>
        <div id="addskill-btn-con">
            <router-link to="/create-bulletin"><button id="add-button">追加</button></router-link>
            <router-link to="/create-bulletin"><button id="addskill-back-url">戻る</button></router-link>
        </div>
    </div>

</div>
</template>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import axios from 'axios';
import skill from '../assets/skill.json';
    export default {
        data: function() {
            return {
                SkillJSON: [],
            }
            
        },
        methods: {
            async getSkill() {
            var url = skill;
            await axios.get(url).then(x => { this.SkillJSON = require("../assets/skill.json") })
            }

        },
        mounted(){
            this.getSkill();
        }
    }
</script>