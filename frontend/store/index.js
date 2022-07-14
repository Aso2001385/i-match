export const state = () => ({
  user: {

  },
  skills:{

  },
  token:{

  }
})

export const getters = {
  user: state => state.user,
  skills: state => state.skills,
  token: state => state.token
}

export const mutations = {

  restoreUser(state,e){
    state.user = e
  },

  restoreToken(state,e){
    state.token = e
  },

  refresh(state,e) {
    state.user = e
  },
}
