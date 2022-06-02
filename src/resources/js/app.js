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
 import BulletinList from "./components/BulletinList";
 import UserBulletinList from "./components/UserBulletinList";
//  import UserInformation from "./components/UserInformation";
 import UserSkillDetail from "./components/UserSkillDetails";
 import SkillSignup from "./components/SkillSignup";
 import SkillSignupDetail from "./components/SkillSignupDetail";
 import CreateBulletin from "./components/CreateBulletin";
 import AddSkill from "./components/AddSkill";
 import BulletinDetailYour from "./components/BulletinDetailYour";
 import BulletinDetailMe from "./components/BulletinDetailMe";


require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);
  
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/bulletin-list',
            name: 'bulletin.list',
            component: BulletinList
        },
        {
            path: '/user-bulletin-list',
            name: 'userbulletin.list',
            component: UserBulletinList
        },
        {
            path: '/user-skill-detail',
            name: 'usrskill.detail',
            component: UserSkillDetail
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
