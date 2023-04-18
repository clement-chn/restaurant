<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
            $todayFullDate = date('Y-m-d');
            setlocale(LC_TIME, 'fr_FR');
            $dayOfWeek = strftime('%A', strtotime($todayFullDate));
            $dayOfWeek = strtolower($dayOfWeek);
            // $dayOfWeek = 'jeudi';

        // générer les horaires
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

        $schedule = Schedule::where('day', $dayOfWeek)->first();
        $noonOpeningTime = $schedule->noonOpeningTime;
        $noonClosingTime = $schedule->noonClosingTime;
        $eveningOpeningTime = $schedule->eveningOpeningTime;
        $eveningClosingTime = $schedule->eveningClosingTime;

        $closedDays = Schedule::where('isClosed', true)->get()->pluck('day')->toArray();

        if (in_array($dayOfWeek, $closedDays)) {
            $dontDisplay = true;
        } else {
            $dontDisplay = false;
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

        return view('reservation', [
            'noonSchedules' => $noonSchedules,
            'eveningSchedules' => $eveningSchedules,
            'todayFullDate' => $todayFullDate,
            'dontDisplay' => $dontDisplay
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
