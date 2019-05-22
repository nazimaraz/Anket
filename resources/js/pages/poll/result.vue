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
          <div class="list-group-item" v-for="choice in question.choices" :key="choice.id">
            <label class="choice-content" :for="choice.id">
              {{ choice.content }}
              <b>({{ choice.voteNumber + ' ' + $t('votes') }})</b>
            </label>
            <div id="myProgress">
              <div id="myBar" :style="'width: ' + choice.percentage + '%'">{{ choice.percentage }}%</div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <button type="button" class="btn btn-primary" @click="vote">{{ $t('vote') }}</button>
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
    isLoading: true
  }),
  methods: {
    vote() {
      this.$router.push({
        name: "poll.show",
        params: { pollID: this.poll.id }
      });
    }
  },
  created() {
    axios
      .get("/api/poll/" + this.$route.params.pollID + "/result")
      .then(response => {
        this.poll = response.data;
        this.poll.questions.forEach(question => {
          question.choices.forEach(choice => {
            if (question.totalVotes === 0) {
              choice.percentage = 0;
            } else {
              choice.percentage = (
                (choice.voteNumber * 100) /
                question.totalVotes
              ).toFixed(2);
            }
          });
        });
        this.isLoading = false;
      });
  }
};
</script>

<style scoped>
.choice-content {
  margin-bottom: 0;
}

.choice-input {
  position: initial;
}

.question-card {
  margin-bottom: 10px;
}

#myProgress {
  width: 100%;
  background-color: #ddd;
}

#myBar {
  height: 30px;
  background-color: #208eed;
  text-align: center;
  line-height: 30px;
  color: white;
}
</style>
