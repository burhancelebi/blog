
Run "composer require burhancelebi/blog ".

- "Celebi\Commands\BlogServiceProvider::class," to config/app.php providers array.
- Add 'Blogs' => Celebi\Commands\Facades\Routes::class to config/app.php aliases array.
- Run " php artisan config:cache ".
- Run " php artisan blog:builder ".

- If you want to create a blade file , Run php artisan make:view viewname
