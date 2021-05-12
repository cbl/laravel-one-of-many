# Laravel one-of-many relation

This repository contains examples for [laravel/framework#37252](https://github.com/laravel/framework/pull/37252). The [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) may be used to inspect queries and eager loaded models.

## Setup

1. Preparing

```shell
composer install
cp .env.example .env
php artisan key:generate
```

2. Migrating & Seeding

```shell
php artisan migrate:fresh --seed
```

3. Checkout `subselect` or `join` approach

```shell
composer setup-subselect
composer setup-join
```
