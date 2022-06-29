/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueCookies from "vue-cookies";

import Vue from "vue";
import VueRouter from "vue-router";
import FixedLog from "./components/FixedLog";
import FixedAccount from "./components/FixedAccount";
import FixedLogSpace from "./components/FixedLogSpace";
import FixedMenuBar from "./components/FixedMenuBar";
import TopDevTit from "./components/TopDevTit";
import BulletinList from "./components/BulletinList";
import EventList from "./components/EventList";
import NewsList from "./components/NewsList";
import ChatList from "./components/ChatList";
import HistoryList from "./components/HistoryList";
import UserList from "./components/UserList";
import ChatRoomTit from "./components/ChatRoomTit";
import PartnerUserDetail from "./components/PartnerUserDetail";
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
import HistoryDetail from "./components/HistoryDetail";
import BulletinEditDetail from "./components/BulletinEditDetail";
import EditDetail from "./components/EditDetail";
import LoginEnter from "./components/Login";
import RegisterEnter from "./components/Register";

//  import vuetify from "./vuetify";

require("./bootstrap");


window.Vue = require("vue").default;


=======
Vue.use(VueCookies);

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "top.dev.tit",
            components: {
                default: TopDevTit,
                account: LoginEnter,
            },
        },
        {
            path: "/home",
            name: "top.dev.tit",
            components: {
                default: TopDevTit,
                account: LoginEnter,
            },
        },
        {
            path: "/top-dev-tit",
            name: "top.dev.tit",
            components: {
                default: TopDevTit,
                account: LoginEnter,
            },
        },
        {
            path: "/news-list",
            name: "news.list",
            components: {
                default: NewsList,
                account: LoginEnter,
            },
        },
        {
            path: "/bulletin-list",
            name: "bulletin.list",
            components: {
                default: BulletinList,
                account: LoginEnter,
            },
        },
        {
            path: "/event-list",
            name: "event.list",
            components: {
                default: EventList,
                account: LoginEnter,
            },
        },
        {
            path: "/chat-list",
            name: "chat.list",
            components: {
                default: ChatList,
                account: LoginEnter,
            },
        },
        {
            path: "/user-list",
            name: "user.list",
            components: {
                default: UserList,
                account: LoginEnter,
            },
        },
        {
            path: "/history-list",
            name: "history.list",
            components: {
                default: HistoryList,
                account: LoginEnter,
            },
        },
        {
            path: "/chat-room-tit",
            name: "chat.room.tit",
            components: {
                default: ChatRoomTit,
                account: LoginEnter,
            },
        },
        {
            path: "/partner-user-detail",
            name: "partner.user.detail",
            components: {
                default: PartnerUserDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/user-bulletin-list",
            name: "userbulletin.list",
            components: {
                default: UserBulletinList,
                account: LoginEnter,
            },
        },
        {
            path: "/user-skill-detail",
            name: "userskill.detail",
            components: {
                default: UserSkillDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/user-info-detail",
            name: "user.info.detail",
            components: {
                default: UserInformationDetail,
                account: LoginEnter,
            },
            props: true,
        },
        {
            path: "/pass-update",
            name: "pass.update",
            components: {
                default: PassUpdate,
                account: LoginEnter,
            },
        },
        {
            path: "/skill-signup",
            name: "skill.signup",
            components: {
                default: SkillSignup,
                account: LoginEnter,
            },
        },
        {
            path: "/skill-signup-detail",
            name: "skillsignup.detail",
            components: {
                default: SkillSignupDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/create-bulletin",
            name: "create.bulletin",
            components: {
                default: CreateBulletin,
                account: LoginEnter,
            },
        },
        {
            path: "/add-skill",
            name: "add.skill",
            components: {
                default: AddSkill,
                account: LoginEnter,
            },
        },
        {
            path: "/bulletin-detail-your",
            name: "bulletin.detail.your",
            components: {
                default: BulletinDetailYour,
                account: LoginEnter,
            },
            props: true,
        },
        {
            path: "/bulletin-detail-me",
            name: "bulletin.detail.me",
            components: {
                default: BulletinDetailMe,
                account: LoginEnter,
            },
        },
        {
            path: "/bulletin-edit",
            name: "bulletin.edit",
            components: {
                default: BulletinEdit,
                account: LoginEnter,
            },
        },
        {
            path: "/news-detail",
            name: "news.detail",
            components: {
                default: NewsDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/history-detail",
            name: "history.detail",
            components: {
                default: HistoryDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/bulletin-edit-detail",
            name: "bulletin.edit.detail",
            components: {
                default: BulletinEditDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/edit-detail",
            name: "edit.detail",
            components: {
                default: EditDetail,
                account: LoginEnter,
            },
        },
        {
            path: "/login-enter",
            name: "login.enter",
            components: {
                default: TopDevTit,
                account: LoginEnter,
            },
        },
        {
            path: "/register-enter",
            name: "register.enter",
            components: {
                default: TopDevTit,
                account: RegisterEnter,
            },
        },
    ],
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
