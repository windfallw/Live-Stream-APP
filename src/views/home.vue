<template>
  <v-app id="inspire">

    <v-navigation-drawer v-model="drawer" app>

      <v-list-item>

        <v-list-item-avatar color="accent">
          <span
              class="white--text headline"
              v-if="isLogin"
          >{{ user }}</span>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title
              class="title"
              v-if="isLogin"
          >
            {{ user }}
          </v-list-item-title>
          <v-list-item-title
              class="title"
              v-else
          >
            未登录
          </v-list-item-title>

          <v-list-item-subtitle>

          </v-list-item-subtitle>

        </v-list-item-content>

      </v-list-item>

      <v-divider></v-divider>

      <app-list
          v-bind:display="display"
          v-bind:showSnackBar="showSnackBar"
          v-bind:get-picture="getPicture"
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
        v-bind:src="current_img"
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

      <v-btn
          icon
          v-on:click="getUser"
      >
        <v-icon>mdi-refresh</v-icon>
      </v-btn>

      <v-btn
          icon
          v-if="isLogin"
          v-on:click="logoutDialog=true"
      >
        <v-icon>mdi-logout</v-icon>
      </v-btn>

      <v-btn
          icon v-on:click="loginDialog = true"
          v-else
      >
        <v-icon>mdi-account</v-icon>
      </v-btn>

    </v-app-bar>

    <v-main>
      <v-container fluid>
        <v-row dense>
          <app-live
              video-src="https://playertest.longtailvideo.com/adaptive/bipbop/gear4/prog_index.m3u8"
              title="M3U8测试频道"
          />

          <app-live
              v-bind:video-src="publicUrl"
              title="服务器广播频道app"
          />

          <app-live
              v-for="item in allUser"
              v-bind:video-src="item[1]"
              v-bind:title="item[0]"
          />
        </v-row>
      </v-container>
    </v-main>

    <app-footer/>

    <app-login
        v-bind:showSnackBar="showSnackBar"
        v-bind:dialog="loginDialog"
        v-bind:islogin="isLogin"
        v-on:login-dialog="loginDialog=$event"
        v-on:login="signIn($event)"
    />

    <app-register
        v-bind:dialog="registerDialog"
        v-on:register-dialog="registerDialog=$event"
        v-on:register="signUp($event)"
    />

    <app-snack
        v-bind:conf="snackConf"
    />

    <app-logout
        v-bind:dialog="logoutDialog"
        v-on:logout-dialog="logoutDialog=$event"
        v-on:logout="logout"
    />


  </v-app>
</template>

<script>
import axios from 'axios'
import list from "@/components/list";
import video from "@/components/video";
import footer from "@/components/footer";
import login from '@/components/login';
import register from "@/components/register";
import snack from "@/components/snack";
import logout from "@/components/logout";

export default {
  name: 'home',
  data: function ()
  {
    return {
      ip: '[here is your server domain or ip]',
      user: 'app',
      drawer: null,
      isLogin: false,
      loginDialog: false,
      logoutDialog: false,
      registerDialog: false,
      cordova_ready: false,
      token: 'XeuhrQVN2NhadNFcmwClVXrB0pEGkIuH',//为了暂时的保护服务器的接口而设置的，token不对服务器返回403
      snackConf: {timeout: 5000, txt: '', snackbar: false},
      allUser: {},
      current_img: 'https://picsum.photos/1920/1080?random'
    }
  },

  components: {
    'app-list': list,
    'app-live': video,
    'app-footer': footer,
    'app-login': login,
    'app-register': register,
    'app-snack': snack,
    'app-logout': logout,
  },

  methods: {
    showSnackBar: function (msg)
    {
      this.snackConf.txt = msg
      this.snackConf.snackbar = true
    },

    display: function ()
    {
      if (this.cordova_ready)
        videoStreamer.streamRTMP(this.pushUrl)
      else
      {
        this.showSnackBar('当前平台不支持')
      }
    },

    onDeviceReady: function ()
    {
      this.cordova_ready = true
      console.log(navigator.camera)
      console.log(videoStreamer)
    },

    signIn: function (arg)
    {
      let that = this
      let formData = new FormData();
      formData.append('name', arg[0])
      formData.append('password', arg[1])
      axios({
        method: 'post',
        url: this.loginUrl,
        data: formData,
        headers: {'Content-Type': 'multipart/form-data'}
      })
          .then(function (res)
          {
            //handle success
            if (res.data !== '密码错误')
            {
              that.isLogin = true
              that.user = arg[0]
            }
            that.showSnackBar(res.data);
          })
          .catch(function (err)
          {
            //handle error
            console.log(err);
            that.showSnackBar(String(err))
          })
    },

    signUp: function (arg)
    {
      let that = this
      axios({
        method: 'post',
        url: this.signupUrl,
        data: JSON.stringify({
          name: arg[0],
          password: arg[1],
          token: this.token
        })
      })
          .then(function (res)
          {
            //handle success
            that.showSnackBar(res.data)
          })
          .catch(function (err)
          {
            //handle error
            console.log(err);
            that.showSnackBar(String(err))
          })
    },

    getUser: function ()
    {
      let that = this
      axios.get(this.getUserUrl)
          .then(function (res)
          {
            that.allUser = res.data
            that.showSnackBar(res.data)
          })
          .catch(function (err)
          {
            console.log(err);
            that.showSnackBar(String(err))
          })

    },

    logout: function ()
    {
      this.isLogin = false
      this.user = 'app'
      this.showSnackBar('已退出')
    },

    getPicture: function ()
    {
      if (this.cordova_ready)
      {
        navigator.camera.getPicture(this.onSuccess, this.onFail, {
          quality: 25,
          destinationType: Camera.DestinationType.DATA_URL
        });

      }
      else this.showSnackBar('当前平台不支持')
    },

    onSuccess: function (imageData)
    {
      this.current_img = "data:image/jpeg;base64," + imageData;
      this.showSnackBar('背景图更换成功')
    },

    onFail: function (message)
    {
      this.showSnackBar(String(message))
    },

  },

  mounted: function ()
  {
    document.addEventListener("deviceready", this.onDeviceReady, false);

  },

  computed: {
    pushUrl: function ()
    {
      return 'rtmp://' + this.ip + '/live/' + this.user
    },
    liveUrl: function ()
    {
      return 'https://' + this.ip + '/app/live/' + this.user + '.m3u8'
    },
    publicUrl: function ()
    {
      return 'https://' + this.ip + '/app/live/' + 'app.m3u8'
    },
    loginUrl: function ()
    {
      return 'https://' + this.ip + '/app/user/login.php'
    },
    signupUrl: function ()
    {
      return 'https://' + this.ip + '/app/user/signup.php'
    },
    getUserUrl: function ()
    {
      return 'https://' + this.ip + '/app/user/account.php'
    }

  },
};

</script>
