<?php
namespace Concrete\Package\AwsS3Storage;

use Package;
use Concrete\Core\File\StorageLocation\Type\Type;

class Controller extends Package
{
    
    protected $pkgHandle = 'aws_s3_storage';
    protected $appVersionRequired = '5.7';
    protected $pkgVersion = '0.1.0';

    public function on_start()
    {
       require dirname(__FILE__) . '/vendor/autoload.php'; 
    }

    public function getPackageName()
    {
        return t('AWS S3 Storage');
    }

    public function getPackageDescription()
    {
        return t('Store you files in the cloud with Amazon Web Services S3');
    }

    public function install()
    {
        Type::add('aws_s3', 'AWS S3', parent::install());
    }

}
