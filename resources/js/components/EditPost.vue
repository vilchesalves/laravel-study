<template>
  <div v-if="id">
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
      title: '',
      content: '',
    };
  },
  watch: {
    id(newId, oldId) {
      if (newId !== oldId) {
        this.loadContent({ id: newId });
      }
    },
  },
  mounted() {
    if (this.id) {
      this.loadContent({ id: this.id });
    }
  },
  methods: {
    async loadContent({ id }) {
      const {
        data: {
          title,
          content,
        },
      } = await axios(`/api/v1/posts/${id}`);

      this.title = title;
      this.content = content;

      delete this.unsaved;
    },
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
        this.$emit('update:id', '');
      }
    },
    cancel() {
      this.$emit('update:id', '');
    },
  },
};
</script>
