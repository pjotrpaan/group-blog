## About Group Blog application

### Short user story:
This is a blog application project built on [Laravel Framework](https://laravel.com/). 
Users can register, log in, initiate password change and add comments. After completing the registration process users can create/edit/delete posts and delete comments they created while they were logged in.

The project has simple non-RBAC authentication system that ships out-of-the-box with Laravel -> [link here](https://laravel.com/docs/5.4/authentication). 

The application also has localization implemented with user interface ready to serve english and estonian speaking users. Adding new languages is fairly straight-forward. More information can be found at [Laravel localization](https://github.com/mcamara/laravel-localization).

## Requirements
PHP 5.6.*
Laravel 5.4
Apache server instance
MySQL database

Please see .env.example file in root folder to get going with database and app config setups.

## Getiing started
- Make sure you have Apache and MySQL running in the background. Database needs a table set in .env file, so it know where to store migratons.
- Install project using 'composer install' command in project root folder.
- To run migrations simply use 'php artisan migrate' in bash while in the app root folder. If something went wrong you can do a rollback using command 'php artisan migrate:rollback'.
- Project uses Sass and webpack to compile css styles. You need to run 'npm install' in app root folder to enable Sass and Bootstrap.
- After npm install you can either 1) run 'npm run dev' to re-compile assets after modifying them or 2) use 'npm run watch' to have the app register changes to Sass and reload assets accordingly.
- To start the application after installing type 'php artisan serve' in bash. (If you have Valet installed and running this line can be ignored)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
