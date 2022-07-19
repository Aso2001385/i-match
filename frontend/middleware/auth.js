export default async function ({ redirect, $axios, store, route }) {

  // sessionからユーザー情報を取得
  const TOKEN = await JSON.parse(sessionStorage.getItem('token'))

  if(!TOKEN){

    redirect('/sign-in')

  }else{

    const ELAPSED_TIME =  Date.now() - Date.parse(TOKEN.update)

    if ((ELAPSED_TIME < 3600000)) {
      // 1時間未満である

      if(!store.state.user.id){
        // StoreにDataがない


        await $axios.get('http://localhost:8080/api/auth')
        .then(response => {
          store.commit('restoreLogin', response.data)
        })
        .catch(err=>{

          console.log(err)
        })

      }

    }else{
      // 1時間以上である
      sessionStorage.clear()
      redirect('/sign-in')

    }
  }

}
