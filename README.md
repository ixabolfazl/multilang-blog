## multilang-blog-laravel

A Multilang blog with Laravel

### How to run it

- Create a database.
- Download **[composer](https://getcomposer.org/download/)**
- Pull multilang-blog-laravel Chatroom project.
- Rename `.env.example` file to `.env` inside project root and fill the database information. (windows wont let you do
  it, so you have to open your console cd project root directory and run `mv .env.example .env` )
- Set database in `.env`
- Open the console and cd project root directory
- Run `composer install` or `php composer.phar install`
- Run `php artisan key:generate`
- Run `php artisan migrate`
- Run `php artisan db:seed`
- Run `npm i & npm run prod`
- Run `php artisan websockets:serv`
- Run `php artisan serve`

##### You can now access project at localhost:8000 :)
