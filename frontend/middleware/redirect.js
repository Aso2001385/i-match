export default function ({ redirect, route }) {
  // cookieからユーザー情報を取得
  const user = this.$cookies.get('user')
  const token = this.$cookies.get('token')

  const elapsedTime = Date.now() - token.updated_at

  if (elapsedTime > 3600000) this.$cookies.remove('user')

  if (!user && route.path !== '/sign-up' && route.path !== '/sign-in') redirect('/sign-in')
}
