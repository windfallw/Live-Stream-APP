<template>
  <v-col cols="12">
    <v-card>
      <video
          ref="VideoPlayer"
          class="video-js vjs-big-play-centered"
      />

      <v-card-actions>
        <v-card-title>{{ title + '直播间' }}</v-card-title>

        <v-spacer></v-spacer>

        <!--        <v-btn icon>-->
        <!--          <v-icon>mdi-heart</v-icon>-->
        <!--        </v-btn>-->

        <!--        <v-btn icon>-->
        <!--          <v-icon>mdi-bookmark</v-icon>-->
        <!--        </v-btn>-->

        <v-btn icon v-on:click="videoReload">
          <v-icon>mdi-reload</v-icon>
        </v-btn>
      </v-card-actions>

    </v-card>
  </v-col>
</template>

<script>
export default {
  name: "VideoPlayer",
  components: {},
  props: ['videoSrc', 'title'],
  data()
  {
    return {
      player: null,
      videoOptions: {
        fluid: true,
        autoplay: false,
        muted: false,
        controls: true,
        preload: 'auto',
        aspectRatio: "16:9",
        playbackRates: [0.5, 1, 1.5, 2],
        language: 'zh-CN',
        // poster: 'https://picsum.photos/1920/1080?random',
        sources: [
          {
            src: this.videoSrc,
            type: "application/x-mpegURL",
          }
        ]
      }

    }
  },
  methods: {
    videoReload: function ()
    {
      this.player.reset()
      this.player.src(this.videoSrc)
      this.player.load(this.videoSrc)
      this.player.play()
    }
  },
  mounted()
  {
    this.player = videojs(this.$refs.VideoPlayer, this.videoOptions, function onPlayerReady()
    {
      //console.log('onPlayerReady', this);
    })
  },
  beforeDestroy()
  {
    if (this.player)
    {
      this.player.dispose()
    }
  }
}
</script>

<style scoped>
</style>
