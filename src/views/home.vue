<template>
  <v-app id="inspire">

    <v-navigation-drawer v-model="drawer" app>

      <v-list-item>

        <v-list-item-avatar color="accent" @click="dialog = true">
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

        <v-list-item @click="dialog=true" link>
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

      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

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
      <!--      <login/>-->
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

    <v-dialog
        v-model="dialog"
        persistent
        max-width="600px"
    >
      <v-card>
        <v-card-title>
          <span class="headline">User Profile</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>

              <v-col
                  cols="12"
                  sm="6"
                  md="4"
              >
                <v-text-field
                    label="Legal middle name"
                    hint="example of helper text only on focus"
                ></v-text-field>
              </v-col>
              <v-col
                  cols="12"
                  sm="6"
                  md="4"
              >
                <v-text-field
                    label="Legal last name*"
                    hint="example of persistent helper text"
                    persistent-hint
                    required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                    label="Email*"
                    required
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field
                    label="Password*"
                    type="password"
                    required
                ></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
              color="blue darken-1"
              text
              @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
              color="blue darken-1"
              text
              @click="dialog = false"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

  </v-app>
</template>

<script>
// import login from '@/components/login';
// import axios from 'axios'

export default {
  name: 'home',

  data: () => ({
    items: [
      {title: '仪表盘', icon: 'mdi-view-dashboard', click: ''},
      {title: '实时直播', icon: 'mdi-video-wireless-outline', click: ''},
      {title: '相机', icon: 'mdi-camera', click: ''},
      {title: '退出', icon: 'mdi-logout', click: ''},
    ],
    icons: [
      'mdi-facebook',
      'mdi-twitter',
      'mdi-linkedin',
      'mdi-instagram',
    ],
    drawer: null,
    dialog: false,
  }),

  components: {
    // login,
  },

  methods: {},

  mounted: function ()
  {

  },

};

</script>
