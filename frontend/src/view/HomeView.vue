<template>
  <v-card
    elevation="24"
    class="mx-auto my-5"
    outlined
    tile
    width="500"
  >
    <section class="form-elegant">
      <mdb-row>
        <mdb-col md="12">
          <mdb-card>
            <mdb-card-body class="mx-4">
              <div class="text-center">
                <h3 class="dark-grey-text mb-5"><strong>Sign in</strong></h3>
              </div>
              <label>Workspace</label>
              <select class="browser-default custom-select">
                <option v-for="{text, value, selected} in basicOptions" :key="value" :value="value" :selected="selected">
                  {{text}}
                </option>
              </select>
              <mdb-input label="Your email" type="email" />
              <mdb-input
                label="Your password"
                type="password"
                containerClass="mb-0"
              />
              <div class="text-center mb-3">
                <mdb-btn
                  type="button"
                  gradient="peach"
                  rounded
                  class="btn-block z-depth-1a"
                  >Sign in</mdb-btn
                >
              </div>
              <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2 ">
                or
              </p>
              <div class="row my-3 d-flex justify-content-center">
                <mdb-btn
                  type="button"
                  color="white"
                  tag="a"
                  rounded
                  class="mr-md-3 z-depth-1a"
                  href="https://slack.com/oauth/v2/authorize?client_id=2732118217091.2739111978340&scope=channels:history,channels:read,chat:write,commands,emoji:read,files:read,groups:history,groups:read,groups:write,im:history,im:read,incoming-webhook,mpim:history,mpim:read,team:read,users.profile:read,users:read,users:read.email,users:write&user_scope=channels:history,channels:read,files:read,groups:history,im:history,mpim:history,users.profile:read,users:read,users:read.email&redirect_uri=https://thedomogroup.com/api/register"
                >
                  <mdb-icon fab size="5x" icon="slack" class="red-text text-center" />
                  <div>Add a new Slack Bot</div>
                </mdb-btn>
              </div>
            </mdb-card-body>
          </mdb-card>
        </mdb-col>
      </mdb-row>
    </section>
  </v-card>
</template>
<script>
import {
  mdbRow,
  mdbCol,
  mdbCard,
  mdbCardBody,
  mdbInput,
  mdbBtn,
  mdbIcon,
} from "mdbvue";
export default {
  name: "FormsPage",
  components: {
    mdbRow,
    mdbCol,
    mdbCard,
    mdbCardBody,
    mdbInput,
    mdbBtn,
    mdbIcon,
  },
  data() {
    return {
      showModal: false,
      basicOptions: [
        { text: "Option nr 1", value: "Option 1", selected:false },
        { text: "Option nr 2", value: "Option 2", selected:true },
        { text: "Option nr 3", value: "Option 3", selected:false },
      ],
    };
  },
};
</script>
<style>
.form-elegant .font-small {
  font-size: 0.8rem;
}

.form-elegant .z-depth-1a {
  -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26),
    0 4px 12px 0 rgba(121, 155, 254, 0.25);
  box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26),
    0 4px 12px 0 rgba(121, 155, 254, 0.25);
}

.form-elegant .z-depth-1-half,
.form-elegant .btn:hover {
  -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28),
    0 4px 15px 0 rgba(36, 133, 255, 0.15);
  box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28),
    0 4px 15px 0 rgba(36, 133, 255, 0.15);
}
</style>
