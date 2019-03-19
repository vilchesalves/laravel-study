<template>
  <ul>
    <li
      v-for="post in posts"
      v-bind:key="post.id"
    ><a
      v-bind:href="`/dashboard/edit/${post._id}`"
      v-on:click.prevent="edit(post._id)"
    >
      {{ post.title }}
    </a></li>
  </ul>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
    }
  },
  mounted() {
    axios('/api/v1/posts').then((response) => {
      this.posts = response.data.data;
    });
  },
  methods: {
    edit(id) {
      this.$emit('edit', id);
    }
  }
}
</script>
