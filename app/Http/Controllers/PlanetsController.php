<?php

namespace App\Http\Controllers;

use App\DataTables\PlanetsDataTable;
use App\Models\Planets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlanetsDataTable $dataTable)
    {
        return $dataTable->render('planets.index', compact('dataTable'));
    }

    /*
     * Sync planets and residents call with artisan command
     */
    public static function planetsSync()
    {

        $get_planets = Http::get('https://swapi.py4e.com/api/planets');
        if($get_planets->ok()) {
            $planets = $get_planets->json();
            $count = $planets['count'];
            $results = count($planets['results']);

            $total_pages = (int)ceil($count / $results);

            for($i=1; $i<=$total_pages; $i++) {
                $get_planets = Http::get('https://swapi.py4e.com/api/planets?page='.$i);
                if($get_planets->ok()) {
                    $planets = $get_planets->json();
                    (new self)->createPlanetAndResidents($planets);
                }
            }
        }
    }

    /**
     * Create planet and residents
     * @param $planets
     * @return mixed
     */
    private function createPlanetAndResidents($planets) : Planets
    {
        foreach($planets['results'] as $result) {
            $planet = Planets::firstOrCreate([
                'name' => $result['name'],
                'rotation_period' => $result['rotation_period'],
                'orbital_period' => $result['orbital_period'],
                'diameter' => $result['diameter'] == 'unknown' ? -1 : $result['diameter'],
                'climate' => $result['climate'],
                'gravity' => $result['gravity'],
                'terrain' => $result['terrain'],
                'surface_water' => $result['surface_water'],
                'population' => $result['population'],
            ]);
            foreach($result['residents'] as $resident) {
                $name_and_species = $this->getResidentNameAndSpeciesName($resident);
                $planet->residents()->firstOrCreate([
                    'url' => $resident,
                    'name' => $name_and_species['name'],
                    'species_name' => $name_and_species['species'],
                ]);
            }
        }
        return $planet;
    }

    /**
     * get resident name and spieces name
     * @param $url
     * @return array
     */
    private function getResidentNameAndSpeciesName($url) : array
    {
        $resident = Http::get($url)->json();
        $return['name'] = $resident['name'];
        if(count($resident['species']) > 1) {
            dd($resident);
        }

        foreach($resident['species'] as $spiece) {
            $specie_name = Http::get($spiece)->json();
            $return['species'] = $specie_name['name'];
        }

        if(empty($resident['species'])) $return['species'] = 'unknown';

        return $return;
    }
}
