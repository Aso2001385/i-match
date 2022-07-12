export const state = () => ({
  token: {},
  user: {},
})

export const getters = {
  // stateの状態を外部で取り出すときに使用する
  token: state => state.token,
}

export const mutations = {
  ミューテーション関数名(state, 引数) {
    // ここでstate（ストアの状態）を変更する
    state.変数名 = '値'
  },
}

// export const actions = {
//   async login({ commit }) {
//     // ここでミューテーションを呼び出し、外部とのAPI通信や非同期処理も行う
//     commit('ミューテーション関数名', 引数)
//   },
// }
