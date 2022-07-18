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
}

export const mutations = {

  restoreUser(state,e){
    state.user = e
  },

  restoreSkills(state,e){
    state.skills = e
  }

}
