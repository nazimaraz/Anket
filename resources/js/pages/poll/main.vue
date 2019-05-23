<template>
  <section>
    <loader v-if="isLoading"/>
    <div v-else class="row">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <router-link
            :to="{ name: 'poll.show' }"
            class="nav-link"
            :class="{ active: activeTab === 'poll.show' }"
          >Oy Ver</router-link>
        </li>
        <li class="nav-item">
          <router-link
            :to="{ name: 'poll.result' }"
            class="nav-link"
            :class="{ active: activeTab === 'poll.result' }"
          >Sonuçlar</router-link>
        </li>
        <li class="nav-item">
          <router-link
            :to="{ name: 'poll.comments' }"
            class="nav-link"
            :class="{ active: activeTab === 'poll.comments' }"
          >Yorumlar</router-link>
        </li>
      </ul>
    </div>
    <div class="ro">
      <transition name="fade" mode="out-in">
        <router-view/>
      </transition>
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
    isLoading: false,
    activeTab: ""
  }),
  created() {
    this.activeTab = this.$route.name;
  },
  watch: {
    $route(to, from) {
      this.activeTab = to.name;
    }
  }
};
</script>
