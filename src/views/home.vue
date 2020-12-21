<template>
  <v-app id="inspire">

    <navbar ref="navbar"></navbar>
<!--    v-touch="{-->
<!--    left: () =>  this.$refs.navbar.swipe('Left'),-->
<!--    right: () =>  this.$refs.navbar.swipe('Right'),-->
<!--    up: () =>  this.$refs.navbar.swipe('Up'),-->
<!--    down: () =>  this.$refs.navbar.swipe('Down')-->
<!--    }"-->
    <v-main>
      <contents/>

      <h1>{{drawer}}</h1>
      <h1>123</h1>

    </v-main>

    <footers/>

  </v-app>
</template>

<script>
import contents from '@/components/contents';
import footers from "@/components/footers";
import navbar from "@/components/navbar";

export default {
  name: 'home',
  props:{
    drawer:navbar.data().drawer
  },
  data:()=>({

  }),
  components: {
    navbar,
    contents,
    footers
  },
  methods: {},
  mounted: function ()
  {

  },
};

</script>
