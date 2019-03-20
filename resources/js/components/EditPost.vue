<template>
  <div v-if="id">
    <input
      v-if="title"
      v-bind:value="title"
      v-on:input="update('title', $event.target.value)"
    />
    <textarea
      v-bind:value="content"
      v-on:input="update('content', $event.target.value)"
    />
    <button
      v-on:click="save"
    >Save</button>
    <button
      v-on:click="cancel"
    >Cancel</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    id: String,
  },
  data() {
    return {
      title: '',
      content: '',
    };
  },
  methods: {
    update(field, value) {
      this.unsaved = this.unsaved || {
        title: this.title,
        content: this.content,
      };
      this.unsaved[field] = value;
    },
    async save() {
      const { id } = this;
      const { title, content } = this.unsaved;

      if (this.unsaved) {
        const response = await axios({
          method: 'post',
          url: '/api/v1/posts/edit',
          data: {
            id,
            title,
            content,
          }
        });

        delete this.unsaved;
        this.id = '';
      }
    },
    cancel() {
      this.id = '';
    },
  },
  async beforeUpdate() {
    if (this.id) {
      const { data: {
        title,
        content,
      }} = await axios(`/api/v1/posts/${this.id}`);

      this.title = title;
      this.content = content;
    }
  }
}
</script>
