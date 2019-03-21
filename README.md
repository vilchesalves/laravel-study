# pre requisites

1. requirements from https://laravel.com/docs/5.7/installation;
2. mongodb;
3. php-mongodb extension.

# build steps

1. bring the terminal to the project root;
2. run `composer install`;
3. run `npm install`;
4. run `npm run prod`;
5. run `php artisan migrate`;
6. run `php artisan db:seed`;
7. run `php artisan serve`.

The blog should be running at http://localhost:8000 and an admin user is available.

# credentials

- e-mail: admin@example.com
- password: admin

# tests

A small suite of unit tests is available through `./vendor/bin/phpunit`.

# dashboard

A dashboard is available at http://localhost:8000/dashboard.

It is a small Vue.js application that manages the posts through the Laravel API routes.

The initial page displays a list of the posts. The admin user can select any of them in order to edit or delete it. On the header there is a "create post" button that allows the user to create a new post.

# next features to be included

- a better design for the displayed posts;
- enable markdown text for the posts;
- implement an unit test suite for the js dashboard;
- comment section for the posts;
- post filtering for the dashboard;
- a search functionality;
- tags and categories.

And this list could go on forever, right? :)
