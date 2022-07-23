<!-- 掲示板作成 -->
<template>
  <div class="create-recruit">
    <div class="create-recruit-container">
      <p id="content-title">内容</p>
      <p id="createrecruit-title">●タイトル</p>
      <input type="text" v-model="recruit_title" id="createrecruit-title-text" class="form-control" />
      <p id="createrecruit-over">●概要</p>
      <textarea
        v-model="overview_text"
        rows="4"
        cols="40"
        id="createrecruit-title-textarea"
        class="form-control"
      ></textarea>
      <p id="createrecruit-rec">●募集人数</p>
      <select v-model="rec_number" class="rec-number">
        <option value="1">2人</option>
        <option value="2">3人</option>
        <option value="3">4人</option>
        <option value="4">5人</option>
        <option value="5">6人</option>
        <option value="6">7人</option>
        <option value="7">8人</option>
        <option value="8">9人</option>
        <option value="9">10人</option>
      </select>
      <p id="createrecruit-cate">●カテゴリ</p>
      <select v-model="category" class="category">
        <option value="1">開発</option>
        <option value="2">勉強会</option>
      </select>
      <p id="createrecruit-day">●募集期限</p>
      <select v-model="deadline_day" class="category">
        <option :value="key" v-for="(value, key) in weekDay" :key="key">{{ value.deadLine_day }}</option>
        <!-- <option value="1"> value.deadLine_day </option> -->
      </select>
      <select v-model="deadline_time" class="category">
        <option :value="key" v-for="(value, key) in weekTime" :key="key">{{ value.deadLine_time }}</option>
        <!-- <option value="2"> value.deadLine_time </option> -->
      </select>
      <p id="craterecruit-skill">●スキル</p>
      <router-link to="/add-skill">
        <div><button id="add-url">追加</button></div>
      </router-link>
      <p class="add-skills">PHP・Laravel</p>
    </div>
    <router-link to="/recruit-list">
      <div class="create-recruit-url-con"><button id="create-recruit-url" @click="recruitSignup">登録</button></div>
    </router-link>
  </div>
</template>
<script>
export default {
  data: function () {
    return {
      date: new Date(),
      addDate: 1,
      maxDay: 7,
      maxHour: 23,
      maxMinute: 59,
      weekDay: [],
      weekTime: [],
      recruit_title: '',
      overview_text: '',
      rec_number: '',
      category: '',
      deadline_day: '',
      deadline_time: '',
    }
  },
  methods: {
    recruitSignup() {
      // 掲示板作成登録
    },
  },
  mounted() {
    let month = this.date.getMonth() + 1
    let day = this.date.getDate()
    for (let i = 0; i < this.maxDay; i++) {
      day++
      this.weekDay.push({ id: i + 1, deadLine_day: month + '/' + day })
    }
    for (let i = 0; i <= this.maxHour; i++) {
      for (let j = 0; j <= this.maxMinute; j++) {
        if (j == 0 || j == 30 || j == 59) {
          this.weekTime.push({ id: i + 1, deadLine_time: i + ':' + j })
        }
      }
    }
  },
}
</script>
