<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'city',
        'price',
        'title',
        'address',
        'maxP',
        'nbrRooms',
        'student',
        'longitude',
        'latitude'
    ];

    protected $hidden = [

    ];


    public function pics(){

        return $this->hasMany(Pic::class);
    
    }

    public function creator(){

        return $this->belongsTo(Client::class);

    }

    public function candidats(){

        return $this->belongsToMany(Client::class,'client_offer');

    }


}
