export default async function ({ redirect, $axios, store, route }) {
  // sessionからユーザー情報を取得
  const TOKEN = await JSON.parse(sessionStorage.getItem('token'))

  if (!TOKEN) {
    redirect('/sign-in')
  } else {
    const ELAPSED_TIME = Date.now() - Date.parse(TOKEN.update)

    if (ELAPSED_TIME < 3600000) {
      // 1時間未満である

      if (!store.state.user.id) {
        // StoreにDataがない

        console.log('aaa')
        await $axios
          .get('http://localhost:8080/api/auth')
          .then(async response => {
            console.log(response.data + 'レスポンス確認')
            await store.commit('restoreLogin', response.data)
          })
          .catch(err => {
            console.log(err)
            console.log('エラーでしたauth')
            sessionStorage.clear()
            alert('ログイン情報が破損したため、ログイン画面に戻ります')
            redirect('/sign-in')
          })
      }
    } else {
      // 1時間以上である
      sessionStorage.clear()
      redirect('/sign-in')
    }
  }
}
