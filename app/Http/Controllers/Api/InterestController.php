<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    //recuperer mes soumissions

    public function myInterests(){

        $idclient = $_GET['idUser'];

        return DB::table('client_offer')
                ->join('offers','client_offer.offer_id','=','offers.id')
                ->where('client_offer.client_id','=',$idclient)
                ->select('offers.id','offers.title','offers.created_at','client_offer.state')
                ->get();


    }

    //supprimer une de mes soumissions

    public function deleteInterest(Request $request){

        DB::table('client_offer')
        ->where('offer_id', '=', $request->idoffer)
        ->where('client_id', '=', $request->idclient)
        ->delete();

    }

    //recuperer les information de contact des personnes retenue pour la meme offre

    public function showinfos(Request $request){

        return DB::table('client_offer')
                ->join('clients','clients.id','=','client_offer.client_id')
                ->where('state', '=', 1)
                ->where('offer_id', '=', $request->idoffer)
                ->where('client_id', '<>', $request->idclient)
                ->select('clients.username','clients.name','clients.phonenumber')
                ->get();

    }

}
