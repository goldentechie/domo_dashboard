<template>
  <v-card elevation="24" class="mx-auto my-5 background" width="1205" height="884" outlined tile>
    <ToolBar />
    <v-container class="mt-16 mx-auto">
      <v-row no-gutters>
        <v-col>
          <v-container class="pa-2" height="505">
            <v-card class='d-flex mx-2 mb-auto' elevation="0">
              <v-container>
                <v-row class='pb-12'>
                  <v-img
                    class="rounded-circle mx-auto transition-swing secondary"
                    elevation="12"
                    max-width="150"
                    max-height="150"
                    src="http://client.sierrainteractivedev.com/agentphotos/1062/agent_1_01.jpg"
                  ></v-img>
                </v-row>
                <v-card class="text-h3 mx-auto" text="Welcome" width="fit-content" elevation="0">
                  Welcome
                </v-card>
              </v-container>
            </v-card>
            <v-card outlined class="mx-2 my-16" elevation="24">
              <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        <v-btn class="mx-2" fab dark color="indigo" elevation="0" width="35px" height="35px">
                            <v-icon dark>
                                mdi-plus
                            </v-icon>
                        </v-btn>
                        New Post
                    </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        <v-btn class="mx-2" fab dark color="orange lighten-1" elevation="0" width="35px" height="35px">
                            <v-icon dark>
                                mdi-bell-outline
                            </v-icon>
                        </v-btn>
                        New announcement
                    </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        <v-btn class="mx-2" fab dark color="green lighten-2" elevation="0" width="35px" height="35px">
                            <v-icon dark>
                              mdi-calendar-blank
                            </v-icon>
                        </v-btn>
                        New Event
                    </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-card> 
          </v-container>
        </v-col>
        <v-col>
          <v-container class="pa-2">
            <v-card outlined class="mx-2" elevation="24" height="505">
              <div class='text-h6 adjust-self-center my-3 ml-7'>FEED</div>
              <v-divider class='mt-0'></v-divider>
              <div>James Smith</div>
              <div>12min ago</div>
              <div>Coffee & espresso drinks for connoisseurs at this casual cafe with a living  room-like atmosphere.</div>
              <div><v-icon heart></v-icon>135<v-icon msg></v-icon>26</div>

              <div>Vera Hansen</div>
              <div>12min ago</div>
              <div>Coffee & espresso drinks for connoisseurs at</div>
              <div><v-icon heart></v-icon>135<v-icon msg></v-icon>26</div>
            </v-card>
          </v-container>
        </v-col>
        <v-col>
          <v-container class="pa-2" tile >
            <v-card outlined class="mx-2" elevation="24">
              <div class='text-h6 adjust-self-center my-3 ml-7'>STATS</div>
              <v-divider class='mt-0'></v-divider>
              <v-row no-gutters>
                <v-col>
                <v-progress-circular
                  rotate="-90"
                  size="100"
                  width="15"
                  value="25"
                  color="pink"
                  background-color="purple"
                  class='mx-auto ajust-self-center'
                >
                  25
                </v-progress-circular>
                </v-col>
                <v-col>
                <v-card-text class='text-h6'>15%</v-card-text>
                <div>Conversation Rate</div>
                </v-col>
              </v-row>
            </v-card>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>
 
<script>
// import BottomBannerSVG from '../components/Home/BottomBannerSVG.vue'
import ToolBar from "../components/Home/ToolBar.vue"
export default {
  components: { /*BottomBannerSVG, */ToolBar },
}
</script>
<style scoped>
.background {
  background-image: url("data:image/svg+xml,%3Csvg width='1205' height='884' viewBox='0 0 1205 884' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_dd_0_1)'%3E%3Crect width='1205' height='884' fill='white'/%3E%3C/g%3E%3Crect y='540' width='1205' height='344' fill='url(%23paint0_linear_0_1)'/%3E%3Cdefs%3E%3Cfilter id='filter0_dd_0_1' x='-90' y='-40' width='1385' height='1064' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' type='matrix' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0' result='hardAlpha'/%3E%3CfeOffset dy='15'/%3E%3CfeGaussianBlur stdDeviation='25'/%3E%3CfeColorMatrix type='matrix' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0'/%3E%3CfeBlend mode='normal' in2='BackgroundImageFix' result='effect1_dropShadow_0_1'/%3E%3CfeColorMatrix in='SourceAlpha' type='matrix' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0' result='hardAlpha'/%3E%3CfeOffset dy='50'/%3E%3CfeGaussianBlur stdDeviation='45'/%3E%3CfeColorMatrix type='matrix' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0'/%3E%3CfeBlend mode='normal' in2='effect1_dropShadow_0_1' result='effect2_dropShadow_0_1'/%3E%3CfeBlend mode='normal' in='SourceGraphic' in2='effect2_dropShadow_0_1' result='shape'/%3E%3C/filter%3E%3ClinearGradient id='paint0_linear_0_1' x1='-634.672' y1='758.615' x2='-402.747' y2='1516.99' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%234D8BFF'/%3E%3Cstop offset='1' stop-color='%23FF6985'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E%0A");
}
</style>