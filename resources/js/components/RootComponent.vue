<template>
  <div>
    <menu-component />
    <list-component @edit="edit" />
    <edit-post :id="editPost" />
  </div>
</template>

<script>
import menuComponent from './MenuComponent.vue';
import listComponent from './ListComponent.vue';
import editPost from './EditPost.vue';

export default {
  data() {
    return {
      editPost: '',
    };
  },
  components: {
    menuComponent,
    listComponent,
    editPost,
  },
  methods: {
    edit(id) {
      this.editPost = id;
    },
  },
};
</script>
