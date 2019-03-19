<template>
  <div>
    {{ id }}
    <button>Cancel</button>
  </div>
</template>

<script>
export default {
  props: {
    id: String,
  }
}
</script>
