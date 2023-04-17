<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
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
            'phonenumber' => ['required'],
            'password' => ['required'],
        ]);

        // 'regex:/^((71)|(73)|(77))[0-9]{7}/'
        
        $client = Client::create([

                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phonenumber' => $request->phonenumber

                ]);
       
        User::create([

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
       

    }

    public function logout(){

        

            session::flush();
            Auth::logout();


    }

    public function login(Request $request){

        //validation des champs renseignés

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);


        //verification la présence de mail renseigné dans la base de données

        
        $client = User::where('email','=',$request->email)->first();


        if($client){

            //email trouvé


            //verification le mot de passe renseigné
            
            if(Hash::check($request->password,$client->password)){

                //mot de passe correct

                // Auth::loginUsingId($client->id, TRUE);

                // Auth::login($client);

                $authToken = $client->createToken('auth-token')->plainTextToken;

                return $client;

            }else{

                //faux mot de passe 
                
                return 0;
            }

        }else{

            //email non trouvé

            return 0;

        }
    

    }

}

