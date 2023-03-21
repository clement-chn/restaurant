<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\BookTable;
use Illuminate\Http\Request;

class BookTableController extends Controller
{
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'number' => ["required","numeric","min:1","not_in:0"]
        ]);

        $numberPeople = $_POST['number'];

        function closest($array, $number) {

            sort($array);
            foreach ($array as $a) {
                if ($a >= $number) return $a;
            }
            return end($array); // or return NULL;
        }
        
        $dbQuery = Table::select('id', 'nbSeats')->where('isReserved', '=', false)->get();

        $allSeats = array();
        foreach ($dbQuery as $seat) {
            $allSeats[] = $seat->nbSeats;
        }
        
        $totalSeats = array_sum($allSeats);
        $maxSeats = max($allSeats);

        dd($formFields);

        // Vérifications

        if ($numberPeople > $totalSeats) {
            return back()->withErrors(['number' => "Il n'y a pas assez de place. Réservez un autre jour !"]);
        }

        if ($numberPeople <= $maxSeats) {
            $closestSeat = closest($allSeats, $numberPeople);
            // Réserver
        }

        if ($numberPeople > $maxSeats) {

            while ($numberPeople < $maxSeats) {
                $dividedNumberPeople = $numberPeople - $maxSeats;

                $closestSeat = closest($allSeats, $dividedNumberPeople);
                // Réserver

                $numberPeople = $numberPeople - $dividedNumberPeople;

            }

        }
    

    }
}
