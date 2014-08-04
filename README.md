 S3 Storage
--------------

### A concrete5 Add-On for storing files on Amazon Web Services S3

Installation
============

1. Copy or clone repo to the `/packages/` directory
2. Run `composer install` to download dependencies
3. Install via the concrete5 Dashboard
4. Add three constants to `/application/config/site.php`
```php
define('AWS_S3_STORAGE_KEY', 'Your AWS S3 Key');
define('AWS_S3_STORAGE_SECRET', 'Your AWS S3 Secret');
define('AWS_S3_STORAGE_BUCKET', 'Your AWS S3 Bucket');
```
5. Add the storage location Dashboard > System > Files > Storage
6. Set the new storage location as the default


Notes
=====

* This is for the concrete5.7 Beta and will not work on the current stable concrete5.6
* This is alpha software that may have breaking changes in the future
* There has been very little testing


### License

* MIT
