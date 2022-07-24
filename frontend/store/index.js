import Common from '~/plugins/common'
export const state = () => ({
  user: {},
  skills: {},
  primitiveSkills: {},
})

export const getters = {
  user: state => state.user,
  skills: state => state.skills,
  primitiveSkills: state => state.primitiveSkills,
}

export const mutations = {
  async restoreLogin(state, e) {
    state.user = e.user
    e = e.skills
    e = Common.groupBy(e, 'category_name')
    e = Common.addKey(e, 'category', 'skills')
    e = Common.condAddValues(
      e,
      ['skills'],
      'category_name',
      ['language', 'framework', 'database', 'infrastructure'],
      'color',
      ['red', 'blue', 'green', 'purple'],
      'indigo darken-3'
    )
    e = Common.condAddValues(
      e,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'jp_name',
      ['言語', 'フレームワーク', 'データベース', 'インフラ'],
      'その他'
    )
    e = Common.condAddValues(
      e,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'color',
      ['red', 'blue', 'green', 'purple'],
      'indigo darken-3'
    )
    e = Common.condAddValues(
      e,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'id',
      ['1', '2', '3', '4'],
      '5'
    )
    e = Common.orderBy(e, 'id', 'num', true)
    state.skills = e

    let skills = []
    e.forEach(e => {
      skills = skills.concat(e.skills)
    })

    state.primitiveSkills = skills

    await this.$router.push('/')
  },

  setUserName(state, e) {
    state.user = e
  },
}
