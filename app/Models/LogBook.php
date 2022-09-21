<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogBook extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['planet_id', 'mood', 'weather', 'gps_lat', 'gps_lng', 'note'];

    public function planet(): HasOne
    {
        return $this->hasOne(Planets::class, 'id');
    }
}
