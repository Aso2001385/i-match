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
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [{ src: './plugins/vuejs-datepicker.js', mode: 'client', ssr: false }, { src: './plugins/main.js' }],

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
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    ['cookie-universal-nuxt', { parseJSON: false }],
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    proxy: true,
    baseURL: 'http://localhost:8000/api/',
    // baseURL: 'http://13.115.187.17/api/',
  },

  proxy: {
    '/api/': {
      target: 'http://localhost:8000',
      // target: 'http://13.115.187.17',
    },
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: 'ja',
    },
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
