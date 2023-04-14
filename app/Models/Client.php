<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'phonenumber',
        'password',
        'solde'
    ];

    protected $hidden = [
        'password'

    ];

    public function myOffers(){

        return $this->hasMany(Offer::class);
    
    }

    public function offers(){

        return $this->belongsToMany(Offer::class,'client_offer');
    
    }

    
}
