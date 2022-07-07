// export let axios

// export default ({ $axios }) => {
//   $axios.defaults.baseURL = 'https://localhost/api/'

//   const token = this.$cookies.get('token')

//   $axios.onRequest(config => {
//     config.headers['X-Auth'] = token.id + '|' + token.content + '|' + token.updated_at
//   })

//   $axios.onResponse(response => {

//     const newToken = response.

//     return Promise.resolve(response)
//   })

//   $axios.onError(error => {
//     return Promise.reject(error.response)
//   })

//   axios = $axios
// }
