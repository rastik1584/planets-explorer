<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Residents extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'residents';
    protected $fillable = ['planet_id', 'species_name', 'name', 'url'];

}
