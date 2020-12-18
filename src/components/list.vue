<template>

  <v-list dense nav>

    <v-list-item>
      <v-switch
          v-model="$vuetify.theme.dark"
          inset
          label="深色模式"
      ></v-switch>
    </v-list-item>

    <v-list-item
        v-on:click="$emit('login-dialog',true)"
        link
    >
      <v-list-item-icon>
        <v-icon>mdi-login</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>登录</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item
        v-on:click="$emit('register-dialog',true)"
        link
    >
      <v-list-item-icon>
        <v-icon>mdi-account-plus</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>注册</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item
        link
        v-on:click="display"
    >
      <v-list-item-icon>
        <v-icon>mdi-video-wireless-outline</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>发起直播</v-list-item-title>
      </v-list-item-content>
    </v-list-item>


    <v-list-item
        link
        v-on:click="getPicture"
    >
      <v-list-item-icon>
        <v-icon>mdi-camera</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>更换背景</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item link v-on:click="exit">
      <v-list-item-icon>
        <v-icon>mdi-logout-variant</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>退出应用</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

  </v-list>

</template>

<script>
export default {
  props: ['display', 'cordova_ready', 'showSnackBar', 'getPicture'],
  data: function ()
  {
    return {}
  },
  methods: {
    exit: function ()
    {
      if (this.cordova_ready)
        navigator.app.exitApp();
      else this.showSnackBar('当前平台不支持')
    }
  }
}
</script>

<style scoped>

</style>
