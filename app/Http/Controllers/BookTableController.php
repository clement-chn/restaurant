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
            'number' => ["required","numeric","min:1","not_in:0"],
            'allergies' => ["required"],
            'date' => ["required"],
            'time-clicked' => ["required"]
        ]);

        $numberPeople = $_POST['number'];

        function closest($array, $number) {

            sort($array);
            foreach ($array as $a) {
                if ($a >= $number) return $a;
            }
            return end($array); // or return NULL;
        }

        function book($closestSeat, $idSeat, $formFields, $numberPeople) {
            $booktable = new BookTable;


            
            $booktable->name = $formFields['name'];
            $booktable->nbPeople = $numberPeople;
            $booktable->allergies = $formFields['allergies'];
            $booktable->date = $formFields['date'];
            $booktable->time = $formFields['time-clicked'];
            $booktable->tableId = $idSeat;
            // $booktable->userId = 10;
            $booktable->save();

        }

        $dbQueryTwo = Booktable::select('date', 'tableId')->get()->toArray();

        $allReservation = [];

        foreach ($dbQueryTwo as $item) {
            $allReservation[$item['date']][] = $item['tableId'];
        }

        $dbQuery = Table::select('id', 'nbSeats')->get();

        // $dbQueryThree = Booktable::select('name')->where('date', '=', $formFields['date'])->get()->toArray();

        // if (array_search($formFields['name'], $dbQueryThree)) {
        //     dd('yes');
        // }
        
        // dd($dbQueryThree);

        $allSeats = array();

        foreach ($dbQuery as $seat) {
            $allSeats[$seat->id] = $seat->nbSeats;
        }

        // il faut la date ici aussi
        if ($formFields['date'] == array_key_exists($formFields['date'], $allReservation)) {
            $seats = $allReservation[$formFields['date']];
        }

        foreach ($seats as $seat) {
            $key = array_key_exists($seat, $allSeats);
            if ($key !== false) {
                unset($allSeats[$seat]);
            }
        }
        
        $totalSeats = array_sum($allSeats);
        $maxSeats = max($allSeats);

        // Vérifications

        if ($numberPeople > $maxSeats) {

            while ($numberPeople !== $maxSeats || $numberPeople < $maxSeats) {

                $dividedNumberPeople = $numberPeople - $maxSeats;
                while ($dividedNumberPeople > $maxSeats) {
                    $dividedNumberPeople = $dividedNumberPeople - $maxSeats;
                }

                $closestSeat = closest($allSeats, $dividedNumberPeople);

                $idSeat = array_search($closestSeat, $allSeats);

                $numberPeople = $numberPeople - $dividedNumberPeople;

                $key = array_key_exists($idSeat, $allSeats);
                if ($key !== false) {
                    unset($allSeats[$idSeat]);
                }

                book($closestSeat, $idSeat, $formFields, $dividedNumberPeople);

            }

        }

        if ($numberPeople > $totalSeats) {
            return back()->withErrors(['number' => "Il n'y a pas assez de place. Réservez un autre jour !"]);
        }

        if ($numberPeople <= $maxSeats) {
            $closestSeat = closest($allSeats, $numberPeople);
            $idSeat = array_search($closestSeat, $allSeats);

            book($closestSeat, $idSeat, $formFields, $numberPeople);
            return redirect('/');
        }
    }
}
