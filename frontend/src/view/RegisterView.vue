<template>
  <v-card elevation="24" class="mx-auto my-5" outlined tile width="500">
    <form novalidate @submit.prevent="validateForm">
      <mdb-row>
        <mdb-col md="12">
          <mdb-card>
            <mdb-card-body class="mx-4">
              <div class="text-center">
                <h3 class="dark-grey-text mb-5"><strong>Register</strong></h3>
              </div>
              <mdb-input
                required
                label="Your User ID"
                type="text"
                v-model="data.userid"
                :customValidation="validation.userid.validated"
                :isValid="validation.userid.valid"
                :invalidFeedback="validation.userid.invalidFeedback"
                @change="validate('userid')"
              />
              <mdb-input
                required
                label="Your password"
                type="password"
                containerClass="mb-0"
                v-model="data.password"
                :customValidation="validation.password.validated"
                :isValid="validation.password.valid"
                :invalidFeedback="validation.password.invalidFeedback"
                @change="validate('password')"
              />
              <mdb-input
                required
                label="Confirm Password"
                type="password"
                containerClass="mb-0"
                v-model="data.confirm"
                :customValidation="validation.confirm.validated"
                :isValid="validation.confirm.valid"
                :invalidFeedback="validation.confirm.invalidFeedback"
                @change="validate('confirm')"
              />
              <mdb-input
                required
                label="Sierra API Key"
                type="text"
                containerClass="mb-0"
                v-model="data.sierrakey"
                :customValidation="validation.sierrakey.validated"
                :isValid="validation.sierrakey.valid"
                :invalidFeedback="validation.sierrakey.invalidFeedback"
                @change="validate('sierrakey')"
              />
              <div class="text-center mb-3">
                <mdb-btn
                  type="submit"
                  gradient="blue"
                  rounded
                  class="btn-block z-depth-1a"
                  >Subscribe</mdb-btn
                >
              </div>
            </mdb-card-body>
          </mdb-card>
        </mdb-col>
      </mdb-row>
    </form>
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
      data: {
        userid: "",
        password: "",
        confirm: "",
        sierrakey: "",
      },
      validation: {
        userid: {
          valid: false,
          validated: false,
          invalidFeedback: "",
        },
        password: {
          valid: false,
          validated: false,
          invalidFeedback: "",
        },
        confirm: {
          valid: false,
          validated: false,
          invalidFeedback: "",
        },
        sierrakey: {
          valid: false,
          validated: false,
          invalidFeedback: "",
        },
      },
    };
  },
  mounted() {
    // bring teams
    console.log(this.$route.query);
  },
  methods: {
    checkForm(event) {
      event.target.classList.add("was-validated");
    },
    validateForm() {
      Object.keys(this.data).forEach((key) => {
        this.validate(key);
      });
    },
    validate(key) {
      if (key === "userid") {
        console.log(this.data[key].length);
        if (this.data[key].length == 0) 
        {
          this.validation[key].valid = false;
          this.validation[key].invalidFeedback = "Type your user ID";
        }
        else {
        this.axios
          .post(`${process.env.VUE_APP_API_URL}/api/dashboard/findUserId`, {
            id: this.data.userid,
          })
          .then((response) => {
            if(response.data.ok)
            {
              this.validation[key].valid = false;
              this.validation[key].invalidFeedback = "That user id is taken. Try another.";
            }
            else 
              this.validation[key].valid = true;
          });
        }
        this.validation[key].validated = true;
      }
      if (key === "password") {
        // check length
        if (this.data[key].length > 5) {
          // check uppercase
          for (let character of this.data[key].split("")) {
            if (character === character.toUpperCase()) {
              this.validation[key].valid = true;
              break;
            }
            this.validation[key].valid = false;
            this.validation[key].invalidFeedback =
              "Password should contain at least one uppercase character.";
          }
        } else {
          this.validation[key].valid = false;
          this.validation[key].invalidFeedback =
            "Password too short. Type at least 6 letters.";
        }
        this.validation[key].validated = true;
      }
      if (key === "confirm") {
        // check length
        console.log(this.validation.password.valid);
        console.log(this.data[key].length);
        console.log(this.data["password"] === this.data[key]);
        if (this.validation.password.valid) {
          if (this.data[key].length == 0) {
            this.validation[key].valid = false;
            this.validation[key].invalidFeedback = "Type confirm password";
          } else if (this.data["password"] === this.data[key]) {
            this.validation[key].valid = true;
          } else {
            this.validation[key].valid = false;
            this.validation[key].invalidFeedback = "Password does not match!";
          }
        } else {
          this.validation[key].valid = false;
          this.validation[key].invalidFeedback = "Please type valid password";
        }
        this.validation[key].validated = true;
      }
      if (key === "sierrakey") {
        if (
          /[a-z0-9A-Z]{8}-[a-z0-9A-Z]{4}-[a-z0-9A-Z]{4}-[a-z0-9A-Z]{4}-[a-z0-9A-Z]{12}/gimsu.test(
            this.data[key]
          )
        )
          this.validation[key].valid = true;
        else {
          this.validation[key].valid = false;
          this.validation[key].invalidFeedback = "Invalid Sierra API Key";
        }
        this.validation[key].validated = true;
      }
    },
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
