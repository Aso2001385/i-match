/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue';
 import VueRouter from 'vue-router';
 import FixedLog from "./components/FixedLog";
 import FixedAccount from "./components/FixedAccount";
 import FixedLogSpace from './components/FixedLogSpace';
 import FixedMenuBar from "./components/FixedMenuBar";
 import TopDevTit from "./components/TopDevTit";
 import BulletinList from "./components/BulletinList";
 import EventList from "./components/EventList";
 import NewsList from "./components/NewsList";
 import ChatList from "./components/ChatList";
//  import BulletinList from "./components/BulletinList";
//  import BulletinList from "./components/BulletinList";
 import UserBulletinList from "./components/UserBulletinList";
 import UserSkillDetail from "./components/UserSkillDetails";
 import SkillSignup from "./components/SkillSignup";
 import SkillSignupDetail from "./components/SkillSignupDetail";
 import CreateBulletin from "./components/CreateBulletin";
 import AddSkill from "./components/AddSkill";
 import BulletinDetailYour from "./components/BulletinDetailYour";
 import BulletinDetailMe from "./components/BulletinDetailMe";
 import BulletinEdit from "./components/BulletinEdit";
 import UserInformationDetail from "./components/UserInformationDetail";
 import PassUpdate from "./components/PassUpdate";
 import NewsDetail from "./components/NewsDetail";


require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);
  
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/top-dev-tit',
            name: 'top.dev.tit',
            component: TopDevTit
        },
        // useridを取得する
        // {
        //     path: '/top-dev-tit/:userId',
        //     name: 'top.dev.tit',
        //     component: TopDevTit
        // },
        {
            path: '/news-list',
            name: 'news.list',
            component: NewsList
        },
        {
            path: '/bulletin-list',
            name: 'bulletin.list',
            component: BulletinList
        },
        {
            path: '/event-list',
            name: 'event.list',
            component: EventList
        },
        {
            path: '/chat-list',
            name: 'chat.list',
            component: ChatList
        },
        {
            path: '/user-bulletin-list',
            name: 'userbulletin.list',
            component: UserBulletinList
        },
        // APIでユーザー情報取得(後で下記のに書き換える)
        // {
        //     path: '/user-bulletin-list/:userId',
        //     name: 'userbulletin.list',
        //     component: UserBulletinList,
        //     props: true
        // },
        {
            path: '/user-skill-detail',
            name: 'userskill.detail',
            component: UserSkillDetail
        },
        {
            path: '/user-info-detail',
            name: 'user.info.detail',
            component: UserInformationDetail,
            props: true
        },
        {
            path: '/pass-update',
            name: 'pass.update',
            component: PassUpdate,
        },
        {
            path: '/skill-signup',
            name: 'skill.signup',
            component: SkillSignup
        },
        {
            path: '/skill-signup-detail',
            name: 'skillsignup.detail',
            component: SkillSignupDetail
        },
        {
            path: '/create-bulletin',
            name: 'create.bulletin',
            component: CreateBulletin
        },
        {
            path: '/add-skill',
            name: 'add.skill',
            component: AddSkill
        },
        {
            path: '/bulletin-detail-your',
            name: 'bulletin.detail.your',
            component: BulletinDetailYour,
            props: true
        },
        {
            path: '/bulletin-detail-me',
            name: 'bulletin.detail.me',
            component: BulletinDetailMe
        },
        {
            path: '/bulletin-edit',
            name: 'bulletin.edit',
            component: BulletinEdit
        },
        {
            path: '/news-detail',
            name: 'news.detail',
            component: NewsDetail
        },
    ]
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('log-component', FixedLog);
Vue.component('account-component', FixedAccount);
Vue.component('menubar-component', FixedMenuBar);
Vue.component('logspace-component', FixedLogSpace);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
