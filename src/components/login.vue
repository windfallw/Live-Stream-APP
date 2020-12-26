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

      <v-card-text>
        <v-container>
          <v-row>
            <v-col cols="12">
              <v-text-field
                  label="邮箱*"
                  required
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                  label="密码*"
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
          关闭
        </v-btn>
        <v-btn
            color="blue darken-1"
            text
            v-on:click="$emit('login-dialog',false)"
        >
          登录
        </v-btn>
      </v-card-actions>

    </v-card>
  </v-dialog>

</template>

<script>
// import axios from 'axios'
export default {
  props: ['dialog'],
  data: () => ({}),
  mounted: function ()
  {
  },
  methods: {}
}

</script>
