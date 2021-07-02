<?php

namespace App\Http\Controllers;

use App\Events\OpenAuctionEvent;
use App\Facades\Firebase\FirebaseFirestoreFacade;
use App\Facades\Firebase\FirebaseNotificationFacade;
use App\Http\Requests\Api\AuctionOrder\RejectOrderAuctionRequest;
use App\Http\Resources\Cart\CartProductResource;
use App\Jobs\TestJob;
use App\Models\Auction;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Product;
use App\Models\User;
use App\Notifications\RejectAuctionNotification;
use App\ServiceInterfaces\Export\ExportPdf;
use App\Traits\Export\ExportTrait;
use Carbon\Carbon;
use Google\Auth\OAuth2;
use Google\Cloud\Scheduler\V1\OAuthToken;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class TestController extends Controller
{
    use ExportTrait;

    public function index()
    {
        return Country::first();
    }
}
