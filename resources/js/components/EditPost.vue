<template>
  <form v-if="$route.params.id">
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
    <div
      v-if="errorMessage"
      class="alert alert-info"
      role="alert"
      v-html="errorMessage"
    />
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
import { formatPostError } from '../util';

export default {
  data() {
    return {
      id: '',
      title: '',
      content: '',
      errorMessage: '',
    };
  },
  mounted() {
    const { id } = this.$route.params;

    if (id) {
      this.loadContent({ id });
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

      this.id = id;
      this.title = title;
      this.content = content;

      delete this.unsaved;
    },
    backToDashboard() {
      this.$router.push({ name: 'dashboard' });
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
        axios({
          method: 'post',
          url: '/api/v1/posts/update',
          data: {
            id,
            title,
            content,
          },
        })
          .then(() => {
            delete this.unsaved;
            this.backToDashboard();
          })
          .catch(({ response: { data: { errors, message } } }) => {
            this.errorMessage = formatPostError({
              message, errors,
            });

            setTimeout(() => {
              this.errorMessage = '';
            }, 5000);
          });
      }
    },
    cancel() {
      this.backToDashboard();
    },
    async destroy() {
      // eslint-disable-next-line no-alert
      const confirmDestruction = window.confirm('Confirm post destruction?');

      if (confirmDestruction) {
        const { id } = this;

        await axios({
          method: 'post',
          url: '/api/v1/posts/destroy',
          data: {
            id,
          },
        });

        this.backToDashboard();
      }
    },
  },
};
</script>
