<template>
  <v-card class="mx-auto">
    <v-card-title class="d-flex"> Channels Events </v-card-title>
    <v-row>
      <!-- <v-col cols="12" sm="5"> -->
      <vc-donut
        :sections="channels"
        :size="150"
        :thickness="50"
        :total="75"
        hasLegend
        legendPlacement="right"
        class="my-7 mx-auto"
      ></vc-donut>
      <div class="text-center mb-5  mx-auto">
        <v-card-title>Last scanned 40 minutes ago</v-card-title>
        <v-btn class="mx-3" color="primary" dark>Rescan</v-btn>
      </div>
    </v-row>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      channels: [
        { label: "Active Channels", value: 25, color: "#FF6384" },
        { label: "Semi-active Channels", value: 25, color: "#FFCE56" },
        { label: "Inactive Channels", value: 25, color: "#36A2EB" },
      ],
    };
  },
  methods: {
    handleSectionClick(section/*, event*/) {
      console.log(`${section.label} clicked.`);
    },
  },
};
</script>

