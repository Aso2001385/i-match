<template>
    <div class="skillsearch-container">
        <h3 class="search-title">検索</h3>
        <input type="text" id="serch-text" class="form-control">
        <div class="serch-btn-con"><button class="serch-button" id="serch-button1">検索</button></div>
        <div class="skill-contailer skill-search-box scroll">
            <div class="lan-container">
                <div class="skill-genle" id="lan-subtitle"><b>言語</b></div>
                    <!-- <div class="skill-checkbox">
                        <div class="skill-check-con"><input type="checkbox" id="lan-check1">
                        <label for="lan-check1">PHP</label></div>
                        <input type="checkbox" id="lan-check2">
                        <label for="lan-check2">Java</label>
                        <input type="checkbox" id="lan-check3">
                        <label for="lan-check3">Python</label>
                    </div> -->
                <div class="skill-checkbox">
                    <div class="skill-checkcon" v-for="(value,key) in LangBox" :key="key"><input type="checkbox" :id="key">{{value.name}}<label :for="key"></label></div>
                </div>
            </div>
            <div class="frame-container">
                <div class="skill-genle" id="frame-subtitle"><b>フレームワーク</b></div>
                    <!-- <div class="skill-checkbox"> -->
                        <!-- <input type="checkbox" id="frame-check1">
                        <label for="frame-check1">Laravel</label>
                        <input type="checkbox" id="frame-check2">
                        <label for="frame-check2">Spring</label>
                        <input type="checkbox" id="frame-check3">
                        <label for="frame-check3">Vue.js</label> -->
                    <div class="skill-checkbox">
                        <div class="skill-checkcon" v-for="(value,key) in FrameBox" :key="key"><input type="checkbox" :id="key">{{value.name}}<label :for="key"></label></div>
                    </div>
                    <!-- </div> -->
            </div>

            <div class="db-container">
                <div class="skill-genle" id="db-subtitle"><b>DB</b></div>
                    <!-- <div class="skill-checkbox">
                        <input type="checkbox" id="db-check1">
                        <label for="db-check1">MySQL</label>
                        <input type="checkbox" id="db-check2">
                        <label for="db-check2">SQLite</label>
                        <input type="checkbox" id="db-check3">
                        <label for="db-check3">MariaDB</label>
                    </div> -->
                    <div class="skill-checkbox">
                        <div class="skill-checkcon" v-for="(value,key) in DbBox" :key="key"><input type="checkbox" :id="key">{{value.name}}<label :for="key"></label></div>
                    </div>
            </div>
            
            <div class="infra-container">
                <div class="skill-genle" id="infra-subtitle"><b>インフラ</b></div>
                    <!-- <div class="skill-checkbox">
                        <input type="checkbox" id="infra-check1">
                        <label for="infra-check1">Linux</label>
                        <input type="checkbox" id="infra-check2">
                        <label for="infra-check2">Azure</label>
                        <input type="checkbox" id="infra-check3">
                        <label for="infra-check3">AWS</label>
                    </div> -->
                <div class="skill-checkbox">
                    <div class="skill-checkcon" v-for="(value,key) in InfraBox" :key="key"><input type="checkbox" :id="key">{{value.name}}<label :for="key"></label></div>
                </div>
            </div>
            
            <div class="oth-container">
                <div class="skill-genle" id="oth-subtitle"><b>その他</b></div>
                    <!-- <div class="skill-checkbox">
                        <input type="checkbox" id="oth-check1">
                        <label for="oth-check1">figma</label>
                        <input type="checkbox" id="oth-check2">
                        <label for="oth-check2">Github</label>
                        <input type="checkbox" id="oth-check3">
                        <label for="oth-check3">Postman</label>
                    </div> -->
                    <div class="skill-checkbox">
                        <div class="skill-checkcon" v-for="(value,key) in OftenBox" :key="key"><input type="checkbox" :id="key">{{value.name}}<label :for="key"></label></div>
                    </div>
            </div>
        </div>
        <div class="serch-btn-con"><button class="serch-button" id="serch-button2">検索</button></div>
    </div>
</template>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
import axios from 'axios';
import skilllang from '../assets/skill-lang.json';
import skillframe from '../assets/skill-frame.json';
import skilldb from '../assets/skill-db.json';
import skillinfra from '../assets/skill-infra.json';
import skilloften from '../assets/skill-often.json';

    export default {
        data: function() {
            return {
                LangBox: [],
                FrameBox: [],
                DbBox: [],
                InfraBox: [],
                OftenBox: [],
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
        },
        mounted(){
            this.getLang();
            this.getFrame();
            this.getDb();
            this.getInfra();
            this.getOften();
        }
    }
</script>