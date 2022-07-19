export default async function ({ redirect }) {

  // sessionからユーザー情報を取得
  const TOKEN = await JSON.parse(sessionStorage.getItem('token'))

  if(TOKEN) {

    // トークン取得後の経過時間
    const ELAPSED_TIME = Date.now() - Date.parse(TOKEN.update)

    if ((ELAPSED_TIME < 3600000)) {
      await redirect('/')
    }else{
      sessionStorage.clear()
    }
  }

  // const user = this.$store.state.user

  // if (!user && route.path !== '/sign-up' && route.path !== '/sign-in') console.log('! :' + user) // redirect('/sign-up')
}
