<template>
  <v-snackbar
      v-model="conf.snackbar"
      :timeout="conf.timeout"
  >
    {{ conf.txt }}
    <template v-slot:action="{ attrs }">
      <v-btn
          color="blue"
          text
          v-bind="attrs"
          @click="conf.snackbar = false"
      >
        Close
      </v-btn>
    </template>
  </v-snackbar>
</template>

<script>
export default {
  props: ['conf'],
  data: function ()
  {
    return {}
  },


}
</script>

<style scoped>

</style>
