<template>
  <div class="navbar navbar-expand-md">
    <div class="navbar-brand" href="#">Blog!</div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a
          href="#"
          class="nav-link"
          @click.prevent="$emit('list')"
        >List posts</a>
      </li>
      <li class="nav-item">
        <a
          href="#"
          class="nav-link"
          @click.prevent="$emit('create')"
        >Create post</a>
      </li>
    </ul>
  </div>
</template>
