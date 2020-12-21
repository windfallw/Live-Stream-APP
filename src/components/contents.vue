<template>
  <v-container>
    <v-img
        :src="require('../assets/img/logo.svg')"
        class="my-3"
        contain
        height="200"
    />
    <v-img
        :src="require('../assets/img/logo.png')"
        class="my-3"
        contain
        height="200"
    />
  </v-container>

</template>

<script>
export default {
  name: 'contents',

  data: () => ({}),

  methods: {},
}
</script>
