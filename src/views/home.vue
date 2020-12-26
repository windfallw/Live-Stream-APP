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

      <app-list
          v-bind:dialog="dialog"
          v-bind:display="display"
          v-on:login-dialog="dialog=$event"
      />

    </v-navigation-drawer>

    <v-app-bar
        color="#fcb69f"
        dark
        prominent
        shrink-on-scroll
        fade-img-on-scroll
        src="https://picsum.photos/1920/1080?random"
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

      <v-btn icon v-on:click="dialog = true">
        <v-icon>mdi-account</v-icon>
      </v-btn>

    </v-app-bar>

    <v-main>
      <v-container fluid>
        <v-row dense>

          <app-live video-src="https://playertest.longtailvideo.com/adaptive/bipbop/gear4/prog_index.m3u8"/>

          <app-live video-src="https://my-iot.site/app/live/app.m3u8"/>

        </v-row>
      </v-container>
    </v-main>

    <app-footer/>

    <app-login
        v-bind:dialog="dialog"
        v-on:login-dialog="dialog=$event"
    />

  </v-app>
</template>

<script>
import footer from "@/components/footer";
import login from '@/components/login';
import video from "@/components/video";
import list from "@/components/list";
// import axios from 'axios'

export default {
  name: 'home',
  data: function ()
  {
    return {
      items: [
        {title: '仪表盘', icon: 'mdi-view-dashboard', href: ''},
        {title: '相机', icon: 'mdi-camera', href: ''},
        {title: '退出', icon: 'mdi-logout', href: ''},
      ],
      drawer: null,
      dialog: false,
      cordova_ready: false
    }
  },

  components: {
    'app-login': login,
    'app-footer': footer,
    'app-live': video,
    'app-list': list
  },

  methods: {
    display: function ()
    {
      if (this.cordova_ready)
        videoStreamer.streamRTMP('rtmp://my-iot.site/live/app')
      else console.log('当前设备不支持')
    },
    onDeviceReady: function ()
    {
      this.cordova_ready = true
      console.log(navigator.camera)
      console.log(videoStreamer)
    }

  },

  mounted: function ()
  {
    document.addEventListener("deviceready", this.onDeviceReady, false);
  },

};

</script>
