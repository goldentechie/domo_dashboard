<template>
  <v-main>
     <v-container class="py-8 px-6 grey lighten-3" fluid>
      <v-card class="d-flex mb-6" color="grey lighten-3" flat height="100" tile>
        <v-card class="pa-2 align-self-center" color="grey lighten-3" flat tile>
          <v-btn color="red darken-4" fab class="ma-2 white--text rounded-lg">
            <v-icon dark> mdi-home </v-icon>
          </v-btn>
        </v-card>
        <v-card class="pa-2 align-self-center" color="grey lighten-3" flat tile>
          <div class="text-h6">Dashboard</div>
        </v-card>
      </v-card>
      <CountCards />
      <v-row>
        <v-col cols="12" sm="7">
          <RecentEvents />
        </v-col>
        <v-col cols="12" sm="5">
          <ChannelsActivity />
        </v-col>
      </v-row>
    </v-container>
  </v-main>
</template>
<script>
import ChannelsActivity from './components/Dashboard/ChannelsActivity.vue';
import CountCards from "./components/Dashboard/CountCards.vue";
import RecentEvents from "./components/Dashboard/RecentEvents.vue";
export default {
  components: { CountCards, RecentEvents, ChannelsActivity },
};
</script>