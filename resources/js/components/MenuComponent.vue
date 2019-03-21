<template>
  <ul>
    <li>
      <a
        href=""
        @click.prevent="$emit('list')"
      >List posts</a>
    </li>
    <li>
      <a
        href=""
        @click.prevent="$emit('create')"
      >Create post</a>
    </li>
  </ul>
</template>
