
- `composer install`
- Copy `.env.example` to `.env`
- Set your `HONEYBADGER_API_KEY` in `.env`.
- Start the app with `php artisan serve` or `./vendor/bin/sail up`. 
- Visit the home page. You should see an exception thrown, and breadcrumbs of different types. You can check out the code for the home page in `routes/web.php`.