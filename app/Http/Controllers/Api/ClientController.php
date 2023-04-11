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

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Client::class],
            'password' => ['required'],
        ]);
        
        $client = Client::create([

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),

                ]);

        echo $client->id;

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
        session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function annonceurs(){

        return DB::table('clients')
                    ->where('isadmin', '=', 0)
                    ->get();
        
    }

    public function archive(Request $request){

        $client = DB::table('clients')
                  ->where('id', '=', $request->idclient)
                  ->first();

        if($client->archived){

            DB::table('clients')->where('id', '=', $request->idclient)->update(['archived' => false]);

        }else{

            DB::table('clients')->where('id', '=', $request->idclient)->update(['archived' => true]);


            DB::table('offers')->where('client_id', '=', $request->idclient)->update(['archived' => true]);

           

        }


    }


    public function toValidate(){


        return DB::table('validation_requests')
            ->join('clients', 'clients.id', '=', 'validation_requests.client_id')
            ->select('clients.id','clients.name','clients.created_at')
            ->get();

    }

    public function validateClient(Request $request){

        DB::table('clients')->where('id', '=', $request->idclient)->update(['validated' => true]);

        DB::table('validation_requests')->where('client_id', '=', $request->idclient)->delete();
        
    }


    public function clientOffers(Request $request){

        return DB::table('offers')->where('client_id','=',$request->idclient)->count();
    }


    public function pocket(Request $request){




        DB::table('clients')->where('id', '=', $request->idclient)->increment('solde',$request->montant);



    }

    public function clientInfos(Request $request){

        return DB::table('clients')
            ->where('id', '=', $request->idclient)
            ->first();


    }

    public function updateProfil(Request $request){

            DB::table('clients')
            ->where('id', '=', $request->idclient)
            ->update(['password' => Hash::make($request->newpsw)]);

    }

    public function profilToValidate(Request $request){

        $client = Client::find($request->idclient);

        if($client->solde>=10){

                DB::table('clients')
                ->where('id','=',$request->idclient)
                ->decrement('solde',10);

                ValidationRequest::create([

                    'client_id' => $request->idclient,
        
                ]);

            return 1;

        }else{

            return 0;

        }

    }


    public function delete(Request $request){


        // DB::table('clients')
        //     ->where('id', '=', $request->idclient)
        //     ->delete();

        echo 'OKOKOKO';

    }
    


}
