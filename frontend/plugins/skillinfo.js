export default {
  /*
  
    materials 連想配列
    nestKey 比較するキーの繰り返しが直下にあるキー
    condKey 比較するキー
    condValues 「このvalueだったら」的なやつ
    addKey 追加するキー
    addValues 追加するvalueの配列
    defaultValue 条件に一致しない場合に入れる値
  
    */
  dataz() {
    return {
      allskill: [
        { id: 1, skillCategory: 0, skillName: 'Java' },
        { id: 2, skillCategory: 0, skillName: 'PHP' },
        { id: 3, skillCategory: 0, skillName: 'JavaScript' },
        { id: 4, skillCategory: 0, skillName: 'Python' },
        { id: 5, skillCategory: 0, skillName: 'C' },
        { id: 6, skillCategory: 0, skillName: 'C++' },
        { id: 7, skillCategory: 0, skillName: 'C#' },
        { id: 8, skillCategory: 0, skillName: 'GO' },
        { id: 9, skillCategory: 0, skillName: 'Kotlin' },
        { id: 10, skillCategory: 0, skillName: 'Swift' },
        { id: 11, skillCategory: 0, skillName: 'Ruby' },
        { id: 12, skillCategory: 0, skillName: 'HTML' },
        { id: 13, skillCategory: 0, skillName: 'CSS' },
        { id: 14, skillCategory: 0, skillName: 'SQL' },
        { id: 15, skillCategory: 0, skillName: 'mark down' },
        { id: 16, skillCategory: 1, skillName: 'Spring' },
        { id: 17, skillCategory: 1, skillName: 'Laravel' },
        { id: 18, skillCategory: 1, skillName: 'CakePHP' },
        { id: 19, skillCategory: 1, skillName: 'Symfony' },
        { id: 20, skillCategory: 1, skillName: 'React' },
        { id: 21, skillCategory: 1, skillName: 'Angular' },
        { id: 22, skillCategory: 1, skillName: 'Vue.js' },
        { id: 23, skillCategory: 1, skillName: 'Next.js' },
        { id: 24, skillCategory: 1, skillName: 'Nuxt.js' },
        { id: 25, skillCategory: 1, skillName: 'Django' },
        { id: 26, skillCategory: 1, skillName: 'Flask' },
        { id: 27, skillCategory: 1, skillName: 'Qt' },
        { id: 28, skillCategory: 1, skillName: 'Sinatra' },
        { id: 29, skillCategory: 1, skillName: 'Tailwind CSS' },
        { id: 30, skillCategory: 1, skillName: 'Bulma' },
        { id: 31, skillCategory: 2, skillName: 'PostgreSQL' },
        { id: 32, skillCategory: 2, skillName: 'Oracle Database' },
        { id: 33, skillCategory: 2, skillName: 'MongoDB' },
        { id: 34, skillCategory: 2, skillName: 'MySQL' },
        { id: 35, skillCategory: 2, skillName: 'SQLite' },
        { id: 36, skillCategory: 2, skillName: 'MariaDB' },
        { id: 37, skillCategory: 3, skillName: 'Linux' },
        { id: 38, skillCategory: 3, skillName: 'Windows' },
        { id: 39, skillCategory: 3, skillName: 'iOS' },
        { id: 40, skillCategory: 3, skillName: 'Andoroid' },
        { id: 41, skillCategory: 3, skillName: 'AWS' },
        { id: 42, skillCategory: 3, skillName: 'Azure' },
        { id: 43, skillCategory: 3, skillName: 'Google Cloud' },
        { id: 44, skillCategory: 3, skillName: 'Firebase' },
        { id: 45, skillCategory: 3, skillName: 'Salesforce' },
        { id: 46, skillCategory: 3, skillName: 'Docker' },
        { id: 47, skillCategory: 3, skillName: 'xampp' },
        { id: 48, skillCategory: 4, skillName: 'figma' },
        { id: 49, skillCategory: 4, skillName: 'GitHub' },
        { id: 50, skillCategory: 4, skillName: 'git' },
        { id: 51, skillCategory: 4, skillName: 'Swagger' },
        { id: 52, skillCategory: 4, skillName: 'Postman' },
        { id: 53, skillCategory: 4, skillName: 'Node.js' },
      ],
      skillList: [],
    }
  },

  getSkills(skills) {
    for (let j = 0; j < skills.length; j++) {
      if (skills[j].skill_id === this.allskill.id) {
        this.skillList.push(this.allskill.skillName)
      }
    }
    return this.skillList
    // }
  },
}
