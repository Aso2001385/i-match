import Common from '~/plugins/common'
export const state = () => ({
  user: {},
  skills: {},
})

export const getters = {
  user: state => state.user,
  skills: state => state.skills,
  userSkills: state => state.skills,
}

export const mutations = {
  async restoreLogin(state, e) {
    let skills = e.skills
    skills = Common.groupBy(skills, 'category_name')
    skills = Common.addKey(skills, 'category', 'skills')
    skills = Common.condAddValues(
      skills,
      ['skills'],
      'category_name',
      ['language', 'framework', 'database', 'infrastructure'],
      'color',
      ['red', 'blue', 'green', 'purple'],
      'indigo darken-3'
    )
    skills = Common.condAddValues(
      skills,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'jp_name',
      ['言語', 'フレームワーク', 'データベース', 'インフラ'],
      'その他'
    )
    skills = Common.condAddValues(
      skills,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'color',
      ['red', 'blue', 'green', 'purple'],
      'indigo darken-3'
    )
    skills = Common.condAddValues(
      skills,
      '',
      'category',
      ['language', 'framework', 'database', 'infrastructure'],
      'id',
      ['1', '2', '3', '4'],
      '5'
    )
    skills = Common.orderBy(skills, 'id', 'num', true)
    state.skills = skills
    state.user = e.user

    await this.$router.push('/')
  },
}
