# Laravel ID Provinces

[![Total Downloads](https://poser.pugx.org/ferdirn/laravel-id-provinces/downloads.svg)](https://packagist.org/packages/ferdirn/laravel-id-provinces)
[![Latest Stable Version](https://poser.pugx.org/ferdirn/laravel-id-provinces/v/stable.svg)](https://packagist.org/packages/ferdirn/laravel-id-provinces)
[![Latest Unstable Version](https://poser.pugx.org/ferdirn/laravel-id-provinces/v/unstable.svg)](https://packagist.org/packages/ferdirn/laravel-id-provinces)

Laravel ID Provinces is a package for Laravel to supply all provinces data, mainly in Indonesia, to table provinces including province name, country code, capital, and area in square km.

If you need Laravel package to provide all countries data for you, then you may want to install [ferdirn/laravel-id-countries](https://github.com/ferdirn/laravel-id-countries) package.


## Installation

Add `ferdirn/laravel-id-provinces` to `composer.json`.

    "ferdirn/laravel-id-provinces": "dev-master"

or in console type command

    composer require ferdirn/laravel-id-provinces:dev-master

Run `composer update` to pull down the latest version of laravel packages.

Edit `app/config/app.php` file and add to `providers`

    'providers' => array(
        'Ferdirn\Provinces\ProvincesServiceProvider',
    )

also add to 'aliases'

    'aliases' => array(
        'Provinces' => 'Ferdirn\Provinces\ProvincesFacade',
    )


## Model

If you want to edit the configuration then publish the config. This is an optional step and unrecommended to do, it will show the table name and you do not need to alter it if you do not know what you are doing. The default table name is `provinces`, if it suits you, leave it. But if you know what you are doing, you can run the following command

    $ php artisan config:publish ferdirn/laravel-id-provinces


Then you need to generate the migration file. Run the following command:

    $ php artisan provinces:migration

This process will generate `<timestamp>_create_provinces_table.php` migration file and a `ProvincesSeeder.php` seed file.

Insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the provinces
    $this->call('ProvincesSeeder');
    $this->command->info('Seeded the provinces!');

Finally, you can run the artisan migrate command with seed option to include the seed data:

    $ php artisan migrate --seed

Now you have a table 'provinces' with all provinces data inside the table. Congratulation!