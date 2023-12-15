<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Setup

<p align="center"><strong>Setup Application</strong></p>
<hr/>

```bash
composer install
```

or

```bash
composer update
```

### Migrate your database with Seeder

```bash
php artisan app:run-base (Not Complete)
```

<p align="center"><b>or use geeky methods if your laptop is butut</b></p>

```bash
php artisan migrate --path=database/migrations/base --seed
```

or

```bash
php artisan migrate:fresh --path=database/migrations/base --seed
```

### After your migrate base database, migrate this ⬇

```bash
php artisan migrate
```

and

```bash
php artisan migrate --path=database/migrations/project

```
