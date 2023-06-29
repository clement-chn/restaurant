<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        $todayFullDate = date('Y-m-d');

        $reservations = Booktable::where('date', $todayFullDate)->get()->toArray();
        
        $names = [];
        $nbPeoples = [];
        $tableIds = [];
        $times = [];
        $allergies = [];

        foreach ($reservations as $reservation) {
            $names[] = $reservation['name'];
            $nbPeoples[] = $reservation['nbPeople'];
            $tableIds[] = $reservation['tableId'];
            $times[] = substr($reservation['time'], 0, 5);
            $allergies[] = $reservation['allergies'];
        }

        foreach ($allergies as $key => $value) {
            if (is_null($value)) {
                $allergies[$key] = "sans";
            }
        }

        $nbReservations = count($names);
       
        return view('admin/dashboard', [
            'todayFullDate' => $todayFullDate,
            'names' => $names,
            'nbPeoples' => $nbPeoples,
            'tableIds' => $tableIds,
            'times' => $times,
            'allergies' => $allergies,
            'nbReservations' => $nbReservations
        ]);
    }

    public function newdate (Request $request) {

        $newDate = $request->input('date');

        $reservations = Booktable::where('date', $newDate)->get()->toArray();
        
        $names = [];
        $nbPeoples = [];
        $tableIds = [];
        $times = [];
        $allergies = [];

        foreach ($reservations as $reservation) {
            $names[] = $reservation['name'];
            $nbPeoples[] = $reservation['nbPeople'];
            $tableIds[] = $reservation['tableId'];
            $times[] = substr($reservation['time'], 0, 5);
            $allergies[] = $reservation['allergies'];
        }

        foreach ($allergies as $key => $value) {
            if (is_null($value)) {
                $allergies[$key] = "sans";
            }
        }

        $nbReservations = count($names);
       
        return view('admin/dashboard', [
            'todayFullDate' => $newDate,
            'names' => $names,
            'nbPeoples' => $nbPeoples,
            'tableIds' => $tableIds,
            'times' => $times,
            'allergies' => $allergies,
            'nbReservations' => $nbReservations
        ]);

    }

    public function delete (Request $request) {

        dd($request);
        
        $formFields = $request->validate([
            ''
        ]);

    }
}
