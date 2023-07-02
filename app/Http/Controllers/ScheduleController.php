<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index() {

        // Préremplir le formulaire pour les utilisateurs connectés
        $user = Auth::user();

        if ($user) {
            $userNbPeople = $user->number;
            if ($user->allergies) {
                $userAllergies = $user->allergies;
            } else {
                $userAllergies = '';
            }
        } else {
            $userNbPeople = 1;
            $userAllergies = '';
        }

        // Trouver la date du jour
        $todayFullDate = date('Y-m-d');
        setlocale(LC_TIME, 'fr_FR');
        $dayOfWeek = strftime('%A', strtotime($todayFullDate));
        $dayOfWeek = strtolower($dayOfWeek);

        // Génère un tableau avec les horaires par tranche de 15'
        function generateSchedules($openingTime, $closingTime) {
            $openingTime = new DateTime($openingTime);
            $closingTime = new DateTime($closingTime);
        
            $interval = new DateInterval('PT15M');
        
            $schedules = array();
            while ($openingTime <= $closingTime) {
                array_push($schedules, $openingTime->format('H:i'));
                $openingTime->add($interval);
            }
            
            return $schedules;
        }

        // Récupère les horaires de la BDD dans des variables
        $schedule = Schedule::where('day', $dayOfWeek)->first();
        $noonOpeningTime = $schedule->noonOpeningTime;
        $noonClosingTime = $schedule->noonClosingTime;
        $eveningOpeningTime = $schedule->eveningOpeningTime;
        $eveningClosingTime = $schedule->eveningClosingTime;

        // Vérifie si le restaurant est fermé à ce jour
        $closedDays = Schedule::where('isClosed', true)->get()->pluck('day')->toArray();

        if (in_array($dayOfWeek, $closedDays)) {
            $dontDisplay = true;
        } else {
            $dontDisplay = false;
        }

        // Génère le tableau d'horaires
        $noonSchedules = generateSchedules($noonOpeningTime, $noonClosingTime);
        $eveningSchedules = generateSchedules($eveningOpeningTime, $eveningClosingTime);

        // Enlever la dernière heure
        array_pop($noonSchedules);
        array_pop($noonSchedules);
        array_pop($noonSchedules);
        array_pop($noonSchedules);
        array_pop($eveningSchedules);
        array_pop($eveningSchedules);
        array_pop($eveningSchedules);
        array_pop($eveningSchedules);

        // Retourne la vue
        return view('reservation', [
            'noonSchedules' => $noonSchedules,
            'eveningSchedules' => $eveningSchedules,
            'todayFullDate' => $todayFullDate,
            'dontDisplay' => $dontDisplay,
            'userNbPeople' => $userNbPeople,
            'userAllergies' => $userAllergies
        ]);
    }

    public function newdate($selectedDate)
{
    setlocale(LC_TIME, 'fr_FR');
    $dayOfWeek = strftime('%A', strtotime($selectedDate));
    $dayOfWeek = strtolower($dayOfWeek);

    $schedule = Schedule::where('day', $dayOfWeek)->first();
    $noonOpeningTime = $schedule->noonOpeningTime;
    $noonClosingTime = $schedule->noonClosingTime;
    $eveningOpeningTime = $schedule->eveningOpeningTime;
    $eveningClosingTime = $schedule->eveningClosingTime;

    function generateSchedules($openingTime, $closingTime) {
        $openingTime = new DateTime($openingTime);
        $closingTime = new DateTime($closingTime);
    
        $interval = new DateInterval('PT15M');
    
        $schedules = array();
        while ($openingTime <= $closingTime) {
            array_push($schedules, $openingTime->format('H:i'));
            $openingTime->add($interval);
        }
        
        return $schedules;
    }

    $noonSchedules = generateSchedules($noonOpeningTime, $noonClosingTime);
    $eveningSchedules = generateSchedules($eveningOpeningTime, $eveningClosingTime);

    array_pop($noonSchedules);
    array_pop($noonSchedules);
    array_pop($noonSchedules);
    array_pop($noonSchedules);
    array_pop($eveningSchedules);
    array_pop($eveningSchedules);
    array_pop($eveningSchedules);
    array_pop($eveningSchedules);

    $closedDays = Schedule::where('isClosed', true)->get()->pluck('day')->toArray();

    if (in_array($dayOfWeek, $closedDays)) {
        $dontDisplay = true;
     } else {
        $dontDisplay = false;
     }

    return response()->json([
        'noonSchedules' => $noonSchedules,
        'eveningSchedules' => $eveningSchedules,
        'dontDisplay' => $dontDisplay
    ]);
}
}
