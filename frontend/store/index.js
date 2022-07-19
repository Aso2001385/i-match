import Common from "~/plugins/common"
export const state = () => ({
  user: {

  },
  skills:{

  },
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
    e = Common.groupBy(e,'category_name')
    e = Common.addKey(e,'category','skills')
    e = Common.condAddValues(
      e,
      ['skills'],
      'category_name',
      ['language','framework','database','infrastructure'],
      'color',
      ['red','blue','green','purple'],
      'indigo darken-3'
    )
    e = Common.condAddValues(
      e,
      '',
      'category_name',
      ['language','framework','database','infrastructure'],
      'jp_name',
      ['言語','フレームワーク','データベース','インフラ'],
      'その他'
    )
    state.skills = e
  }

}
