<template>
  <v-row justify="center">
    <v-dialog
        v-model="dialog"
        persistent
        max-width="290"
    >

      <v-card>
        <v-card-title class="headline">
          退出登录?
        </v-card-title>
        <v-card-text>
          真的要退出登录吗？
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
              color="green darken-1"
              text
              @click="$emit('logout-dialog',false)"
          >
            返回
          </v-btn>
          <v-btn
              color="green darken-1"
              text
              @click="LogOut"
          >
            退出
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  props: ['dialog'],
  data()
  {
    return {}
  },
  methods: {
    LogOut()
    {
      this.$emit('logout-dialog', false)
      this.$emit('logout')
    }
  }
}
</script>

<style scoped>

</style>
