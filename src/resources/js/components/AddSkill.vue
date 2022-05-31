<template>
    <div class="add-skill">
        <div class="addskill-container">
            <p id="required-skill">必須スキル</p>
            <div class="addskill-container">
                <h2 id="skillcard-title">スキルカード</h2>
                <p class="skill-card-image">◯</p>
                <p class="skill-card-title">Vue.js</p>
                <p id="sublang-iamge">◯</p>
                <p class="about-skill">レベル</p>
                <select name="addlevel-sorting" class="level-sorting">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <p class="about-skill">開発経験</p>
                <select name="addexp-sorting" class="exp-sorting">
                    <option value="1">あり</option>
                    <option value="2">なし</option>
                </select>
            </div>
        </div>
        <!-- 追加処理 -->
        <div><button>追加</button></div>
        <!-- 後で消すかも -->
        <a href="/create-bulletin" id="skillsignupdetail-back-url">戻る</a>
    </div>
</template>