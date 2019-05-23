<template>
  <section>
    <loader v-if="isLoading"/>
    <div v-else class="row">
      <div class="col-lg-12">
        <h1>{{ user.name }}</h1>
        <h4>{{ $t('created_polls') }}</h4>
        <div class="list-group">
          <router-link
            v-for="poll in user.polls"
            :key="poll.id"
            :to="{ name: 'poll.show', params: { pollID: poll.id } }"
            class="list-group-item list-group-item-action"
          >{{ poll.name }}</router-link>
        </div>
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
    isLoading: true,
    user: null
  }),
  created() {
    axios.get("/api/user/" + this.$route.params.userID).then(response => {
      this.user = response.data;
      this.isLoading = false;
      console.log(this.user);
    });
  }
};
</script>
