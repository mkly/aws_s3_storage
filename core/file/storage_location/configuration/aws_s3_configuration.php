<?php
namespace Concrete\Package\AwsS3Storage\Core\File\StorageLocation\Configuration;

use \Aws\S3\S3Client;
use \League\Flysystem\Adapter\AwsS3;
use \Concrete\Core\File\StorageLocation\Configuration\ConfigurationInterface;
use \Concrete\Core\File\StorageLocation\Configuration\Configuration;
use \Concrete\Core\Error\Error;

class AwsS3Configuration extends Configuration implements ConfigurationInterface
{

    public $path;

    public function hasPublicURL()
    {
        return true;
    }

    public function hasRelativePath()
    {
        return false;
    }

    public function loadFromRequest(\Concrete\Core\Http\Request $req)
    {
        $data = $req->get('fslType');
        $this->path = $data['path'];
    }

    public function validateRequest(\Concrete\Core\Http\Request $req)
    {
        $e = new Error();
        return $e;
    }

    public function getAdapter()
    {
        return new AwsS3($this->getClient(), AWS_S3_STORAGE_BUCKET);
    }

    protected function getClient()
    {
        $client = S3Client::factory(array(
            'key' => AWS_S3_STORAGE_KEY,
            'secret' => AWS_S3_STORAGE_SECRET
        ));
        return $client;
    }

    public function __sleep()
    {
        return array('aws_s3');
    }

    public function getPublicURLToFile($file)
    {
        return $this->getClient()->getObjectUrl(AWS_S3_STORAGE_BUCKET, $file);
    }

    public function getRelativePathToFile($file)
    {
        return $file;
    }
}
