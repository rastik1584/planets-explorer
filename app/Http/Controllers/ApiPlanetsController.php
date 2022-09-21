<?php

namespace App\Http\Controllers;

use App\Models\Planets;
use Illuminate\Http\Request;

class ApiPlanetsController extends Controller
{
    public function topTenLargestPlanets()
    {
        return Planets::query()->orderBy('diameter', 'desc')->limit(10)->get()->toJson();
    }

    public function distributionOfTerrain()
    {

    }
}
