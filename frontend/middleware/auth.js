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

        await $axios
          .get(`https://i-match.click/api/auth`)
          //.get(`http://localhost:8080/api/auth`)
          .then(async response => {
            await store.commit('restoreLogin', response.data)
          })
          .catch(err => {
            console.log(err)
            sessionStorage.clear()
            alert('ユーザーデータが更新されたか、データが破損したためログイン画面に戻ります')
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
