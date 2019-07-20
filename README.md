# lelpl

Laravel mail driver for EmaillLabs API. EmailLabs is available at [emaillabs.pl](https://emaillabs.pl).

## Installation

It's really simple, just use Composer:

```bash
composer require sigrun/lelpl
```

In case of any issues, you should add version constraint to package name:

```bash
composer require sigrun/lelpl@dev-master
```

### Laravel up to 5.4.\*

If you're using older Laravel versions (up to 5.4.\*), you should add package's service provider to your `config/app.php`, as following:

```php
$providers = [
    // Package Service Providers...
    \Sigrun\El\ElServiceProvider::class,
];
```

Laravel 5.5+ should auto-discover service provider from the package.

### Configuration

Publish config file from Artisan console:

```bash
php artisan vendor:publish
```

and choose assets from sigrun/lelpl.

Next, you should set necessary env variables: EL_SMTP_ACCOUNT, EL_APP_KEY, EL_APP_SECRET

### That's it!

Please note, that this package is as simple as it can be, lacking many of the EmailLabs API functionalities. It just sends simple mail using Laravel mailing logic.

Package is provided **as it is**, and therefore, we provide no guarantee that it would work as expected.

Feel free to suggest any changes whatsoever, I'll be more than glad to hear about them!