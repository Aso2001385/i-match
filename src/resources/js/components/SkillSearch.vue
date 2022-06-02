<template>
    <div class="skillsearch-container">
        <h3 class="search-title">検索</h3>
        <input type="text" id="serch-text">
        <p><button class="serch-button" id="serch-button1">検索</button></p>
        <div class="skill-contailer">
            <div class="lan-container">
                <div class="skill-genle" id="lan-subtitle"><p>言語</p></div>
                    <div class="skill-checkbox">
                        <input type="checkbox" id="lan-check1">
                        <label for="lan-check1">PHP</label>
                        <input type="checkbox" id="lan-check2">
                        <label for="lan-check2">Java</label>
                        <input type="checkbox" id="lan-check3">
                        <label for="lan-check3">Python</label>
                    </div>
            </div>
            <div class="frame-container">
                <div class="skill-genle" id="frame-subtitle"><p>フレームワーク</p></div>
                    <div class="skill-checkbox">
                        <input type="checkbox" id="frame-check1">
                        <label for="frame-check1">Laravel</label>
                        <input type="checkbox" id="frame-check2">
                        <label for="frame-check2">Spring</label>
                        <input type="checkbox" id="frame-check3">
                        <label for="frame-check3">Vue.js</label>
                    </div>
            </div>

            <div class="db-container">
                <div class="skill-genle" id="db-subtitle"><p>DB</p></div>
                    <div class="skill-checkbox">
                        <input type="checkbox" id="db-check1">
                        <label for="db-check1">MySQL</label>
                        <input type="checkbox" id="db-check2">
                        <label for="db-check2">SQLite</label>
                        <input type="checkbox" id="db-check3">
                        <label for="db-check3">MariaDB</label>
                    </div>
            </div>
            
            <div class="infra-container">
                <div class="skill-genle" id="infra-subtitle"><p>インフラ</p></div>
                    <div class="skill-checkbox">
                        <input type="checkbox" id="infra-check1">
                        <label for="infra-check1">Linux</label>
                        <input type="checkbox" id="infra-check2">
                        <label for="infra-check2">Azure</label>
                        <input type="checkbox" id="infra-check3">
                        <label for="infra-check3">AWS</label>
                    </div>
            </div>
            
            <div class="oth-container">
                <div class="skill-genle" id="oth-subtitle"><p>その他</p></div>
                    <div class="skill-checkbox">
                        <input type="checkbox" id="oth-check1">
                        <label for="oth-check1">figma</label>
                        <input type="checkbox" id="oth-check2">
                        <label for="oth-check2">Github</label>
                        <input type="checkbox" id="oth-check3">
                        <label for="oth-check3">Postman</label>
                    </div>
            </div>
        </div>
        <p><button class="serch-button" id="serch-button2">検索</button></p>
    </div>
</template>