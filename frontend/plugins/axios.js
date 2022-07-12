export default ({ $axios, redirect, $cookies }) => {
  // リクエスト処理
  $axios.onRequest(
    config => {
      const TOKENS = $cookies.get('token')

      config.headers['X-Auth'] = '' + TOKENS.id + '|' + TOKENS.content + '|' + TOKENS.update + ''
      console.log('kkk1')
      return config
    },
    err => {
      return Promise.reject(err)
    }
  )

  // レスポンス処理
  $axios.onResponse(
    response => {
      const TOKENS = response.headers['x-auth'].split('|')

      const COOL = {
        id: TOKENS[0],
        content: TOKENS[1],
        update: TOKENS[2],
      }

      $cookies.set('token', COOL)

      const COOKIES = JSON.parse($cookies.get('token'))

      console.log(COOKIES.id)
      console.log('kkk2')

      return response
    },
    err => {
      // 何らかのエラー処理
      return Promise.reject(err)
    }
  )
}
