<template>
  <div>
    <ul>
      <li
        v-for="post in posts"
        :key="post.id"
      >
        <router-link
          :to="`/dashboard/edit/${post._id}`"
        >
          {{ post.title }}
        </router-link>
      </li>
    </ul>
    <button
      v-if="prevPageUrl"
      class="btn btn-primary"
      @click="load(prevPageUrl)"
    >
      Previous Page
    </button>
    <button
      v-if="nextPageUrl"
      class="btn btn-primary"
      @click="load(nextPageUrl)"
    >
      Next Page
    </button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
      path: '/api/v1/posts',
      prevPageUrl: '',
      nextPageUrl: '',
    };
  },
  async mounted() {
    const {
      data: {
        data: posts,
        next_page_url: nextPageUrl,
        prev_page_url: prevPageUrl,
      },
    } = await axios(this.path);

    this.posts = posts;
    this.nextPageUrl = nextPageUrl;
    this.prevPageUrl = prevPageUrl;
  },
  methods: {
    async load(url) {
      const {
        data: {
          data: posts,
          next_page_url: nextPageUrl,
          prev_page_url: prevPageUrl,
        },
      } = await axios(url);

      this.path = url;
      this.posts = posts;
      this.nextPageUrl = nextPageUrl;
      this.prevPageUrl = prevPageUrl;
    },
  },
};
</script>
