<template>
  <div class="row">
    <div class="col-lg-12">
      <router-link
        v-for="poll in polls"
        :key="poll.id"
        :to="{ name: 'poll.show', params: { pollID: poll.id } }"
      >
        {{ poll.name }}
        <br>
      </router-link>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  metaInfo() {
    return { title: this.$t("polls") };
  },
  data: () => ({
    polls: []
  }),
  created() {
    axios.get("/api/poll/index").then(response => {
      this.polls = response.data;
    });
  }
};
</script>
