<template>
  <div class="container">
    <menu-component
      @list="list"
      @create="create"
    />
    <new-post
      v-if="createPost"
      :create-post.sync="createPost"
    />
    <edit-post
      v-else-if="editPost"
      :id.sync="editPost"
    />
    <list-component
      v-else
      @edit="edit"
    />
  </div>
</template>

<script>
import menuComponent from './MenuComponent.vue';
import listComponent from './ListComponent.vue';
import newPost from './NewPost.vue';
import editPost from './EditPost.vue';

export default {
  components: {
    menuComponent,
    listComponent,
    newPost,
    editPost,
  },
  data() {
    return {
      createPost: false,
      editPost: '',
    };
  },
  methods: {
    edit(id) {
      this.editPost = id;
      this.createPost = false;
    },
    create() {
      this.editPost = '';
      this.createPost = true;
    },
    list() {
      this.editPost = '';
      this.createPost = false;
    },
  },
};
</script>
