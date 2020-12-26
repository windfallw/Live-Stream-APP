<template>

  <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
  >
    <v-card>
      <v-card-title>
        <span class="headline">注册</span>
      </v-card-title>
      <v-form
          ref="form"
          v-model="valid"
      >
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field
                    v-model="name"
                    label="用户名*"
                    :rules="nameRules"
                    :counter="10"
                    required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                    v-model="password"
                    label="密码*"
                    :rules="passwordRules"
                    :counter="10"
                    type="password"
                    required
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*为必填项</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
              color="blue darken-1"
              text
              v-on:click="$emit('register-dialog',false)"
          >
            取消
          </v-btn>
          <v-btn
              color="blue darken-1"
              text
              v-bind:disabled="!valid"
              v-on:click="signUp"
          >
            注册
          </v-btn>
        </v-card-actions>
      </v-form>
    </v-card>
  </v-dialog>

</template>

<script>
export default {
  props: ['dialog'],
  data: function ()
  {
    return {
      name: '',
      password: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters',
      ],
      passwordRules: [
        v => !!v || 'password is required',
        v => v.length <= 10 || 'Name must be less than 10 characters',
      ],
      valid: true,
    }
  },
  mounted: function ()
  {
  },
  methods: {
    signUp()
    {
      this.$emit('register', [this.name, this.password])
      this.$emit('register-dialog', false)
      this.reset()
    },
    reset()
    {
      this.name = ''
      this.password = ''
    },
  }
}

</script>
