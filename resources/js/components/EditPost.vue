<template>
  <div v-if="currentId">
    <input
      v-if="title"
      :value="title"
      @input="update('title', $event.target.value)"
    >
    <textarea
      :value="content"
      @input="update('content', $event.target.value)"
    />
    <button @click="save">
      Save
    </button>
    <button @click="cancel">
      Cancel
    </button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    id: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      currentId: this.id,
      title: '',
      content: '',
    };
  },
  async beforeUpdate() {
    if (this.id) {
      const {
        data: {
          title,
          content,
        },
      } = await axios(`/api/v1/posts/${this.id}`);

      this.title = title;
      this.content = content;
      delete this.unsaved;
    }
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
      const { currentId: id } = this;
      const { title, content } = this.unsaved;

      if (this.unsaved) {
        await axios({
          method: 'post',
          url: '/api/v1/posts/update',
          data: {
            id,
            title,
            content,
          },
        });

        delete this.unsaved;
        this.currentId = '';
      }
    },
    cancel() {
      this.currentId = '';
    },
  },
};
</script>
