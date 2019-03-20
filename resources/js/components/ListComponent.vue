<template>
  <ul>
    <li
      v-for="post in posts"
      :key="post.id"
    >
      <a
        :href="`/dashboard/edit/${post._id}`"
        @:click.prevent="edit(post._id)"
      >
        {{ post.title }}
      </a>
    </li>
  </ul>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
    };
  },
  mounted() {
    axios('/api/v1/posts').then((response) => {
      this.posts = response.data.data;
    });
  },
  methods: {
    edit(id) {
      this.$emit('edit', id);
    },
  },
};
</script>
