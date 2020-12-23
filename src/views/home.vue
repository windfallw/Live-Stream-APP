<template>
  <v-app id="inspire">

    <v-navigation-drawer v-model="drawer" app>

      <v-list-item>

        <v-list-item-avatar color="accent" v-on:click="dialog = true">
          <span class="white--text headline">xx</span>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title class="title">
            admin
          </v-list-item-title>

          <v-list-item-subtitle>
            support@admin.com
          </v-list-item-subtitle>

        </v-list-item-content>

      </v-list-item>

      <v-divider></v-divider>

      <v-list dense nav>

        <v-list-item>
          <v-switch
              v-model="$vuetify.theme.dark"
              inset
              label="深色模式"
          ></v-switch>
        </v-list-item>

        <v-list-item v-on:click="dialog = true" link>
          <v-list-item-icon>
            <v-icon>mdi-login</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>登录</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item
            v-for="item in items"
            :key="item.title"
            link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

      </v-list>

    </v-navigation-drawer>

    <v-app-bar
        color="#fcb69f"
        dark
        prominent
        shrink-on-scroll
        fade-img-on-scroll
        src="https://picsum.photos/1920/1080?random"
        scroll-threshold="200"
        app
    >

      <template v-slot:img="{ props }">
        <v-img
            v-bind="props"
            gradient="to top right, rgba(19,84,122,.5), rgba(128,208,199,.8)"
        ></v-img>
      </template>

      <v-app-bar-nav-icon v-on:click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title></v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>
    </v-app-bar>

    <v-main class="d-flex align-content-center flex-wrap-reverse">

    </v-main>

    <v-footer padless>
      <v-col
          class="lighten-2 text-center py-0"
          cols="12"
      >
        {{ new Date().getFullYear() }} — <strong>windfallw</strong>
        <v-btn icon href="https://github.com/windfallw/Cross-APP-Final-Design" target="_blank">
          <v-icon>mdi-github-face</v-icon>
        </v-btn>
      </v-col>
    </v-footer>

    <app-login
        v-bind:dialog="dialog"
        v-on:login-dialog="dialog=$event"
    />

  </v-app>
</template>

<script>
import login from '@/components/login';
// import axios from 'axios'

export default {
  name: 'home',
  data: () => ({
    items: [
      {title: '仪表盘', icon: 'mdi-view-dashboard', href: ''},
      {title: '实时直播', icon: 'mdi-video-wireless-outline', href: ''},
      {title: '相机', icon: 'mdi-camera', href: ''},
      {title: '退出', icon: 'mdi-logout', href: ''},
    ],
    icons: [
      'mdi-facebook',
      'mdi-twitter',
      'mdi-linkedin',
      'mdi-instagram',
    ],
    drawer: null,
    dialog: false
  }),

  components: {
    'app-login': login
  },

  methods: {},

  mounted: function ()
  {

  },

};

</script>
