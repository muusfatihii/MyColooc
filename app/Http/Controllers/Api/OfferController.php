<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Client;
use App\Models\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     /*elles ne seront affichees que les offres non archivées ni par le client ni par l'admin et 
     sont classé selon le critère de validation
     */
    public function index()
    {

        return DB::table('offers')
                ->where('archived','=',false)
                ->where('userarchived','=',false)
                ->orderBy('validated','desc')
                ->skip(0)
                ->take(2)
                ->get();

    }

    public function filter(Request $request)
    {

        if($request->city==''){

            return DB::table('offers')
                ->where('archived','=',false)
                ->where('userarchived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->skip($request->skip)
                ->take(2)
                ->get();

        }else{

            $city = strtolower($request->city);


            return DB::table('offers')
                ->where('archived','=',false)
                ->where('userarchived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->where('city','=',$city)
                ->skip($request->skip)
                ->take(2)
                ->get();


        }

        

    }

    /**
     * Store a newly created resource in storage.
     */

     /*

     l'ajout d'une offre l'offre ne sera ajouté que après la verification de son client puis si le client
     a un profil validé l'offre sera elle aussi validée et non archivée sinon l'offre sera traitée et suivera
     les étapes pré-etablies à savoir sa necessité d'etre validée premièrement par l'admin pour la désrchivée 
     pourqu'elle sera accessible par les clients  

     */
    public function store(Request $request)
    {

        
        $client = Client::find($request->idUser);

        $city = strtolower($request->city);
        $addr  = $request->address;


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
                                'validated' => true,
                                'student' => true,
                                'latitude' => $request->latitude,
                                'longitude' => $request->longitude
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
                                'validated' => true,
                                'student' => false,
                                'latitude' => $request->latitude,
                                'longitude' => $request->longitude
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
                                'student' => true,
                                'latitude' => $request->latitude,
                                'longitude' => $request->longitude
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
                                'student' => false,
                                'latitude' => $request->latitude,
                                'longitude' => $request->longitude
                            ]);

                        }

                        

                    }


                    //ajout des photos de local


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
        echo $id;
    }

    /**
     * Remove the specified resource from storage.
     */

    //suppression d'un offre
    
    public function destroy(Request $request)
    {
        DB::table('offers')->where('id', '=', $request->idoffer)->delete();

    }

    public function deleteOffer(Request $request)
    {
        DB::table('offers')->where('id', '=', $request->idoffer)->delete();

    }

    //pour afficher les offres sur la page d'accueil

    public function homeOffers(){

        return DB::table('offers')
                ->join('pics','offers.id','=','pics.offer_id')
                ->where('offers.archived','=',false)
                ->where('offers.userarchived','=',false)
                ->select('offers.*','pics.path')
                ->orderBy('offers.validated','desc')
                ->limit(6)
                ->get();

    }

    //pour recupere les offres d'un utilisateur donné

    public function myOffers(){

        $idUser = $_GET['idUser'];

        return DB::table('offers')
                ->where('client_id', '=', $idUser)
                ->get();


    }



    //pour recupere la premiere photo d'un local

    public function pic(Request $request){

        $pic = DB::table('pics')
                ->where('offer_id', '=', $request->idoffer)
                ->first();

        return $pic->path;


    }

    public function userarchive(Request $request){


        if(DB::table('offers')->where('id', '=', $request->idoffer)->first()->userarchived){

            DB::table('offers')->where('id', '=', $request->idoffer)->update(['userarchived' => false]);

        }else{

            DB::table('offers')->where('id', '=', $request->idoffer)->update(['userarchived' => true]);
        }

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

        $this->notify('fatmuus@gmail.com','test','je teste');




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
                ->select('clients.*','client_offer.state')
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


    private function notify($sentTo,$subject,$message){

            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'musfatihii@gmail.com';                     //SMTP username
                $mail->Password   = 'secret';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('musfatihii@gmail.com', 'MyColoc');
                $mail->addAddress($sentTo);     //Add a recipient
                

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->send();
                echo 'Message has been sent';

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

    }


    function offerinfos(){
        
        $idOffer = $_GET['idOffer'];

        return DB::table('offers')
                ->where('id', '=', $idOffer)
                ->first();

        

    }

    function updateoffer(Request $request){

        $city = strtolower($request->city);


        if($request->student=='on'){

            DB::table('offers')
            ->where('id', '=', $request->idOffer)
            ->update([
                'city' => $city,
                'title' => $request->title,
                'address' => $request->address,
                'nbrRooms' => $request->nbrRooms,
                'maxP' => $request->maxColocs,
                'price' => $request->price,
                'student' => true
            ]);

        }else{

            DB::table('offers')
            ->where('id', '=', $request->idOffer)
            ->update([
                'city' => $city,
                'title' => $request->title,
                'address' => $request->address,
                'nbrRooms' => $request->nbrRooms,
                'maxP' => $request->maxColocs,
                'price' => $request->price,
                'student' => false
            ]);

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
                'offer_id' => $request->idOffer,
                'path' => $pic,
            ]);

        }

        

    }


    public function deletePic(Request $request){

        DB::table('pics')->where('id', '=', $request->idpic)->delete();


    }


    public function ownerinfos(Request $request){
                return DB::table('offers')
                        ->join('clients','clients.id','=','offers.client_id')
                        ->where('offers.id','=',$request->idoffer)
                        ->select('clients.name','clients.username','clients.phonenumber')
                        ->first();

    }



    public function nbrOffers(Request $request){

        if($request->city==''){

            return DB::table('offers')
                ->where('archived','=',false)
                ->where('userarchived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->count();

        }else{

            $city = strtolower($request->city);


            return DB::table('offers')
                ->where('archived','=',false)
                ->where('userarchived','=',false)
                ->where('maxP','>=',$request->minColocs)
                ->where('maxP','<=',$request->maxColocs)
                ->where('nbrRooms','>=',$request->minRooms)
                ->where('nbrRooms','<=',$request->maxRooms)
                ->where('price','>=',$request->minPrice)
                ->where('price','<=',$request->maxPrice)
                ->where('city','=',$city)
                ->count();


        }

    }
                                

    

}
