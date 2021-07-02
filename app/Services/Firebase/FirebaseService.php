<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:15 م
 */

namespace App\Services\Firebase;

use Kreait\Firebase\Factory;


class FirebaseService
{
    public $factory;
    public $database;
    public $messaging;
    public $notification;

    public function __construct()
    {
        $this->factory = (new Factory)
            ->withServiceAccount(storage_path().'/firebase/mazad-mw-firebase-adminsdk-pmf9h-2ff6cf0500.json');
          //  ->withDatabaseUri(env('FIRBASE_DATABASE_URL'));

        $this->database = $this->factory->createDatabase();
        $this->messaging  = $this->factory->createMessaging();

    }

}