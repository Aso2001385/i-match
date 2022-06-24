<template>
<div>
    <SkillSignupDetailTit1></SkillSignupDetailTit1>
    <div class="skillsignup-detail-container">
        <p id="skillimage-detail">◯</p>
        <p id="skill-title">Vue.js</p>
        <div class="about-skill-con">
            <p class="about-skill">レベル</p>
            <select name="level-sorting" class="lev-sorting">
                <option value="0">レベル１</option>
                <option value="1">レベル２</option>
                <option value="2">レベル３</option>
                <option value="4">レベル４</option>
                <option value="5">レベル５</option>
            </select>
        </div>

        <div class="about-skill-con" id="about-skill-exp">
            <p class="about-skill">開発経験</p>
            <select name="exp-sorting" class="ex-sorting">
                <option value="0">あり</option>
                <option value="1">なし</option>
            </select>
        </div>
        <div class="skill-signup-con">
            <router-link to="/bulletin-edit"><button id="skillsignupdetail-url">登録</button></router-link>
            <router-link to="/bulletin-edit-detail"><button id="skillsignupdetail-back-url">戻る</button></router-link>
        </div>
    </div>
</div>
</template>
<script>
import SkillSignupDetailTit1 from './SkillSignupDetailTit.vue';
    export default {
        components: {
            SkillSignupDetailTit1,
        }
    }
</script>
