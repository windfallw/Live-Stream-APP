<template>

  <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
  >
    <v-card>
      <v-card-title>
        <span class="headline">登录</span>
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
              v-on:click="$emit('login-dialog',false)"
          >
            取消
          </v-btn>
          <v-btn
              color="blue darken-1"
              text
              v-bind:disabled="!valid"
              v-on:click="login"
          >
            登录
          </v-btn>
        </v-card-actions>
      </v-form>
    </v-card>
  </v-dialog>

</template>

<script>
export default {
  props: ['dialog', 'islogin', 'showSnackBar'],
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
    login()
    {
      if (this.islogin) this.showSnackBar('你已经登录过啦，请先退出登录')
      else
      {
        this.$emit('login', [this.name, this.password])
        this.$emit('login-dialog', false)
        this.reset()
      }
    },
    reset()
    {
      this.name = ''
      this.password = ''
    },
  }
}

</script>
