<template>
  <section>
    <loader v-if="isLoading"/>
    <div v-else class="row">
      <div class="col-lg-12">
        <h1>Yorumlar</h1>
        <div class="list-group">
          <li
            v-for="comment in poll.comments"
            :key="comment.id"
            class="list-group-item list-group-item-action flex-column align-items-start"
          >
            <div class="d-flex w-100 justify-content-between">
              <router-link :to="{ name: 'user.show', params: { userID: comment.user.id } }">
                <h5 class="mb-1">{{ comment.user.name }}</h5>
              </router-link>
            </div>
            <p class="mb-1">{{ comment.content }}</p>
          </li>
        </div>
        <form v-if="user" @submit.prevent="submit">
          <div class="form-group">
            <label for="comment">Email address</label>
            <input v-model="comment" class="form-control" id="comment" placeholder="Enter email">
          </div>
          <button class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import Loader from "../../components/Loader";
import { mapGetters } from "vuex";

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
    isLoading: true,
    comment: ""
  }),
  methods: {
    submit() {
      console.log(this.comment);
      axios.post("/api/comments/store", {
        comment: this.comment,
        userID: this.user.id,
        pollID: this.poll.id
      });
    }
  },
  created() {
    axios
      .get("/api/poll/" + this.$route.params.pollID + "/comments")
      .then(response => {
        this.poll = response.data;
        console.log(this.poll.comments);
      });
    this.isLoading = false;
  }
};
</script>
