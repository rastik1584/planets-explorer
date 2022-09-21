<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Planets extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'planets';
    protected $fillable = ['name', 'rotation_period', 'orbital_period', 'diameter', 'climate', 'gravity', 'terrain', 'surface_water', 'population'];


    public function residents()
    {
        return $this->hasMany(Residents::class, 'planet_id');
    }
}
