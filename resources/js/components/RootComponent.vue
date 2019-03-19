<template>
  <div>
    <menu-component></menu-component>
    <list-component
      @edit="edit"
    ></list-component>
    <edit-post v-bind:id="editPost"></edit-post>
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
