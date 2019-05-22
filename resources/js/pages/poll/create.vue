<template>
  <div class="row">
    <div class="col-lg-12">
      <card :title="$t('create_a_poll')">
        <form @submit.prevent="create" @keydown="form.onKeydown($event)">
          <!-- Name -->
          <div class="form-group row">
            <label
              for="poll-name"
              class="col-sm-2 col-form-label text-md-right"
            >{{ $t('poll_name') }}</label>
            <div class="col-sm-10">
              <input
                v-model="form.name"
                type="text"
                class="form-control"
                id="poll-name"
                :placeholder="$t('poll_name_placeholder')"
              >
            </div>
          </div>

          <!-- Question(s) -->
          <div v-for="(question, questionIndex) in form.questions" :key="questionIndex">
            <div class="form-group row">
              <label
                :for="'question-' + questionIndex"
                class="col-sm-2 col-form-label text-md-right"
              >{{ questionIndex + 1 + ". " + $t('poll_question') }}</label>
              <div class="col-sm-10">
                <input
                  v-model="form.questions[questionIndex].content"
                  type="text"
                  class="form-control"
                  :id="'question-' + questionIndex"
                  :placeholder="$t('poll_question_placeholder')"
                >

                <!-- Choices -->
                <div
                  v-for="(choice, choiceIndex) in form.questions[questionIndex].choices"
                  :key="choiceIndex"
                  class="form-group row"
                >
                  <label
                    :for="'choice-' + choiceIndex"
                    class="col-sm-2 col-form-label text-md-right"
                  >{{ choiceIndex + 1 + ". " + $t('choice') }}</label>
                  <div class="col-sm-10">
                    <input
                      v-model="form.questions[questionIndex].choices[choiceIndex]"
                      type="text"
                      class="form-control"
                      :id="'choice-' + choiceIndex"
                      :placeholder="$t('poll_choice_placeholder')"
                    >
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <button
                      type="button"
                      class="btn btn-primary"
                      style="float: left"
                      @click="addChoice(questionIndex)"
                    >
                      {{ $t('add_a_choice') }}
                      <fa icon="plus-circle" fixed-width/>
                    </button>
                  </div>
                  <div class="col-sm-4">
                    <button
                      type="button"
                      class="btn btn-primary"
                      style="float: left"
                      @click="addQuestion"
                    >
                      {{ $t('add_a_question') }}
                      <fa icon="plus-circle" fixed-width/>
                    </button>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        :id="'other-choice-' + questionIndex"
                        v-model="form.questions[questionIndex].otherChoice"
                      >
                      <label
                        class="form-check-label"
                        :for="'other-choice-' + questionIndex"
                      >Diğer Seçeneği Olsun</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Create Button -->
          <div class="form-group row">
            <div class="col-md-7 offset-md-3 d-flex">
              <v-button type="success">{{ $t('create_a_poll') }}</v-button>
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import Form from "vform";

export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("create_a_poll") };
  },

  computed: mapGetters({
    user: "auth/user"
  }),

  data: () => ({
    form: new Form({
      name: "",
      questions: [{ content: "", choices: [""], otherChoice: false }],
      userID: ""
    })
  }),

  methods: {
    create() {
      this.form.userID = this.user.id;
      this.form.post("/api/poll/store");
    },

    addQuestion() {
      this.form.questions.push({
        content: "",
        choices: [""],
        otherChoice: false
      });
    },
    addChoice(questionIndex) {
      this.form.questions[questionIndex].choices.push("");
    }
  }
};
</script>
