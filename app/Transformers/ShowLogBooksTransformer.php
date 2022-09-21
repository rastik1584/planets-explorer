<?php

namespace App\Transformers;

use App\Models\LogBook;
use Illuminate\Support\Facades\Crypt;
use League\Fractal\TransformerAbstract;

class ShowLogBooksTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(LogBook $book)
    {
        return [
            'planet' => $book->planet,
            'mood' => $book->mood,
            'weather' => $book->wheather,
            'gps_lat' => $book->gps_lat,
            'gps_lng' => $book->gps_lng,
            'note' => Crypt::decryptString($book->note),
        ];
    }
}
