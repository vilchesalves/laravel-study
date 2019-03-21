<template>
  <ul>
    <li
      v-for="post in posts"
      :key="post.id"
    >
      <a
        :href="`/dashboard/edit/${post._id}`"
        @click.prevent="edit(post._id)"
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
  async mounted() {
    const {
      data: {
        data: posts,
      },
    } = await axios('/api/v1/posts');
    this.posts = posts;
  },
  methods: {
    edit(id) {
      this.$emit('edit', id);
    },
  },
};
</script>
