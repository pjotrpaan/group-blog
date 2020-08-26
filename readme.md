# Group Blog application

## Requirements
* PHP v5.6.*
* Laravel v5.4.*
* Apache server instance
* MySQL database

## Short user story:
This is a blog application project built with [Laravel Framework](https://laravel.com/). 
Not logged in users can register/log in/initiate password change and add comments on posts but cannot delete comments and are not able to create/edit/delete posts. To log in user has to register. After completing the registration process users can create/edit/delete posts and delete comments they created while they were logged in.

The project has simple non-RBAC authentication system set up -> [Laravel authentication](https://laravel.com/docs/5.4/authentication). To add RBAC the user model and migration needs updating among other things.

The application has localization implemented with user interface ready to serve english (EN) and estonian (ET) speaking users. More information on adding new languages [Laravel localization](https://github.com/mcamara/laravel-localization). 


## Getting started
* Make sure you have Apache and MySQL running in the background. Database needs a table set in .env file to be saved in the project root, so it knows where to store migratons and users/posts data. Please see .env.example file in root folder to get going with database and app config setups.
* Clone project and install project using 'composer install' command in project root folder.
* To run migrations simply use 'php artisan migrate' in bash while in the app root folder. If something went wrong you can do a rollback using command 'php artisan migrate:rollback'.
* Project uses Sass and webpack to compile css styles. You need to run 'npm install' in app root folder to enable Sass and Bootstrap.
* After npm install you can either:
  * run 'npm run dev' to re-compile assets after modifying them 
  * use 'npm run watch' to have the app register changes to Sass and reload assets accordingly.
* To use images originally added to the project, please copy folders 'cover_images' and 'lang_images' from 'project-name/public/images' to 'project-name/storage/app/public'.
* To start the application after installing type 'php artisan serve' in bash. Have fun blogging and/or modify the project to your specific needs.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
