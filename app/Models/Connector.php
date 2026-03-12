<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Station;

class Connector extends Model
{
    /** @use HasFactory<\Database\Factories\ConnectorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'station_id'    
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
