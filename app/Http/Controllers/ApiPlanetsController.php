<?php

namespace App\Http\Controllers;

use App\Models\Planets;
use App\Models\Residents;
use Illuminate\Http\Request;

class ApiPlanetsController extends Controller
{
    /**
     * Api send top ten largest planet in database
     * @return string
     */
    public function topTenLargestPlanets()
    {
        return Planets::query()->orderBy('diameter', 'desc')->limit(10)->get()->toJson();
    }

    /**
     * api send unique species living in all planets
     * @return string
     */
    public function allSpeciesLivingInPlanets()
    {
        return Residents::query()->distinct('species_name')->get(['species_name'])->toJson();
    }
}
