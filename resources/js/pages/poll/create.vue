<template>
  <div class="row">
    <div class="col-lg-12">
      <card :title="$t('create_a_poll')">
        <form @submit.prevent="create" @keydown="form.onKeydown($event)">
          <!-- Name -->
          <div class="form-group row">
            <b class="col-md-3 col-form-label text-md-right">{{ $t('poll_name') }}</b>
            <div class="col-md-7">
              <input
                v-model="form.name"
                class="form-control"
                type="text"
                name="name"
                :placeholder="$t('poll_name_placeholder')"
              >
            </div>
          </div>

          <!-- Question(s) -->
          <div
            v-for="(question, questionIndex) in form.questions"
            :key="questionIndex"
            class="form-group"
          >
            <div class="row">
              <label class="col-md-2 col-form-label text-md-right">{{ $t('poll_question') }}</label>
              <div class="col-md-10">
                <input
                  v-model="form.questions[questionIndex].content"
                  class="form-control"
                  type="text"
                  name="question"
                  :placeholder="$t('poll_question_placeholder')"
                >
              </div>
            </div>
            <!-- Choices -->
            <div
              v-for="(choice, choiceIndex) in form.questions[questionIndex].choices"
              :key="choiceIndex"
              class="form-group row"
            >
              <label
                class="col-md-2 col-form-label text-md-right"
              >{{ choiceIndex + 1 + ". " + $t('choice') }}</label>
              <div class="col-md-6">
                <input
                  v-model="form.questions[questionIndex].choices[choiceIndex]"
                  class="form-control"
                  type="text"
                  name="question"
                  :placeholder="$t('poll_choice_placeholder')"
                >
              </div>
            </div>
            <div class="row">
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
          </div>

          <!-- Add Question -->
          <div class="row">
            <button type="button" class="btn btn-primary" style="float: right" @click="addQuestion">
              {{ $t('add_a_question') }}
              <fa icon="plus-circle" fixed-width/>
            </button>
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
import Form from "vform";

export default {
  middleware: "auth",

  metaInfo() {
    return { title: this.$t("create_a_poll") };
  },

  data: () => ({
    form: new Form({
      name: "",
      questions: [{ content: "", choices: [""] }]
    })
  }),

  methods: {
    create() {
      this.form.post("/api/poll/store");
    },

    addQuestion() {
      this.form.questions.push({ content: "", choices: [""] });
    },
    addChoice(questionIndex) {
      this.form.questions[questionIndex].choices.push("");
    }
  }
};
</script>
