<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Client;
use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return DB::table('offers')
                ->where('archived','=',false)
                ->get();

    }

    public function filter(Request $request)
    {

        if($request->city==''){

            return DB::table('offers')
                ->where('archived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->get();

        }else{

            $city = strtolower($request->city);


            return DB::table('offers')
                ->where('archived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->where('city','=',$city)
                ->get();


        }

        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $client = Client::find($request->idUser);

        $city = strtolower($request->city);
        $addr  = $request->address.', '.$request->city;


        if($client->solde>=5){

               DB::table('clients')
                    ->where('id','=',$request->idUser)
                    ->decrement('solde',5);



                    if($client->validated){

                        if($request->student=='on'){

                            $offer = Offer::create([
                                'client_id' => $request->idUser,
                                'city' => $city,
                                'title' => $request->title,
                                'address' => $addr,
                                'nbrRooms' => $request->nbrRooms,
                                'maxP' => $request->maxColocs,
                                'price' => $request->price,
                                'archived' => false,
                                'student' => true
                            ]);

                        }else{

                            $offer = Offer::create([
                                'client_id' => $request->idUser,
                                'city' => $city,
                                'title' => $request->title,
                                'address' => $addr,
                                'nbrRooms' => $request->nbrRooms,
                                'maxP' => $request->maxColocs,
                                'price' => $request->price,
                                'archived' => false,
                                'student' => false
                            ]);

                        }

                        


                    }else{

                        if($request->student=='on'){

                            $offer = Offer::create([
                                'client_id' => $request->idUser,
                                'city' => $city,
                                'title' => $request->title,
                                'address' => $addr,
                                'nbrRooms' => $request->nbrRooms,
                                'maxP' => $request->maxColocs,
                                'price' => $request->price,
                                'student' => true
                            ]);

                        }else{

                            $offer = Offer::create([
                                'client_id' => $request->idUser,
                                'city' => $city,
                                'title' => $request->title,
                                'address' => $addr,
                                'nbrRooms' => $request->nbrRooms,
                                'maxP' => $request->maxColocs,
                                'price' => $request->price,
                                'student' => false
                            ]);

                        }

                        

                    }


                $pics = array();

                if($files = $request->pics){

                    foreach($files as $file){

                        $OfferPic = $file->store('public/OfferPics');

                        $picpath = explode('/',$OfferPic);

                        $lastpart = $picpath[count($picpath)-1];

                        array_push($pics,$lastpart);

                    }

                }


                foreach($pics as $pic){

                    Pic::create([
                        'offer_id' => $offer->id,
                        'path' => $pic,
                    ]);

                }

            echo 1;

        }else{


            echo 0;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        DB::table('offers')->where('id', '=', $request->idoffer)->delete();

    }

    public function deleteOffer(Request $request)
    {
        DB::table('offers')->where('id', '=', $request->idoffer)->delete();

    }

    public function homeOffers(){

        return DB::table('offers')
                ->join('pics','offers.id','=','pics.offer_id')
                ->where('offers.archived','=',false)
                ->select('offers.*','pics.path')
                ->limit(6)
                ->get();

    }

    public function myOffers(){

        $idUser = $_GET['idUser'];

        return DB::table('offers')
                ->where('client_id', '=', $idUser)
                ->get();


    }

    public function pic(Request $request){

        $pic = DB::table('pics')
                ->where('offer_id', '=', $request->idoffer)
                ->first();

        return $pic->path;


    }

    public function archive(Request $request){


        if(DB::table('offers')->where('id', '=', $request->idoffer)->first()->archived){

            DB::table('offers')->where('id', '=', $request->idoffer)->update(['archived' => false]);

        }else{

            DB::table('offers')->where('id', '=', $request->idoffer)->update(['archived' => true]);
        }

    }


    public function unarchive(Request $request){


        DB::table('offers')->where('id', '=', $request->idoffer)->update(['archived' => false]);

        
    }


    public function nbrInterests(Request $request){


        return DB::table('client_offer')->where('offer_id', '=', $request->idoffer)->count();


    }

    public function showinterest(Request $request){

        $client = Client::find($request->idclient);

        if($client->solde>=2){

                if(DB::table('client_offer')->where('offer_id', '=', $request->idoffer)
                ->where('client_id', '=', $request->idclient)->count()==0){

                    $client = Client::find($request->idclient);

                    $client->offers()->attach($request->idoffer);


                    DB::table('clients')
                        ->where('id','=',$request->idclient)
                        ->decrement('solde',2);



                    return 1;


                }

                
        }else{



                 return 0;



        }



    }


    public function offerDetails(Request $request){

        return DB::table('offers')->where('id', '=', $request->idoffer)->first();


    }

    public function pics(Request $request){


        return DB::table('pics')->where('offer_id', '=', $request->idoffer)->get();

    }

    public function minPrice(){

        return DB::table('offers')->min('price');

    }

    public function maxPrice(){

        return DB::table('offers')->max('price');

    }

    public function interests(Request $request){


        return DB::table('client_offer')
                ->join('clients','clients.id','=','client_offer.client_id')
                ->where('client_offer.offer_id','=',$request->idoffer)
                ->select('clients.*')
                ->get();

    }

    public function acceptInterest(Request $request){


        DB::table('client_offer')
            ->where('client_id', '=', $request->idclient)
            ->where('offer_id', '=', $request->idoffer)
            ->update(['state' => 1]);


    }

    public function rejectInterest(Request $request){


        DB::table('client_offer')
            ->where('client_id', '=', $request->idclient)
            ->where('offer_id', '=', $request->idoffer)
            ->update(['state' => -1]);


    }

    public function archivedOffers(){

        return DB::table('offers')
                ->where('archived','=',true)
                ->get();


    }


    

    public function stats(){

        $stats = array('nbrAnnonceurs'=>0,
        'nbrArchivedOffers'=>0,
        'nbrProfilsToValidate'=>0,
        'nbrStudentOffers'=>0
        );

        $stats['nbrAnnonceurs']=DB::table('offers')
                                ->distinct('client_id')
                                ->count();

        $stats['nbrArchivedOffers']=DB::table('offers')
                                ->where('archived','=',true)
                                ->count();

        $stats['nbrProfilsToValidate']=DB::table('validation_requests')
                                       ->count();

        $stats['nbrStudentOffers']=DB::table('offers')
                                ->where('student','=',true)
                                ->count();

        
        return $stats;



    }

    public function bestAnnonceurs(){

        return DB::table('offers')
                ->join('clients','clients.id','=','offers.client_id')
                ->select('clients.name', DB::raw('count(*) as nbrAnnonces'))
                ->where('offers.archived','=',false)
                ->groupBy('offers.client_id','clients.name')
                ->orderBy('nbrAnnonces','desc')
                ->limit(10)
                ->get();


    }

    

}
