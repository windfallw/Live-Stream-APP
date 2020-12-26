<template>
  <v-app id="inspire">

    <v-navigation-drawer v-model="drawer" app>

      <v-list-item>

        <v-list-item-avatar color="accent" v-on:click="loginDialog = true">
          <span class="white--text headline"></span>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title class="title">
            未登录
          </v-list-item-title>

          <v-list-item-subtitle>

          </v-list-item-subtitle>

        </v-list-item-content>

      </v-list-item>

      <v-divider></v-divider>

      <app-list
          v-bind:display="display"
          v-bind:cordova_ready="cordova_ready"
          v-on:login-dialog="loginDialog=$event"
          v-on:register-dialog="registerDialog=$event"
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

      <v-btn icon v-on:click="loginDialog = true">
        <v-icon>mdi-account</v-icon>
      </v-btn>

    </v-app-bar>

    <v-main>
      <v-container fluid>
        <v-row dense>

          <app-live video-src="https://playertest.longtailvideo.com/adaptive/bipbop/gear4/prog_index.m3u8"/>

          <app-live video-src="https://my-iot.site/app/live/test.m3u8"/>

        </v-row>
      </v-container>
    </v-main>

    <app-footer/>

    <app-login
        v-bind:dialog="loginDialog"
        v-on:login-dialog="loginDialog=$event"
    />

    <app-register
        v-bind:dialog="registerDialog"
        v-on:register-dialog="registerDialog=$event"
    />

  </v-app>
</template>

<script>
import login from '@/components/login';
import register from "@/components/register";
import footer from "@/components/footer";
import video from "@/components/video";
import list from "@/components/list";
import axios from 'axios'

export default {
  name: 'home',
  data: function ()
  {
    return {
      ip: 'my-iot.site',
      user: 'app',
      drawer: null,
      isLogin: false,
      loginDialog: false,
      registerDialog: false,
      cordova_ready: false,
      token: 'XeuhrQVN2NhadNFcmwClVXrB0pEGkIuH'
    }
  },

  components: {
    'app-login': login,
    'app-register': register,
    'app-footer': footer,
    'app-live': video,
    'app-list': list,
  },

  methods: {
    display: function ()
    {
      if (this.cordova_ready)
        videoStreamer.streamRTMP(this.pushUrl)
      else console.log('当前设备不支持')
    },

    onDeviceReady: function ()
    {
      this.cordova_ready = true
      console.log(navigator.camera)
      console.log(videoStreamer)
    },

    signIn: function (user, pd)
    {
      let formData = new FormData();
      formData.append('name', user)
      formData.append('password', pd)
      axios({
        method: 'post',
        url: this.loginUrl,
        data: formData,
        headers: {'Content-Type': 'multipart/form-data'}
      })
          .then(function (res)
          {
            //handle success
            console.log(res.data);
          })
          .catch(function (err)
          {
            //handle error
            console.log(err);
          });
    },

  },

  mounted: function ()
  {
    document.addEventListener("deviceready", this.onDeviceReady, false);
    this.signIn('test', '123')
  },

  computed: {
    //https://www.my-iot.site/app/user/login.php
    pushUrl: function ()
    {
      return 'rtmp://' + this.ip + '/live/' + this.user
    },
    liveUrl: function ()
    {
      return 'https://' + this.ip + '/app/live/' + this.user
    },
    loginUrl: function ()
    {
      return 'https://' + this.ip + '/app/user/login.php'
    },
    signupUrl: function ()
    {
      return 'https://' + this.ip + 'app/user/signup.php'
    }

  },
};

</script>
