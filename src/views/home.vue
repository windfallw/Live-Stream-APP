<template>
  <v-app id="inspire">

    <navbar/>

    <v-main>
      <contents/>
    </v-main>

    <v-main>
      <theme/>
    </v-main>


  </v-app>
</template>

<script>
import navbar from "@/components/navbar";
import contents from '@/components/contents';
import theme from '@/views/theme';

export default {
  name: 'home',
  components: {
    navbar,
    contents,
    theme
  },
};

</script>
