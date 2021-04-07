# WP Admin Custom Filter v1.0

> Simple WordPress custom filter for admin page.

## Requirements

* PHP >=7.2
* [Composer](https://getcomposer.org/)
* [WordPress](https://wordpress.org) >=5.4

## Installation

#### Install with composer

Run the following in your terminal to install with [Composer](https://getcomposer.org/).

```
$ composer require oberonlai/wp-admin-custom-filter
```

WP Admin Custom Filter [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading and can be used with the Composer's autoloader. Below is a basic example of getting started, though your setup may be different depending on how you are using Composer.

```php
require __DIR__ . '/vendor/autoload.php';

use ODS\CustomFilter;

$options = array( ... );

$books = new CustomFilter( $options );

```

See Composer's [basic usage](https://getcomposer.org/doc/01-basic-usage.md#autoloading) guide for details on working with Composer and autoloading.

## Basic Usage

Below is a basic example of setting up a simple custom filter with a post meta field.

```php
// Require the Composer autoloader.
require __DIR__ . '/vendor/autoload.php';

// Import PostTypes.
use ODS\CustomFilter;

$option = array(
    'name'     => 'send_status',     // form select name
    'key'      => 'meta_key',        // post meta field name
    'compare'  => '=',               // the compare rule
    'posttype' => 'cptname',             // which post type support with
    'option'   => array(             // dropdown menu
        'all'       =>  __( 'ALL', ''),
        'option1'   =>  __( 'Option1', ''),
        'option2'   =>  __( 'Option2', ''),
    )
);

new CustomFilter( $option );

```

Then you can see the custom dropdown filter in your admin edit page.

<img src="https://cleanshot-cloud-fra.s3.eu-central-1.amazonaws.com/media/1093/b2uZWj4LJ30G3xheddW0CgA7tOOqOGCpaw1eOFhg.jpeg?X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEOr%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaDGV1LWNlbnRyYWwtMSJIMEYCIQDP%2ByowaPkE43tmEkVDDU1Nm7MCqsOT8hkJSr1vj7WXkQIhAKjYC2KgTh09gwDf78q9SKWR%2B0EhyWBqfkGLY28R3WhZKtkBCEMQABoMOTE5NTE0NDkxNjc0IgyxuMEbwQN1b%2BcwL3IqtgFbSV5SIfLSMoVgf2OTd58VonlgCrqq2uCoWmzmcb1bIZwLp8U5sbunSfXH1NIZJRfgnSiz50iDZbOTkkredxiS0Emx%2FtxyXIBri%2BaaKKCsjweRkgTXx%2BC82NTxUfqulYMJKIkGiOXMNSeGYVsv3hbhdGTRMwscS3JH%2BKcMAwqKCZRnM7uG3Vhec4R5HoJAEMIHufa1wfvYZd8I2FfOXYHGpZGdkB0M46sse25HvUdZRgEU7ibvJzCE%2BbWDBjrfAX5HdjeiAHFtTYa5ksBmyeM66JrVUMpf3HihwBgNSVNE%2FJnzm%2B5hAHW8QVnUV50Q8dvBb3pFnE7sJnX1fPS%2BdKhQrwI9KL8e8QOFX71fPlrUGn1DnUAJdute%2FUNq97nw7jHllxM9ujH0aBZwZmUf5qrRZIvjg9zN%2Bvi25bp%2BevRQS9ETvint5CBqvDvlq1zKGFHocm4rAeX6A%2BjAyfMv%2Bka67s8Xj0md8eyMgw3V3MDT%2FleQHg1RI7Mho7uzl%2B350%2Fqy7E6boSYk0jM9%2BEk%2BKFMZgQJ78C3C5FvTsrZJrFM%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=ASIA5MF2VVMNM3EECIQU%2F20210407%2Feu-central-1%2Fs3%2Faws4_request&X-Amz-Date=20210407T105527Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Signature=ab8ea8f60c08d48bcbb41bcc8863bff7dbea982d9b80eb50f5bfcaaf091f41cc" alt="" />
