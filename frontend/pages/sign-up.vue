<template>
  <v-container fill-height>
    <v-row justify="center">
      <v-col cols="12" md="5">
        <v-card class="pb-10 mx-auto fill-width">
          <v-card-title class="d-flex justify-center pa-4 grey darken-4">
            <h3 class="text-center white--text">Sign Up</h3>
          </v-card-title>
          <v-divider class="pb-5"> </v-divider>
          <v-form>
            <div class="pa-10">
              <v-text-field
                v-model="name"
                label="Name"
                required
                :error-messages="nameErrors"
                :counter="10"
                @input="$v.name.$touch()"
                @blur="$v.name.$touch()"
              >
              </v-text-field>
              <v-text-field
                v-model="email"
                label="E-mail"
                required
                :error-messages="emailErrors"
                @input="$v.email.$touch()"
                @blur="$v.email.$touch()"
              ></v-text-field>
              <v-text-field
                v-model="password"
                label="Password"
                required
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                :error-messages="passwordErrors"
                @input="$v.password.$touch()"
                @blur="$v.password.$touch()"
                @click:append="show1 = !show1"
              ></v-text-field>
              <v-text-field
                v-model="confirmPassword"
                label="Confirm Password"
                required
                :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show2 ? 'text' : 'password'"
                :error-messages="confirmPasswordErrors"
                @input="$v.confirmPassword.$touch()"
                @blur="$v.confirmPassword.$touch()"
                @click:append="show2 = !show2"
              ></v-text-field>
              <div class="pt-5 position: relative">
                <v-btn class="mr-0" @click="submit">{{ addMessage }}</v-btn>
              </div>
            </div>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import { validationMixin } from 'vuelidate'
import { required, maxLength, email, minLength } from 'vuelidate/lib/validators'

export default {
  mixins: [validationMixin],
  layout: 'auth',
  validations: {
    name: { required, maxLength: maxLength(10) },
    email: { required, email, maxLength: maxLength(23), minLength: minLength(23) },
    password: { required, minLength: minLength(8) },
    confirmPassword: {
      required,
      minLength: minLength(8),
    },
  },

  data: () => ({
    show1: false,
    show2: false,
    name: 'オルカさん',
    email: '2001385@s.asojuku.ac.jp',
    password: 'ultra-1966M78',
    confirmPassword: 'ultra-1966M78',
    addMessage: 'Add',
    user: {},
  }),

  computed: {
    nameErrors() {
      const errors = []
      if (!this.$v.name.$dirty) return errors
      !this.$v.name.maxLength && errors.push('Name must be at most 10 characters long')
      !this.$v.name.required && errors.push('Name is required.')
      return errors
    },
    emailErrors() {
      const errors = []
      if (!this.$v.email.$dirty) return errors
      !this.$v.email.email && errors.push('Must be valid e-mail')
      !this.$v.email.required && errors.push('E-mail is required')
      return errors
    },
    passwordErrors() {
      const errors = []
      if (!this.$v.password.$dirty) return errors
      !this.$v.password.minLength && errors.push('Password must be at least 8 characters')
      !this.$v.password.required && errors.push('Password is required')
      return errors
    },
    confirmPasswordErrors() {
      const errors = []
      if (!this.$v.confirmPassword.$dirty) {
        this.confirmPassword !== this.password && errors.push('The password you entered does not match!')
        return errors
      }
      this.confirmPassword !== this.password && errors.push('The password you entered does not match!')
      !this.$v.confirmPassword.required && errors.push('Confirm Password is required')
      return errors
    },
    primitiveUser() {
      return this.$store.state.user
    },
  },

  methods: {
    submit() {
      this.$v.$touch()
      console.log(this.$store.state.user.name)
      if (this.confirmPassword !== this.password) return

      this.user = {
        name: this.name,
        email: this.email,
        password: this.password,
      }

      this.$axios.post('http://localhost:8080/api/users', this.user).then(response => {

        this.$store.commit('restoreLogin', response.data)

      })
    },

    clear() {
      this.$v.$reset()
      this.name = ''
      this.email = ''
      this.select = null
      this.checkbox = false
    },
  },
}
</script>
<style lang="scss"></style>
