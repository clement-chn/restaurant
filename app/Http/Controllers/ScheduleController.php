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

        $noonSchedules = generateSchedules($noonOpeningTime, $noonClosingTime);
        $eveningSchedules = generateSchedules($eveningOpeningTime, $eveningClosingTime);

        return view('reservation', [
            'noonSchedules' => $noonSchedules,
            'eveningSchedules' => $eveningSchedules,
            'todayFullDate' => $todayFullDate
        ]);
    }

    public function newdate($selectedDate) {
        $todayFullDate = $selectedDate;
        setlocale(LC_TIME, 'fr_FR');
        $dayOfWeek = strftime('%A', strtotime($todayFullDate));
        $dayOfWeek = strtolower($dayOfWeek);
    }
}
