<template>
  <v-footer padless app>
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
</template>

<script>
export default {
  name: "app-footer"
}
</script>

<style scoped>

</style>
