<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Booktable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index () {

        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }

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
            'isUserAdmin' => $isUserAdmin,
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

        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }

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
            'isUserAdmin' => $isUserAdmin,
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

        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }
        
        $formFields = $request->validate([
            'clickedButton' => 'required',
            'newDate' => 'required'
        ]);

        $clickedButtonsForm = $request->input('clickedButton');
        $date = $request->input('newDate');

        $pattern = '/\b\d+\b/';
        preg_match_all($pattern, $clickedButtonsForm, $matches);
        $clickedButtons = $matches[0];

        $clickedButtons = array_map('intval', $clickedButtons);

        $bookingsToDelete = Booktable::where('date', $date)
            ->get();

        foreach ($clickedButtons as $clickedButton) {
            if (isset($bookingsToDelete[$clickedButton])) {
                $booking = $bookingsToDelete->slice($clickedButton, 1)->first();
                $booking->delete();
            }
        }
        
        $reservations = Booktable::where('date', $date)->get()->toArray();

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
            'isUserAdmin' => $isUserAdmin,
            'todayFullDate' => $date,
            'names' => $names,
            'nbPeoples' => $nbPeoples,
            'tableIds' => $tableIds,
            'times' => $times,
            'allergies' => $allergies,
            'nbReservations' => $nbReservations
        ]);

    }

    public function schedule () {

        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }

        $today = strtolower(date('l'));
        $englishDays = ['monday', 'tuesday', 'wednesday', 'thursday','friday','saturday', 'sunday'];
        $frenchDays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi','Vendredi','Samedi', 'Dimanche'];

        function translateDay($today, $englishDays, $frenchDays) {
        
            $index = array_search(strtolower($today), $englishDays);
            if ($index !== false) {
                $translatedDay = ucfirst($frenchDays[$index]);
                return $translatedDay;
            } else {
                return null;
            }
        }

        $frenchToday = translateDay($today, $englishDays, $frenchDays);

        $schedule = Schedule::where('day', $frenchToday)->first();
        
        $isClosed = $schedule->isClosed;

        // Horaires du midi
        $noonOpeningTimeHour = substr($schedule->noonOpeningTime, 0, 2);
        $noonOpeningTimeMinute = substr($schedule->noonOpeningTime, 3, 2);
        $noonClosingTimeHour = substr($schedule->noonClosingTime, 0, 2);
        $noonClosingTimeMinute = substr($schedule->noonClosingTime, 3, 2);

        // Horaires du soir
        $eveningOpeningTimeHour = substr($schedule->eveningOpeningTime, 0, 2);
        $eveningOpeningTimeMinute = substr($schedule->eveningOpeningTime, 3, 2);
        $eveningClosingTimeHour = substr($schedule->eveningClosingTime, 0, 2);
        $eveningClosingTimeMinute = substr($schedule->eveningClosingTime, 3, 2);

        // Valeur par défaut

        $noonHours = [9, 10, 11, 12, 13, 14, 15, 16];
        $eveningHours = [17, 18, 19, 20, 21, 22, 23];
        $minutes = ['00', 15, 30, 45];


        // Il me faut une variable ouverture en heure, une variable fermeture en minute X2 pour le midi ou le soir
        // 4 POUR CHAQUE, 8 AU TOTAL

        return view ('admin/schedule', [
            'isUserAdmin' => $isUserAdmin,
            'today' => $today,
            'englishDays' => $englishDays,
            'frenchDays' => $frenchDays,
            'isClosed' => $isClosed,
            'noonHours' => $noonHours,
            'eveningHours' => $eveningHours,
            'minutes' => $minutes,
            'noonOpeningTimeHour' => $noonOpeningTimeHour,
            'noonClosingTimeHour' => $noonClosingTimeHour,
            'noonOpeningTimeMinute' => $noonOpeningTimeMinute,
            'noonClosingTimeMinute' => $noonClosingTimeMinute,
            'eveningOpeningTimeHour' => $eveningOpeningTimeHour,
            'eveningClosingTimeHour' => $eveningClosingTimeHour,
            'eveningOpeningTimeMinute' => $eveningOpeningTimeMinute,
            'eveningClosingTimeMinute' => $eveningClosingTimeMinute
        ]);
    }

    public function newday(Request $request) {
        
        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }
        
        $today = $request->input('day');

        $englishDays = ['monday', 'tuesday', 'wednesday', 'thursday','friday','saturday', 'sunday'];
        $frenchDays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi','Vendredi','Samedi', 'Dimanche'];

        function translateDay($today, $englishDays, $frenchDays) {
        
            $index = array_search(strtolower($today), $englishDays);
            if ($index !== false) {
                $translatedDay = ucfirst($frenchDays[$index]);
                return $translatedDay;
            } else {
                return null;
            }
        }

        $frenchToday = translateDay($today, $englishDays, $frenchDays);

        $schedule = Schedule::where('day', $frenchToday)->first();
        
        $isClosed = $schedule->isClosed;

        // Horaires du midi
        $noonOpeningTimeHour = substr($schedule->noonOpeningTime, 0, 2);
        $noonOpeningTimeMinute = substr($schedule->noonOpeningTime, 3, 2);
        $noonClosingTimeHour = substr($schedule->noonClosingTime, 0, 2);
        $noonClosingTimeMinute = substr($schedule->noonClosingTime, 3, 2);

        // Horaires du soir
        $eveningOpeningTimeHour = substr($schedule->eveningOpeningTime, 0, 2);
        $eveningOpeningTimeMinute = substr($schedule->eveningOpeningTime, 3, 2);
        $eveningClosingTimeHour = substr($schedule->eveningClosingTime, 0, 2);
        $eveningClosingTimeMinute = substr($schedule->eveningClosingTime, 3, 2);

        // Valeur par défaut

        $noonHours = [9, 10, 11, 12, 13, 14, 15, 16];
        $eveningHours = [17, 18, 19, 20, 21, 22, 23];
        $minutes = ['00', 15, 30, 45];

        return view ('admin/schedule', [
            'isUserAdmin' => $isUserAdmin,
            'today' => $today,
            'englishDays' => $englishDays,
            'frenchDays' => $frenchDays,
            'isClosed' => $isClosed,
            'noonHours' => $noonHours,
            'eveningHours' => $eveningHours,
            'minutes' => $minutes,
            'noonOpeningTimeHour' => $noonOpeningTimeHour,
            'noonClosingTimeHour' => $noonClosingTimeHour,
            'noonOpeningTimeMinute' => $noonOpeningTimeMinute,
            'noonClosingTimeMinute' => $noonClosingTimeMinute,
            'eveningOpeningTimeHour' => $eveningOpeningTimeHour,
            'eveningClosingTimeHour' => $eveningClosingTimeHour,
            'eveningOpeningTimeMinute' => $eveningOpeningTimeMinute,
            'eveningClosingTimeMinute' => $eveningClosingTimeMinute
        ]);
    }

    public function update(Request $request) {

        $user = Auth::user();
        if ($user) {
            $isUserAdmin = $user->isAdmin;
        } else {
            $isUserAdmin = 0;
        }

        $noonOpeningTimeHour = $request->input('noon-open-hour');
        $noonOpeningTimeMinute = $request->input('noon-open-minute');
        $noonClosingTimeHour = $request->input('noon-close-hour');
        $noonClosingTimeMinute = $request->input('noon-close-minute');

        $eveningOpeningTimeHour = $request->input('evening-open-hour');
        $eveningOpeningTimeMinute = $request->input('evening-open-minute');
        $eveningClosingTimeHour = $request->input('evening-close-hour');
        $eveningClosingTimeMinute = $request->input('evening-close-minute');

        if ($request->input('closed-day') === 'on') {
            $isClosed = 1;
        } else {
            $isClosed = 0;
        }

        $today = $request->input('actualday');
        
        $englishDays = ['monday', 'tuesday', 'wednesday', 'thursday','friday','saturday', 'sunday'];
        $frenchDays = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi','Vendredi','Samedi', 'Dimanche'];
        
        function translateDay($today, $englishDays, $frenchDays) {
            
            $index = array_search(strtolower($today), $englishDays);
            if ($index !== false) {
                $translatedDay = ucfirst($frenchDays[$index]);
                return $translatedDay;
            } else {
                return null;
            }
        }
        
        $frenchToday = translateDay($today, $englishDays, $frenchDays);
        $frenchToday = strtolower($frenchToday);
        
        function createTime($hour, $minute) {
            $hour = str_pad($hour, 2, '0', STR_PAD_LEFT);
            $minute = str_pad($minute, 2, '0', STR_PAD_LEFT);
        
            return $hour . ':' . $minute . ':00';
        }

       $noonOpeningTime = createTime($noonOpeningTimeHour, $noonOpeningTimeMinute);
       $noonClosingTime = createTime($noonClosingTimeHour, $noonClosingTimeMinute);
       $eveningOpeningTime = createTime($eveningOpeningTimeHour, $eveningOpeningTimeMinute);
       $eveningClosingTime = createTime($eveningClosingTimeHour,            $eveningClosingTimeMinute); 

        if ($noonOpeningTime >= $noonClosingTime || $eveningOpeningTime >= $eveningClosingTime) {
            $isOpeningSuperior = true;
        } else {
            $isOpeningSuperior = false;
        }

       if($isOpeningSuperior) {
        return back()->withErrors(['schedule' => "Un horaire d'ouverture est plus grand qu'un horaire de fermeture."]);
       }

       $scheduleTable = Schedule::where('day', $frenchToday)->first();

        $schedule = Schedule::where('day', $frenchToday)->first();
            
        if ($schedule) {
            $schedule->noonOpeningTime = $noonOpeningTime;
            $schedule->noonClosingTime = $noonClosingTime;
            $schedule->eveningOpeningTime = $eveningOpeningTime;
            $schedule->eveningClosingTime = $eveningClosingTime;
            $schedule->isClosed = $isClosed;
            $schedule->save();
        }


       // Horaires du midi
       $noonOpeningTimeHour = substr($schedule->noonOpeningTime, 0, 2);
       $noonOpeningTimeMinute = substr($schedule->noonOpeningTime, 3, 2);
       $noonClosingTimeHour = substr($schedule->noonClosingTime, 0, 2);
       $noonClosingTimeMinute = substr($schedule->noonClosingTime, 3, 2);

       // Horaires du soir
       $eveningOpeningTimeHour = substr($schedule->eveningOpeningTime, 0, 2);
       $eveningOpeningTimeMinute = substr($schedule->eveningOpeningTime, 3, 2);
       $eveningClosingTimeHour = substr($schedule->eveningClosingTime, 0, 2);
       $eveningClosingTimeMinute = substr($schedule->eveningClosingTime, 3, 2);

       // Valeur par défaut

       $noonHours = [9, 10, 11, 12, 13, 14, 15, 16];
       $eveningHours = [17, 18, 19, 20, 21, 22, 23];
       $minutes = ['00', 15, 30, 45];

       return view ('admin/schedule', [
           'isUserAdmin' => $isUserAdmin,
           'today' => $today,
           'englishDays' => $englishDays,
           'frenchDays' => $frenchDays,
           'isClosed' => $isClosed,
           'noonHours' => $noonHours,
           'eveningHours' => $eveningHours,
           'minutes' => $minutes,
           'noonOpeningTimeHour' => $noonOpeningTimeHour,
           'noonClosingTimeHour' => $noonClosingTimeHour,
           'noonOpeningTimeMinute' => $noonOpeningTimeMinute,
           'noonClosingTimeMinute' => $noonClosingTimeMinute,
           'eveningOpeningTimeHour' => $eveningOpeningTimeHour,
           'eveningClosingTimeHour' => $eveningClosingTimeHour,
           'eveningOpeningTimeMinute' => $eveningOpeningTimeMinute,
           'eveningClosingTimeMinute' => $eveningClosingTimeMinute
       ]);



    }
}
