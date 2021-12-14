<template>
  <v-navigation-drawer v-model="drawer" app overlay-color="white">
    <v-sheet color="white" class="pa-4">
      <v-avatar class="mb-4" color="grey darken-1" size="64">
        <v-img
          src="http://client.sierrainteractivedev.com/agentphotos/1062/agent_1_01.jpg"
        ></v-img>
      </v-avatar>

      <span>greg@geilman.com</span>
    </v-sheet>

    <v-divider></v-divider>

    <v-list shaped>
      <v-list-item-group v-model="model" mandatory color="white">
        <v-list-item v-for="(item, i) in items" :key="i" link :to="item.route">
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="item.text"></v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
</template>
<script>
export default {
  data: () => ({
    drawer: null,
    items: [
      { icon: "mdi-home", text: "Dashboard", route: "/admin/dashboard" },
      { icon: "mdi-bell", text: "Events", route: "/admin/events" },
      { icon: "mdi-message-text", text: "Messages", route: "/admin/messages" },
      { icon: "mdi-pound-box", text: "Channels", route: "/admin/channels" },
      { icon: "mdi-file", text: "Files", route: "/admin/files" },
      { icon: "mdi-account-multiple", text: "Teams", route: "/admin/teams" },
    ],
    model: 1,
  }),
};
</script>
<style scoped>
.v-list-item--active {
  /* background: linear-gradient(98deg, rgba(255,254,142,1) 0%, rgba(253,85,85,1) 94%); */
  background-color: #800000;
}
</style>