<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:23 م
 */

namespace App\Services\Firebase;

class FirebaseStorage extends FirebaseService
{

    public $storage;

    public function __construct()
    {
        parent::__construct();
        $this->storage = $this->factory->createStorage();
    }

    public function upload()
    {
        $source = public_path('uploads/galleries/2020-09-29/wkWfDjpq7CRi2dMSerml1601399387zziAsm2NlZN4t1vxTYwK.jpg');
        $file =  file_get_contents($source,'rb');
        return $this->storage->getBucket()
            ->upload($file, [
                'name' => 'test/test3.jpg',
                'predefinedAcl' => 'publicRead'
            ]);
    }

}