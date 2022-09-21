<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogBookRequest;
use App\Models\LogBook;
use App\Models\Planets;
use App\Transformers\ShowLogBooksTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ApiLogBookController extends Controller
{
    /**
     * Store logBook
     * @param LogBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(LogBookRequest $request)
    {
        LogBook::create([
            'planet_id' => $request->planet_id,
            'mood' => $request->mood,
            'weather' => $request->weather,
            'gps_lat' => $request->gps_lat,
            'gps_lng' => $request->gps_lng,
            'note' => Crypt::encryptString($request->note),
        ]);
        return response()->json('success');
    }


    /**
     * Show all logbooks
     * @return \Spatie\Fractal\Fractal
     */
    public function show()
    {
        return fractal(LogBook::all(), new ShowLogBooksTransformer());
    }
}
