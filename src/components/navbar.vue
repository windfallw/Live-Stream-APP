<template>

  <v-card>

    <v-navigation-drawer v-model="drawer" app>

      <v-list-item>

        <v-list-item-avatar color="accent">
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

        <v-list-item v-for="item in items" :key="item.title" link>
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <h1>{{ items[0].title }}</h1>
        <h1>{{ drawer }}</h1>
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

  </v-card>

</template>

<script>
export default {
  name: "navbar",
  data: () => ({
    items: [
      {title: '登录', icon: 'mdi-login'},
      {title: '仪表盘', icon: 'mdi-view-dashboard'},
      {title: '实时直播', icon: 'mdi-video-wireless-outline'},
      {title: '相机', icon: 'mdi-camera'},
      {title: '退出', icon: 'mdi-logout'},
    ],
    drawer: null,
    swipeDirection: 'None',
  }),
  methods: {
    swipe(direction)
    {
      this.swipeDirection = direction
      if (direction === 'Right')
      {
        this.drawer = null
        console.log(this.drawer)
        console.log(this.swipeDirection)
      }
      else if (direction === 'Left')
      {
        this.drawer = false
        console.log(this.drawer)
        console.log(this.swipeDirection)
      }
    }
  },
  mounted: function ()
  {

  },
}

</script>

<style scoped>

</style>
