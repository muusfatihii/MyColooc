<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ValidationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
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
        
    }
    
    //recupérer tous les annonceurs 

    public function annonceurs(){

        return DB::table('clients')
                    ->where('isadmin', '=', 0)
                    ->get();
        
    }

     //archiver desarchiver un client

    public function archive(Request $request){

        $client = DB::table('clients')
                  ->where('id', '=', $request->idclient)
                  ->first();

        if($client->archived){

            //desarchivé si dejà archivé

            DB::table('clients')->where('id', '=', $request->idclient)->update(['archived' => false]);

        }else{

            //archiver le client

            DB::table('clients')->where('id', '=', $request->idclient)->update(['archived' => true]);


            //si il est archivé toutes les offres de ce client seront elles aussi archivées et ne seront plus accessibles


            DB::table('offers')->where('client_id', '=', $request->idclient)->update(['archived' => true]);

        }


    }


    //afficher les différent profils utilisateurs qui ont fait des demandes de validation de profil
    public function toValidate(){

        return DB::table('validation_requests')
            ->join('clients', 'clients.id', '=', 'validation_requests.client_id')
            ->select('clients.id','clients.name','clients.phonenumber','clients.created_at')
            ->get();

    }


    //valider le profil Client

    public function validateClient(Request $request){

        DB::table('clients')->where('id', '=', $request->idclient)->update(['validated' => true]);

        DB::table('validation_requests')->where('client_id', '=', $request->idclient)->delete();
        
    }

    //recuperer le nombre des offres d'un client
    public function clientOffers(Request $request){

        return DB::table('offers')->where('client_id','=',$request->idclient)->count();
    }

    //alimenter son E-wallet
    public function pocket(Request $request){

        DB::table('clients')->where('id', '=', $request->idclient)->increment('solde',$request->montant);
    }


    //recuperer les infos concernant un client donné

    public function clientInfos(Request $request){

        return DB::table('clients')
            ->where('id', '=', $request->idclient)
            ->first();

    }


    //le client peut a travers elle modifier son profile

    public function updateProfil(Request $request){

            DB::table('clients')
            ->where('id', '=', $request->idclient)
            ->update(['password' => Hash::make($request->newpsw),'name'=>$request->name,'phonenumber'=>$request->phonenumber]);

    }

    //faire une demande de validation à l'administrateur en payant tout dabord la somme requise

    public function profilToValidate(Request $request){

        $client = Client::find($request->idclient);

        $requested = DB::table('validation_requests')
                    ->where('client_id','=',$request->idclient)
                    ->count();


        if($requested==0){

            if($client->solde>=10){

                DB::table('clients')
                ->where('id','=',$request->idclient)
                ->decrement('solde',10);

                ValidationRequest::create([

                    'client_id' => $request->idclient,
        
                ]);

            echo 1;

            }else{

            echo -1;

            }

        }else{

            echo 0;


        }
        

    }


    //Supprimer un client définitivement


    public function delete(Request $request){


        // DB::table('clients')
        //     ->where('id', '=', $request->idclient)
        //     ->delete();

        echo 'OKOKOKO';

    }
    


}
