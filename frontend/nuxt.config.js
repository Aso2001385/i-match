import colors from 'vuetify/es5/util/colors'
import ja from 'vuetify/lib/locale/ja'

require('dotenv').config()
const { API_BASE_URL } = process.env
const baseURL = API_BASE_URL

export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: '%s - i-Match',
    title: 'i-Match',
    htmlAttrs: {
      lang: 'ja',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' },
      // 追加
      // { name: 'mobile-web-app-capable', content: 'yes' },
      // { name: 'apple-mobile-web-app-capable', content: 'yes' },
      // { name: 'apple-mobile-web-app-status-bar-style', content: 'black' },
      // { name: 'apple-mobile-web-app-title', content: 'APP_TITLE' },
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      // 追加
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens_iphone5_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_iphone6_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)',
      //   href: 'PATH/splashscreens/splashscreens_iphoneplus_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)',
      //   href: 'PATH/splashscreens/splashscreens_iphonex_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_iphonexr_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)',
      //   href: 'PATH/splashscreens/splashscreens_iphonexsmax_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_ipad_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_ipadpro1_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_ipadpro3_splash.png',
      // },
      // {
      //   rel: 'apple-touch-startup-image',
      //   media: '(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)',
      //   href: 'PATH/splashscreens/splashscreens_ipadpro2_splash.png',
      // },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.icon' }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    { src: './plugins/vuejs-datepicker.js', mode: 'client', ssr: false },
    { src: './plugins/main.js' },
    '~/plugins/axios',
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: [
    {
      path: '@/components/',
      extensions: ['vue'], // ビルド対象はvueファイルのみに設定
      pathPrefix: true,
    },
  ],

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    // https://go.nuxtjs.dev/stylelint
    '@nuxtjs/stylelint-module',
    // https://go.nuxtjs.dev/vuetify
    '@nuxtjs/vuetify',
    // 追加
    // '@nuxtjs/pwa',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/proxy',
    // https://go.nuxtjs.dev/pwa
    // '@nuxtjs/pwa',
    ['cookie-universal-nuxt', { parseJSON: false }],
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    proxy: true,
    baseURL: 'http://localhost:8080/api/',
    // baseURL: 'https://localhost:8080/api/',
  },

  // 練習
  proxy: {
    '/api/': {
      target: 'http://localhost:8080',
      // target: 'https://localhost:8080',
    },
  },
  // 本番
  // proxy: {
  //   '/api': {
  //     target: 'https://localhost:8080/',
  //     pathRewrite: {
  //       '^/api': '/',
  //     },
  //   },
  // },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: 'ja',
    },
    // // 追加
    // icon: {
    //   source: 'SRC_DIR/static/*****/icon_pwa.png',
    //   fileName: 'icon_pwa.png',
    // },
    // // 追加
    // manifest: {
    //   lang: 'ja',
    //   name: 'APP_NAME',
    //   short_name: 'APP_SHORT_NAME',
    //   description: 'APP_DESCRIPTION',
    //   display: 'standalone',
    //   theme_color: '#000',
    //   background_color: '#fff',
    //   orientation: 'portrait',
    //   scope: '/',
    //   start_url: '/',
    //   icons: [
    //     {
    //       src: 'SRC_DIR/static/*****/icon_pwa.png',
    //       sizes: '512x512',
    //       type: 'image/png',
    //     },
    //   ],
    // },
    // // 追加
    // workbox: {
    //   runtimeCaching: [
    //     {
    //       urlPattern: '^https://polyfill.io/.*',
    //       handler: 'cacheFirst',
    //     },
    //     {
    //       urlPattern: `${SITE_URL}.*`,
    //       handler: 'staleWhileRevalidate',
    //       strategyOptions: {
    //         cacheName: 'site-cache',
    //       },
    //       strategyPlugins: [
    //         {
    //           use: 'Expiration',
    //           config: {
    //             maxAgeSeconds: 24 * 60 * 60 * 30,
    //           },
    //         },
    //       ],
    //     },
    //   ],
    // },
  },

  // Vuetify module configuration: https://go.nuxtjs.dev/config-vuetify
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    theme: {
      dark: false,
      themes: {
        dark: {
          primary: colors.orange.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3,
        },
        light: {
          primary: colors.orange.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3,
        },
        // defaultAssets: {
        //   font: {
        //     family: 'Noto Sans JP',
        //   },
        // },
        // defaultAssets: {
        //   font: {
        //     display: 'swap',
        //     face: 'swap',
        //   },
        // },
        defaultAssets: false,
      },
    },
    lang: {
      locales: { ja },
      current: 'ja',
    },
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    // analyze: true,
  },

  env: {
    API_BASE_URL: baseURL,
  },
  // server: {
  //   host: '18.183.26.169',
  //   port: 8000, // デフォルト: localhost,
  // },
}
