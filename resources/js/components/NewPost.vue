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
      errorMessage: '',
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
    save() {
      if (this.unsaved) {
        const { title, content } = this.unsaved;

        axios({
          method: 'post',
          url: '/api/v1/posts/store',
          data: {
            title,
            content,
          },
        })
          .then((response) => {
            console.log(response);
            delete this.unsaved;
            this.$emit('update:createPost', '');
          })
          .catch(({ response: { data: { errors, message } } }) => {
            let errorMessage = `${message}<br />`;
            errors.title.forEach((singleTitle) => {
              errorMessage += `${singleTitle}<br />`;
            });

            this.errorMessage = errorMessage;

            setTimeout(() => {
              this.errorMessage = '';
            }, 10000);
          });
      }
    },
  },
};
</script>
