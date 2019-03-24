import VueRouter from 'vue-router';

import DashboardRoot from './components/DashboardRoot.vue';
import NewPost from './components/NewPost.vue';
import EditPost from './components/EditPost.vue';
import ListPosts from './components/ListPosts.vue';

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/dashboard',
      component: DashboardRoot,
      children: [
        {
          path: 'new',
          name: 'newPost',
          component: NewPost,
        },
        {
          path: 'edit/:id',
          name: 'editPost',
          component: EditPost,
        },
        {
          path: '',
          name: 'dashboard',
          component: ListPosts,
        },
      ],
    },
  ],
});

export default router;
