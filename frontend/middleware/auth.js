export default async function ({ redirect, $axios, store, route }) {

  console.log('auth.js : TOKEN.parse : 始まり :' + 1)
  // sessionからユーザー情報を取得
  const TOKEN = await JSON.parse(sessionStorage.getItem('token'))

  if(!TOKEN){

    redirect('/sign-in')

  }else{

    console.log('auth.js : !TOKEN false : トークンが存在 : '+ !TOKEN  + ' : ' + 2)

    const ELAPSED_TIME =  Date.now() - Date.parse(TOKEN.update)

    if ((ELAPSED_TIME < 3600000)) {
      // 1時間未満である
      console.log('auth.js : ET<360000 true : 1時間未満である : ' + 3)

      if(!store.state.user){
        // StoreにDataがない

        console.log('auth.js : !store true : StoreにDataがない : ' + 4)
        await $axios.get('http://localhost:8080/api/auth')
        .then(response => {
          console.log('auth.js : get:api/auth : データ取得成功時 :' + 5)
          console.log('auth.js : response.data : ' + 5)
          console.log(response.data)
        })
        .catch(err=>{
          console.log('auth.js : get:api/auth  : データ取得失敗時 :' + 5)
          console.log(err)
        })

      }else{
        // StoreにDataがある
        console.log('auth.js : !store false : StoreにDataがある : ' + 4)
      }

    }else{
      // 1時間以上である
      console.log('auth.js : ET<360000 false : 1時間以上である : ' + 3)
      sessionStorage.clear()
      redirect('/sign-in')

    }
  }

}
