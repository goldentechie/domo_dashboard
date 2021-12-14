<template>
  <v-app id="inspire">
    <Navigation />
    <router-view class="grey lighten-3"></router-view>
  </v-app>
</template>

<script>
import Navigation from '../components/Dashboard/Navigation.vue';

export default {
  components: { Navigation },
};
</script>
