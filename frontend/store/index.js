export const state = () => ({
  user: {},
  skills: {},
})

export const getters = {
  user: state => state.user,
  skills: state => state.skills,
}

export const mutations = {
  restoreUser(state, e) {
    state.user = e
  },

  restoreSkill(state, e) {
    state.token = e
  },

  refresh(state, e) {
    state.user = e
  },
}
