<template>
  <v-app id="inspire">

    <navbar/>

    <v-main>
      <contents/>
    </v-main>

  </v-app>
</template>

<script>
import navbar from "@/components/navbar";
import contents from '@/components/contents';

export default {
  name: 'home',
  components: {
    navbar,
    contents,
  },
};

</script>
