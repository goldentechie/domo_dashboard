<template>
  <div>
    <Navigation />
    <router-view class="grey lighten-3"></router-view>
  </div>
</template>

<script>
import Navigation from '../components/Dashboard/Navigation.vue';

export default {
  components: { Navigation },
};
</script>
