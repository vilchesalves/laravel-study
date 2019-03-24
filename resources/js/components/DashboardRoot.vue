<template>
  <div class="container">
    <menu-component />
    <router-view />
  </div>
</template>

<script>
import menuComponent from './MenuComponent.vue';

export default {
  components: {
    menuComponent,
  },
};
</script>
