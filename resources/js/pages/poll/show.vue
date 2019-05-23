<template>
  <section>
    <loader v-if="isLoading"/>
    <section v-else>
      <div class="row">
        <div class="col-lg-12">
          <h1>{{ poll.name }}</h1>
        </div>
      </div>
      <div
        class="row card question-card"
        v-for="(question, questionIndex) in poll.questions"
        :key="questionIndex"
      >
        <div class="card-header">
          <p>{{ question.content }}</p>
        </div>

        <div class="list-group list-group-flush">
          <div
            class="custom-control custom-radio list-group-item"
            v-for="(choice, choiceIndex) in question.choices"
            :key="choiceIndex"
          >
            <input
              v-model="userChoices[questionIndex]"
              type="radio"
              :id="choice.id"
              :value="choice.id"
              :name="question.id"
              class="custom-control-input choice-input"
            >
            <label class="custom-control-label" :for="choice.id">{{ choice.content }}</label>
          </div>
          <div v-if="question.isOtherExist" class="custom-control custom-radio list-group-item">
            <input
              v-model="userChoices[questionIndex]"
              :value="{ id: question.id }"
              type="radio"
              :id="'other-choice-' + questionIndex"
              :name="question.id"
              class="custom-control-input choice-input"
            >
            <label
              class="custom-control-label"
              :for="'other-choice-' + questionIndex"
            >{{ $t('other') }}:</label>
            <div class="col-sm-10" style="float: right">
              <input
                v-model="otherChoices[question.id]"
                type="text"
                :id="'other-text-' + questionIndex"
                class="form-control"
                :placeholder="$t('enter_other_choice')"
              >
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <button type="button" class="btn btn-success" @click="submit">{{ $t('submit') }}</button>
        </div>
        <div class="col-md-6">
          <button type="button" class="btn btn-primary" @click="results">{{ $t('show_results') }}</button>
        </div>
      </div>
    </section>
  </section>
</template>

<script>
import { mapGetters } from "vuex";
import axios from "axios";
import Loader from "../../components/Loader";

export default {
  components: { Loader },
  metaInfo() {
    return { title: this.$t("polls") };
  },
  computed: mapGetters({
    user: "auth/user"
  }),
  data: () => ({
    poll: {},
    userChoices: [],
    isLoading: true,
    otherChoices: {}
  }),
  created() {
    axios.get("/api/poll/" + this.$route.params.pollID).then(response => {
      this.poll = response.data;
      this.userChoices.length = response.data.questions.length;
      this.isLoading = false;
    });
  },
  methods: {
    results() {
      this.$router.push({
        name: "poll.result",
        params: { pollID: this.poll.id }
      });
    },
    submit() {
      this.userChoices.forEach(choice => {
        if (typeof choice === "object") {
          choice[choice.id] =
            typeof this.otherChoices[choice.id] !== "undefined"
              ? this.otherChoices[choice.id]
              : "";
          delete choice.id;
        }
      });

      console.log(this.userChoices);
      axios
        .post("/api/choice/store", {
          userChoices: this.userChoices,
          userID: this.user.id
        })
        .then(
          this.$router.push({
            name: "poll.result",
            params: { pollID: this.poll.id }
          })
        );
    }
  }
};
</script>

<style scoped>
.choice-input {
  position: initial;
}

.question-card {
  margin-bottom: 10px;
}
</style>
