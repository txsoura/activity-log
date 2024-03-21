# Activity Log

This project, is a simple [Laravel](https://laravel.com) library, to save eloquent model logs.

## Installation

You can install the package via composer:

```bash
composer require txsoura/activity-log
```

Next, you should publish the Activity Log provider using Artisan command. The `activitlog` configuration file will be placed in your application's `config` directory:

```bash
php artisan vendor:publish --provider="Txsoura\ActivityLog\Providers\ActivityLogServiceProvider"
```

Finally, you should run your database migrations. Activity Log will create one database table called `activity_logs`:

```bash
php artisan migrate
```


## Documentation

See the [WIKI](https://github.com/txsoura/activity-log/wiki) for documentation.

## License

This project is under MIT license. Go to [LICENSE](https://opensource.org/licenses/MIT) for more details.