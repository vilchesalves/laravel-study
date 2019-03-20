<template>
  <div>
    <menu-component />
    <list-component @edit="edit" />
    <edit-post v-bind:id="editPost" />
  </div>
</template>

<script>
import menuComponent from './MenuComponent';
import listComponent from './ListComponent';
import editPost from './EditPost';

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
    }
  },
}
</script>
