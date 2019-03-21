<template>
  <form>
    <div class="form-group">
      <label for="title">Title:</label>
      <input
        id="title"
        class="form-control"
        :value="title"
        @input="update('title', $event.target.value)"
      >
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea
        id="content"
        class="form-control"
        rows="10"
        :value="content"
        @input="update('content', $event.target.value)"
      />
    </div>
    <div class="form-group d-flex justify-content-end">
      <button
        class="btn btn-primary"
        @click.prevent="save"
      >
        Save
      </button>
      <button
        class="btn btn-light"
        @click.prevent="cancel"
      >
        Cancel
      </button>
    </div>
  </form>
</template>

<script>
import axios from 'axios';

export default {
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
    cancel() {
      this.$emit('update:createPost', '');
    },
    async save() {
      const { title, content } = this.unsaved;

      if (this.unsaved) {
        await axios({
          method: 'post',
          url: '/api/v1/posts/store',
          data: {
            title,
            content,
          },
        });

        delete this.unsaved;
        this.$emit('update:createPost', '');
      }
    },
  },
};
</script>
