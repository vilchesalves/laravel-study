<template>
  <form v-if="id">
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
      <button
        class="btn btn-danger"
        @click.prevent="destroy"
      >
        Destroy
      </button>
    </div>
  </form>
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
