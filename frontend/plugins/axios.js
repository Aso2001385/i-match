export default ({ $axios, redirect }) => {
  // X-Aothを付けないルートを追記していく(条件式を増やしていくよりこの方が管理しやすくてスマートだよね)
  const EXIT_ROUTES = {
    request: ['post:auth', 'post:users', 'get:ac'],
    response: ['get:ac'],
  }

  // リクエスト処理
  $axios.onRequest(
    config => {
      // アクセス先がEXIT_ROUTESに含まれていたらヘッダ作成はスルー
      if (EXIT_ROUTES.request.includes(config.method + ':' + config.url.split('/api/')[1])) {
        console.log('aaa')
        return config
      }
      // セッションからトークン取得
      // 一旦コメントアウト中。ログインする前にどんな感じか知るため
      // const TOKENS = JSON.parse(sessionStorage.getItem('token'))

      // ヘッダにX-Authフィールドを作成し、トークンを元のフォーマットで付与
      // 一旦コメントアウト中。ログインする前にどんな感じか知るため
      // config.headers['X-Auth'] = '' + TOKENS.id + '|' + TOKENS.content + '|' + TOKENS.update + ''

      return config
    },
    err => {
      return Promise.reject(err)
    }
  )

  // レスポンス処理
  $axios.onResponse(
    response => {
      const config = response.config
      if (EXIT_ROUTES.response.includes(config.method + ':' + config.url.split('/api/')[1])) return response
      // レスポンスヘッダのX-Authフィールドからトークン取得し配列化

      if (!(response.status >= 200 && response.status < 300)) return response

      const TOKENS = response.headers['x-auth'].split('|')

      const COOL = {
        id: TOKENS[0],
        content: TOKENS[1],
        update: TOKENS[2],
      }

      // セッションにJSON形式で保存
      sessionStorage.setItem('token', JSON.stringify(COOL))

      return response
    },
    err => {
      // 何らかのエラー処理
      return Promise.reject(err)
    }
  )
}
