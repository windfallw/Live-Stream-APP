<template>
  <v-col>
    <v-card>
      <video
          ref="VideoPlayer"
          class="video-js"
      />
      <v-card-title>app直播源</v-card-title>

      <v-card-actions>
        <v-spacer></v-spacer>

        <v-btn icon>
          <v-icon>mdi-heart</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-bookmark</v-icon>
        </v-btn>

        <v-btn icon>
          <v-icon>mdi-share-variant</v-icon>
        </v-btn>
      </v-card-actions>

    </v-card>
  </v-col>
</template>

<script>
import videojs from 'video.js';

export default {
  name: "VideoPlayer",
  components: {},
  props: ['videoSrc'],
  data()
  {
    return {
      player: null,
      videoOptions: {
        fluid: true,
        autoplay: false,
        controls: true,
        preload: 'auto',
        sources: [
          {
            src: this.videoSrc,
            //src: "http://playertest.longtailvideo.com/adaptive/bipbop/gear4/prog_index.m3u8",
            type: "application/x-mpegURL"
          }
        ]
      }

    }
  },
  mounted()
  {
    this.player = videojs(this.$refs.VideoPlayer, this.videoOptions, function onPlayerReady()
    {
      console.log('onPlayerReady', this);
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
