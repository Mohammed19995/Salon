<?php

namespace App\Providers;

use App\Services\FileService;
use App\Services\Firebase\FirebaseNotification;
use App\Services\Firebase\FirebaseRealTimeDatabase;
use App\Services\Firebase\FirebaseService;
use App\Services\Firebase\FirebaseStorage;
use App\Services\Firebase\Firestore;
use App\Services\Payment\TapPaymentGetway;
use App\Services\Tree\SWWWTreeTraversal;
use App\Services\Tree\TreeFunction;
use Illuminate\Support\ServiceProvider;

class FacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // firebase
        $this->app->bind('firebase-realtime-Service' ,FirebaseRealTimeDatabase::class);
        $this->app->bind('firebase-notification-Service' ,FirebaseNotification::class);
        $this->app->bind('firebase-storage-Service' ,FirebaseStorage::class);
        $this->app->bind('firebase-firestore-Service' ,Firestore::class);

        // tree
        $this->app->bind('tree-Service' ,TreeFunction::class);

        // file facade
        $this->app->bind('file-Service' ,function (){
            return new FileService();
        });

    }
}
