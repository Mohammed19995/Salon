<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 13/6/2020
 * Time: 05:23 م
 */

namespace App\Services\Firebase;


use Carbon\Carbon;

class Firestore extends FirebaseService
{

    public $firestore;
    public function __construct()
    {
        parent::__construct();
        $this->firestore = $this->factory->createFirestore()->database();
    }

    public function test() {
        return $this->firestore->collection('auctions')->document('1')
            ->collection('prices')->newDocument()->set(['id' => 5]);
//       return $this->firestore->collection('auctions')->document('1')->set(
//           [
//               'id' => 1,
//               'prices' => [
//                   ['id' => 1],
//                   ['id' => 2],
//               ]
//           ]
//       );
    }
    public function updateAuction($auction) {
        $this->firestore->collection('auctions')->document($auction->id)->set([
            'auction_id'    => $auction->id ,
            'price'         => $auction->current_price,
            'is_open'       => $auction->type == 1,
            'buyer_id'      => $auction->buyer_id,
            'owner_room_id' => $auction->owner_room_id,

        ]);
    }

    public function addAuctionPrice($auction_price , $auction_current_price) {
        $this->firestore->collection('auctions')->document($auction_price->auction_id)
            ->collection('prices')->document($auction_price->user_id)->set([
                'auction_id'  => $auction_price->auction_id ,
                'user_id'     => $auction_price->user_id ,
                'user_name'   => $auction_price->user_name ,
                'price'       => $auction_current_price,
                'timestamp'   => Carbon::now(),

            ]);
    }
}