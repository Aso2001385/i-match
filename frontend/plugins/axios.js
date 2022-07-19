export default ({ $axios, redirect }) => {
  // X-Aothを付けないルートを追記していく(条件式を増やしていくよりこの方が管理しやすくてスマートだよね)
  const EXIT_ROUTES = {
    // 練習用に
    request: ['post:auth', 'post:users', 'get:ac'],
    response: ['get:ac',],
  }

  // リクエスト処理
  $axios.onRequest(
    config => {
      console.log('axios.js : onRequest : 始まり : ' + 1)
      // アクセス先がEXIT_ROUTESに含まれていたらヘッダ作成はスルー
      if (EXIT_ROUTES.request.includes(config.method + ':' + config.url.split('/api/')[1])) {
        console.log('axios.js : EXIT true : ' + 2)
        return config
      }
      // セッションからトークン取得
      console.log('axios.js : TOKEN.parse : ' + 2)
      const TOKENS = JSON.parse(sessionStorage.getItem('token'))

      console.log('axios.js : X-Auth : ' + 3)
      // ヘッダにX-Authフィールドを作成し、トークンを元のフォーマットで付与
      config.headers['X-Auth'] = '' + TOKENS.id + '|' + TOKENS.content + '|' + TOKENS.update + ''

      return config
    },
    err => {
      return Promise.reject(err)
    }
  )

  // レスポンス処理
  $axios.onResponse(
    response => {
      console.log('axios.js : onResponse : 始まり : ' + 4)
      console.log(response.data)
      const config = response.config
      console.log('axios.js : config : ' + 5)
      if (EXIT_ROUTES.response.includes(config.method + ':' + config.url.split('/api/')[1])) return response
      // レスポンスヘッダのX-Authフィールドからトークン取得し配列化
      console.log('axios.js : EXIT : 通過 ' + 6)
      if (!(response.status >= 200 && response.status < 300)) return response
      console.log('axios.js : 200 - 300 :  ' + 7)
      const TOKENS = response.headers['x-auth'].split('|')
      console.log('axios.js : X-Auth : '+ TOKENS + 8)

      const COOL = {
        id: TOKENS[0],
        content: TOKENS[1],
        update: TOKENS[2],
      }

      // セッションにJSON形式で保存
      sessionStorage.setItem('token', JSON.stringify(COOL))
      console.log('axios.js : SessionToken : '+JSON.parse(sessionStorage.getItem('token')).content + ' : ' + 9)

      return response
    },
    async err => {
      // 何らかのエラー処理
      console.log('axios.js : SessionToken : '+ await err + ' : ' + 10)
      console.log(err)
      sessionStorage.clear()

      return err
    }
  )
}
