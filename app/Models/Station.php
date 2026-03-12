<?php

namespace App\Models;
use App\Models\Connector;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /** @use HasFactory<\Database\Factories\StationFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'power_kw',
        'status'
    ];

    public function connector(){
        return $this->hasMany(Connector::class);
    }

    public function reservation(){
        return $this->hasMany(Reservation::class);
    }


}
