<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'path'
    ];

    public function offer(){

        return $this->belongsTo(Offer::class);

    }

}
