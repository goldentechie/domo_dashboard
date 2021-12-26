<template>
  <v-card elevation="24" class="mx-auto my-5" outlined tile width="500">
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
              <div class="text-center mb-3">
                <mdb-btn
                  type="button"
                  gradient="peach"
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
                or
              </p>
              <div class="row my-3 d-flex justify-content-center">
                <a
                  href="https://slack.com/oauth/v2/authorize?client_id=2732118217091.2739111978340&scope=channels:history,channels:read,chat:write,commands,emoji:read,files:read,groups:history,groups:read,groups:write,im:history,im:read,incoming-webhook,mpim:history,mpim:read,team:read,users.profile:read,users:read,users:read.email,users:write&user_scope=team:read,channels:history,channels:read,files:read,groups:history,im:history,mpim:history,users.profile:read,users:read,users:read.email"
                  class="slack-btn"
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    style="height: 20px; width: 20px; margin-right: 12px"
                    viewBox="0 0 122.8 122.8"
                  >
                    <path
                      d="M25.8 77.6c0 7.1-5.8 12.9-12.9 12.9S0 84.7 0 77.6s5.8-12.9 12.9-12.9h12.9v12.9zm6.5 0c0-7.1 5.8-12.9 12.9-12.9s12.9 5.8 12.9 12.9v32.3c0 7.1-5.8 12.9-12.9 12.9s-12.9-5.8-12.9-12.9V77.6z"
                      fill="#e01e5a"
                    ></path>
                    <path
                      d="M45.2 25.8c-7.1 0-12.9-5.8-12.9-12.9S38.1 0 45.2 0s12.9 5.8 12.9 12.9v12.9H45.2zm0 6.5c7.1 0 12.9 5.8 12.9 12.9s-5.8 12.9-12.9 12.9H12.9C5.8 58.1 0 52.3 0 45.2s5.8-12.9 12.9-12.9h32.3z"
                      fill="#36c5f0"
                    ></path>
                    <path
                      d="M97 45.2c0-7.1 5.8-12.9 12.9-12.9s12.9 5.8 12.9 12.9-5.8 12.9-12.9 12.9H97V45.2zm-6.5 0c0 7.1-5.8 12.9-12.9 12.9s-12.9-5.8-12.9-12.9V12.9C64.7 5.8 70.5 0 77.6 0s12.9 5.8 12.9 12.9v32.3z"
                      fill="#2eb67d"
                    ></path>
                    <path
                      d="M77.6 97c7.1 0 12.9 5.8 12.9 12.9s-5.8 12.9-12.9 12.9-12.9-5.8-12.9-12.9V97h12.9zm0-6.5c-7.1 0-12.9-5.8-12.9-12.9s5.8-12.9 12.9-12.9h32.3c7.1 0 12.9 5.8 12.9 12.9s-5.8 12.9-12.9 12.9H77.6z"
                      fill="#ecb22e"
                    ></path></svg
                  >Add a new Team</a
                >
              </div>
            </mdb-card-body>
          </mdb-card>
        </mdb-col>
      </mdb-row>
    </section>
  </v-card>
</template>
<script>
import { mdbRow, mdbCol, mdbCard, mdbCardBody, mdbInput, mdbBtn } from "mdbvue";

export default {
  name: "FormsPage",
  components: {
    mdbRow,
    mdbCol,
    mdbCard,
    mdbCardBody,
    mdbInput,
    mdbBtn,
  },
  data() {
    return {
      showModal: false,
      teams: [
        { text: "Option nr 1", value: "Option 1", selected: false },
        { text: "Option nr 2", value: "Option 2", selected: true },
        { text: "Option nr 3", value: "Option 3", selected: false },
      ],
    };
  },
  mounted() {
    // bring teams
    this.axios
      .post("http://localhost:8000/api/dashboard/getTeams")
      .then((response) => console.log(response.data));
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
.slack-btn {
  align-items: center;
  color: #000;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  display: inline-flex;
  font-family: Lato, sans-serif;
  font-size: 16px;
  font-weight: 600;
  height: 48px;
  justify-content: center;
  text-decoration: none;
  width: 236px;
}
</style>
