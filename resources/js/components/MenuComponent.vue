<template>
  <div class="navbar navbar-expand-md">
    <a
      class="navbar-brand"
      href="/"
    >Blog!</a>
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
      <li class="nav-item">
        <a
          href="/logout"
          class="nav-link"
        >Logout</a>
      </li>
    </ul>
  </div>
</template>
