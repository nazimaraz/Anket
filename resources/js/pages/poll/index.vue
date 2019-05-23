<template>
  <section>
    <loader v-if="isLoading"/>
    <div v-else class="row">
      <div class="col-lg-12">
        <h1 v-if="polls.length === 0">{{ $t('no_poll') }}</h1>
        <ul v-else class="list-group">
          <router-link
            v-for="poll in polls"
            :key="poll.id"
            class="list-group-item list-group-item-action"
            :to="{ name: 'poll.show', params: { pollID: poll.id } }"
          >{{ poll.name }}</router-link>
        </ul>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import Loader from "../../components/Loader";

export default {
  components: { Loader },
  metaInfo() {
    return { title: this.$t("polls") };
  },
  data: () => ({
    polls: [],
    isLoading: true
  }),
  created() {
    axios.get("/api/poll/index").then(response => {
      this.polls = response.data;
      this.isLoading = false;
    });
  }
};
</script>
