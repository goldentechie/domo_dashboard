<template>
  <v-card
    elevation="24"
    class="mx-auto my-5 background"
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
              <mdb-input label="Your email" type="email" />
              <mdb-input
                label="Your password"
                type="password"
                containerClass="mb-0"
              />
              <p class="font-small blue-text d-flex justify-content-end pb-3">
                Forgot <a href="#" class="blue-text ml-1"> Password?</a>
              </p>
              <div class="text-center mb-3">
                <mdb-btn
                  type="button"
                  gradient="blue"
                  rounded
                  class="btn-block z-depth-1a"
                  >Sign in</mdb-btn
                >
              </div>
              <p
                class="
                  font-small
                  dark-grey-text
                  text-right
                  d-flex
                  justify-content-center
                  mb-3
                  pt-2
                "
              >
                or Create a new bot for your workspace:
              </p>
              <div class="row my-3 d-flex justify-content-center">
                <mdb-btn type="button" color="white" rounded class="mr-md-3 z-depth-1a"
                  >
                  <mdb-icon fab icon="slack" class="blue-text text-center"/>
                </mdb-btn>
              </div>
            </mdb-card-body>
            <mdb-modal-footer class="mx-5 pt-3 mb-1">
              <p class="font-small grey-text d-flex justify-content-end">
                Not a member? <a href="#" class="blue-text ml-1"> Sign Up</a>
              </p>
            </mdb-modal-footer>
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
  mdbModalFooter,
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
    mdbModalFooter,
  },
  data() {
    return {
      showModal: false,
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
