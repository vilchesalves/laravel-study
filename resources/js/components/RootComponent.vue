<template>
  <div>
    <menu-component></menu-component>
    <list-component></list-component>
  </div>
</template>

<script>
import menuComponent from './MenuComponent';
import listComponent from './ListComponent';

export default {
  components: {
    menuComponent,
    listComponent,
  },
}
</script>

