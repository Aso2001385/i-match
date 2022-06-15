<template>
<div>
    <div id="skillsearch-container">
        <h3 class="search-title">検索</h3>
        <input type="text" id="serch-text" class="form-control" value="">
        <div class="serch-btn-con"><button class="serch-button" id="serch-button1">検索</button></div>
        <div class="skill-contailer skill-search-box scroll">
            <div class="lan-container">
                <div class="skill-genle" id="lan-subtitle"><b>言語</b></div>
                    <div class="skill-check-image">
                    <div class="skill-checkcon" v-for="(value,key) in LangBox" :key="key">
                        <!-- <router-link :to="{ name: 'skill.search.detail', params: {id: value.id,name: value.name} }"> -->
                            <button @click="detail_popup(value.id,value.name)" class="skill-check-url" :id="key">{{ value.name }}</button>
                        <!-- </router-link> -->
                    </div>
                </div>

            </div>
            <div class="frame-container">
                <div class="skill-genle" id="frame-subtitle"><b>フレームワーク</b></div>
                    <div class="skill-check-image">
                    <div class="skill-checkcon" v-for="(value,key) in FrameBox" :key="key">
                        <!-- <router-link :to="{ name: 'skill.search.detail', params: {id: value.id,name: value.name} }"> -->
                            <button class="skill-check-url">{{ value.name }}</button>
                        <!-- </router-link> -->
                    </div>
                </div>
            </div>

            <div class="db-container">
                <div class="skill-genle" id="db-subtitle"><b>DB</b></div>
                <div class="skill-check-image">
                    <div class="skill-checkcon" v-for="(value,key) in DbBox" :key="key">
                        <!-- <router-link :to="{ name: 'skill.search.detail', params: {id: value.id,name: value.name} }"> -->
                            <button class="skill-check-url">{{ value.name }}</button>
                        <!-- </router-link> -->
                    </div>
                </div>
            </div>
            
            <div class="infra-container">
                <div class="skill-genle" id="infra-subtitle"><b>インフラ</b></div>
                <div class="skill-check-image">
                    <div class="skill-checkcon" v-for="(value,key) in InfraBox" :key="key">
                        <!-- <router-link :to="{ name: 'skill.search.detail', params: {id: value.id,name: value.name} }"> -->
                            <button class="skill-check-url">{{ value.name }}</button>
                        <!-- </router-link> -->
                    </div>
                </div>
            </div>
            
            <div class="oth-container">
                <div class="skill-genle" id="oth-subtitle"><b>その他</b></div>
                <div class="skill-check-image">
                    <div class="skill-checkcon" v-for="(value,key) in OftenBox" :key="key">
                        <!-- <router-link :to="{ name: 'skill.search.detail', params: {id: value.id,name: value.name} }"> -->
                            <button class="skill-check-url">{{ value.name }}</button>
                        <!-- </router-link> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="serch-btn-con"><button class="serch-button" id="serch-button2">検索</button></div>
    </div>
    <!-- <SkillSearchDetail1 v-if="skillDetail" v-bind:id="skillInfo"></SkillSearchDetail1> -->
    <SkillSearchDetail1 v-if="skillDetail" v-bind:id="skillInfo" v-bind:name="skillName"></SkillSearchDetail1>
    
</div>
</template>

<script src="https://unpkg.com/axios/dist/axios.min.js">
</script>
<script>
import axios from 'axios';
import skilllang from '../assets/skill-lang.json';
import skillframe from '../assets/skill-frame.json';
import skilldb from '../assets/skill-db.json';
import skillinfra from '../assets/skill-infra.json';
import skilloften from '../assets/skill-often.json';
import SkillSearchDetail1 from './SkillSearchDetail.vue';



    export default {
        data: function() {
            return {
                LangBox: [],
                FrameBox: [],
                DbBox: [],
                InfraBox: [],
                OftenBox: [],
                skillDetail: false,
                skillInfo: 99,
                skillName: "",
            }
            
        },
        methods: {
            async getLang() {
            var url = skilllang;
            this.checkcnt = this.checkcnt + 1;
            await axios.get(url).then(x => { this.LangBox = require("../assets/skill-lang.json") })
            },
            async getFrame() {
            var url = skillframe;
            await axios.get(url).then(x => { this.FrameBox = require("../assets/skill-frame.json") })
            },
            async getDb() {
            var url = skilldb;
            await axios.get(url).then(x => { this.DbBox = require("../assets/skill-db.json") })
            },
            async getInfra() {
            var url = skillinfra;
            await axios.get(url).then(x => { this.InfraBox = require("../assets/skill-infra.json") })
            },
            async getOften() {
            var url = skilloften;
            await axios.get(url).then(x => { this.OftenBox = require("../assets/skill-often.json") })
            },
            detail_popup(id,name) {
                this.skillInfo = id;
                this.skillName = name;
                this.skillDetail = !(this.skillDetail);
            }

        },
        mounted(){
            this.getLang();
            this.getFrame();
            this.getDb();
            this.getInfra();
            this.getOften();
        },
        components: {
            SkillSearchDetail1,
        }
    }
</script>