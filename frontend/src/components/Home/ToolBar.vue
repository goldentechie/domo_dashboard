<template>
  <v-toolbar
    color="white"
    light
  >
    <Logo />
    <v-toolbar-title>&nbsp;DOMO Slack Bot</v-toolbar-title>
    <v-divider
      class="mx-2"
      vertical
    ></v-divider>

    <span class="subheading">
      <v-list-item link to="/admin/dashboard">
        <v-list-item-content>
          <v-list-item-title class="text-subtitle-1">
            Dashboard
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </span>
    <v-divider
      class="mx-2"
      vertical
    ></v-divider>

    <span class="subheading">
      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="text-subtitle-1">
            FEED
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </span>
    <v-divider
      class="mx-2"
      vertical
    ></v-divider>

    <span class="subheading">
      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="text-subtitle-1">
            CHAT
          </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </span>
    <v-divider
      class="mx-2"
      vertical
    ></v-divider>
    <span class="subheading">
      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="text-subtitle-1">
            TEAMMANAGEMENT
          </v-list-item-title>
        </v-list-item-content>

        <v-list-item-action>
          <v-icon>mdi-menu-down</v-icon>
        </v-list-item-action>
      </v-list-item>
    </span>
    <v-spacer></v-spacer>

    <v-toolbar-items class="hidden-sm-and-down">
      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="text-subtitle-1">
            Apple
          </v-list-item-title>
        </v-list-item-content>

        <v-list-item-action>
          <v-icon>mdi-menu-down</v-icon>
        </v-list-item-action>
      </v-list-item>

      <v-divider vertical></v-divider>

      <v-btn text>
        <v-icon>mdi-bell</v-icon>
      </v-btn>

      <v-divider vertical></v-divider>
    </v-toolbar-items>

    <v-app-bar-nav-icon></v-app-bar-nav-icon>
  </v-toolbar>
</template>

<script>
import Logo from '../utils/logo.vue'
export default {
    components: { Logo },
}
</script>
