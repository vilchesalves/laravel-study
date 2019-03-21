<template>
  <div>
    <input
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
    <button @click="$emit('cancel')">
      Cancel
    </button>
  </div>
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
      }
    },
  },
};
</script>
