<template>
  <div class="navbar navbar-expand-md">
    <a
      class="navbar-brand"
      href="/"
    >
      Blog!
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <router-link
          to="/dashboard"
          class="nav-link"
        >
          List posts
        </router-link>
      </li>
      <li class="nav-item">
        <router-link
          to="/dashboard/new"
          class="nav-link"
        >
          Create post
        </router-link>
      </li>
      <li class="nav-item">
        <a
          href="/logout"
          class="nav-link"
        >
          Logout
        </a>
      </li>
    </ul>
  </div>
</template>
