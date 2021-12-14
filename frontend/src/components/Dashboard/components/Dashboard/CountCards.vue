<template>
  <v-row>
    <v-col v-for="item in items" :key="item.class" cols="12" sm="4">
      <v-card
        class="d-flex mb-6 pa-2 rounded-lg red lighten-1"
        :class="item.class"
        height="150"
      >
        <v-card class="pa-2" flat color="transparent" dark>
          <div class="text-h6">{{ item.text }}</div>
          <div class="text-h2">{{ item.count }}</div>
        </v-card>
        <v-card class="pa-2 ml-auto" flat color="transparent">
          <v-icon dark> mdi-bell-ring </v-icon>
        </v-card>
      </v-card>
    </v-col>
  </v-row>
</template>
<script>
export default {
  data: () => ({
    items: [
      {
        text: "Event Logged",
        count: 318162543,
        class: "card-event-logged",
        icon: "mdi-bell-ring",
      },
      {
        text: "Messages Processed",
        count: 318162543,
        class: "card-messages-processed",
        icon: "mdi-message-text",
      },
      {
        text: "Channels Active",
        count: 318162543,
        class: "card-channels-active",
        icon: "mdi-pound-box",
      },
    ],
  }),
};
</script>
<style scoped>
.card-event-logged {
  background: rgb(239, 83, 80);
  background: linear-gradient(
    165deg,
    rgba(239, 83, 80, 1) 0%,
    rgba(255, 210, 210, 1) 94%
  );
}

.card-messages-processed {
  background: rgb(82, 80, 239);
  background: linear-gradient(
    165deg,
    rgba(82, 80, 239, 1) 0%,
    rgba(216, 210, 255, 1) 94%
  );
}

.card-channels-active {
  background: rgb(89, 185, 62);
  background: linear-gradient(
    165deg,
    rgba(89, 185, 62, 1) 0%,
    rgba(213, 255, 208, 1) 94%
  );
}
</style>