export default function ({ redirect, route }) {
  // cookieからユーザー情報を取得

  const TOKEN = JSON.parse(sessionStorage.getItem('token'))

  if(!TOKEN) redirect('/sign-up')

  const ELAPSED_TIME = Date.now() - TOKEN.updated_at

  if ( ELAPSED_TIME  > 3600000) sessionStorage.clear()

  const user = this.$cookies.get('user')

  if (!user && route.path !== '/sign-up' && route.path !== '/sign-in') redirect('/sign-up')
}
