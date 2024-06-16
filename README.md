# Laravel + Vue.js Boilerplate

This repository contains a boilerplate project that combines Laravel and Vue.js to create a web application. It includes a login page and a basic user CRUD implementation.

## Prerequisites

Before getting started, make sure you have the following installed:

- [PHP](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org)
- [Yarn](https://yarnpkg.com/getting-started/install) or [NPM](https://www.npmjs.com/get-npm)

## Installation

1. Clone this repository:
```
git clone https://github.com/alemhar/laravel-vue-boilerplate.git
```

2. Navigate to the project directory:
```
cd laravel-vue-boilerplate
```

3. Install Laravel dependencies:
```
composer install
```

4. Copy the environment file:
```
cp .env.example .env
```

5. Generate an application key:
```
php artisan key:generate
```

6. Set up the database configuration in the `.env` file.

7. Run the database migrations:
```
php artisan migrate
```

8. Install Vue.js dependencies using Yarn:
```
yarn install
```
or using NPM:
```
npm install
```

9. Compile the Vue.js assets using Yarn:
```
yarn dev
```

or using NPM:
```
npm run dev
```

10. Serve the application using Laravel's built-in server:

 ```
 php artisan serve
 ```

## Tech Stack

- Laravel: PHP framework for building web applications.
- Vue.js: JavaScript framework for building user interfaces.
- Laravel Sanctum: Authentication package for Laravel.
- Laravel Jetstream: Authentication scaffolding for Laravel.
- Inertia.js: JavaScript framework for building single-page applications.
- Tailwind CSS: Utility-first CSS framework.
- Vue Router: Routing library for Vue.js.
- Vuex: State management library for Vue.js.
- Axios: HTTP client for making API requests.
- Laravel Echo: Realtime communication library for Laravel.

## License

This project is open-sourced software licensed under the MIT license.