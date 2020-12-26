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
        link v-on:click="display"
    >
      <v-list-item-icon>
        <v-icon>mdi-video-wireless-outline</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>发起直播</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item link>
      <v-list-item-icon>
        <v-icon>mdi-view-dashboard</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>仪表盘</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item link>
      <v-list-item-icon>
        <v-icon>mdi-camera</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>相机</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

    <v-list-item link>
      <v-list-item-icon>
        <v-icon>mdi-logout</v-icon>
      </v-list-item-icon>
      <v-list-item-content>
        <v-list-item-title>退出</v-list-item-title>
      </v-list-item-content>
    </v-list-item>

  </v-list>

</template>

<script>
export default {
  props: ['dialog', 'display'],
  data: function ()
  {
    return {}
  },
}
</script>

<style scoped>

</style>
