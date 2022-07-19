export default {
  groupBy(materials, key) {
    return materials.reduce(function (rv, x) {
      ;(rv[x[key]] = rv[x[key]] || []).push(x)
      return rv
    }, {})
  },

  addKey(materials, newKey, newValueKey) {
    const array = []
    for (const KEY in materials) {
      array.push({
        [newKey]: KEY,
        [newValueKey]: materials[KEY],
      })
    }

    return JSON.parse(JSON.stringify(array))
  },

  /*

  materials 連想配列
  nestKey 比較するキーの繰り返しが直下にあるキー
  condKey 比較するキー
  condValues 「このvalueだったら」的なやつ
  addKey 追加するキー
  addValues 追加するvalueの配列
  defaultValue 条件に一致しない場合に入れる値

  */

  condAddValues(materials,nestKeys,condKey,condValues,addKey,addValues,defaultvalue){

    materials.map( e =>  {

      if(Array.isArray(nestKeys)){
        nestKeys.forEach(el => {
          e = e[el]
        })

        e.map(elm => {
          elm[addKey] = defaultvalue
          for(let i=0; i<condValues.length; i++){
            if(elm[condKey] === condValues[i]){
              elm[addKey] = addValues[i]
              break
            }
          }
          return elm
        },(condKey,condValues,addKey,addValues,defaultvalue))


      }else{

        e[addKey] = defaultvalue
        for(let i=0; i<condValues.length; i++){

          if(e[condKey] === condValues[i]){
            e[addKey] = addValues[i]
            break
          }
        }

      }

      return e

    },(condKey,nestKeys,condValues,addKey,addValues,defaultvalue))

    return materials

  },

  orderBy(materials, key = String, mode = Boolean, asc = Boolean, sub = { keys: Array, mode: Boolean, asc: Boolean }) {
    // 全部昇順

    switch (mode) {
      case 'num':
        materials.sort((x, y) => {
          if (x[key] - y[key] !== 0 || !(sub.keys instanceof Array)) return x[key] - y[key]

          // 二つ目のソート条件
          sub.keys.forEach(e => {
            x = x[e]
            y = y[e]
          })

          switch (sub.mode) {
            case 'num':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x - y : y - x
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y - x : x - y
              }

            case 'str':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.localeCompare(y, 'ja') : y.localeCompare(x, 'ja')
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.localeCompare(x, 'ja') : x.localeCompare(y, 'ja')
              }
            default:
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.length - y.length : y.length - x.length
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.length - x.length : x.length - y.length
              }
          }
        })
        break
      case 'str':
        materials.sort((x, y) => {
          if (x[key].localeCompare(y[key], 'ja') !== 0 || !(sub.keys instanceof Array))
            return x[key].localeCompare(y[key], 'ja')

          sub.keys.forEach(e => {
            x = x[e]
            y = y[e]
          })

          switch (sub.mode) {
            case 'num':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x - y : y - x
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y - x : x - y
              }

            case 'str':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.localeCompare(y, 'ja') : y.localeCompare(x, 'ja')
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.localeCompare(x, 'ja') : x.localeCompare(y, 'ja')
              }
            default:
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.length - y.length : y.length - x.length
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.length - x.length : x.length - y.length
              }
          }
        })

        break
      default:
        materials.sort((x, y) => {
          if (x[key].length - y[key].length !== 0 || !(sub.keys instanceof Array)) return x[key].length - y[key].length

          sub.keys.forEach(e => {
            x = x[e]
            y = y[e]
          })

          switch (sub.mode) {
            case 'num':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x - y : y - x
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y - x : x - y
              }

            case 'str':
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.localeCompare(y, 'ja') : y.localeCompare(x, 'ja')
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.localeCompare(x, 'ja') : x.localeCompare(y, 'ja')
              }
            default:
              if (asc) {
                // 昇順(リバースなし)なら
                return sub.asc ? x.length - y.length : y.length - x.length
              } else {
                // 降順(リバースあり)なら
                return sub.asc ? y.length - x.length : x.length - y.length
              }
          }
        })

        break
    }

    if (!asc) materials.reverse()

    return materials
  },
}

// export default {
//   groupBy(materials, key) {
//     const array = materials.reduce(function (rv, x) {
//       ;(rv[x[key]] = rv[x[key]] || []).push(x)

//       return rv
//     }, {})

//     array.forEach(element => {

//     })
//   },
// }
