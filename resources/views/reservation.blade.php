<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto my-24">
        <form action="/booktable" method="POST">
            @csrf

            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Nom</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name">

                @error('name') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="number" class="inline-block text-lg mb-2">Nombre de personnes</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number" value="{{$userNbPeople}}" min="1">

                @error('number') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="text" class="inline-block text-lg mb-2">Des allergies?</label>
                <input type="text" placeholder="ex: lactose, arachides..." class="border border-gray-200 rounded p-2 w-full" name="allergies" value="{{$userAllergies}}" >

            </div>

            <div class="mb-6">
                <label for="date" class="inline-block text-lg mb-2">Date de réservation</label>
                <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date" min="" max="" id="datefield" value="{{$todayFullDate}}">

                @error('date') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            @if ($dontDisplay)

            <div class="mb-6" id="message">
                <p>Le restaurant est fermé ce jour-ci. Veuillez sélectionner une autre date.</p>
            </div>

            <div class="hidden" id="schedule-display">
                <div class="mb-6">
                    <label for="time-clicked" class="inline-block text-lg mb-2">Heure</label><br>
                    @foreach ($noonSchedules as $index => $noonSchedule)
                    <button type="button" name="time" value="{{$noonSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded btn" id="noon-schedule-{{$index}}-{{$noonSchedule}}">{{$noonSchedule}}</button>
                    @endforeach
                </div>
                <div class="mb-6">
                    @foreach ($eveningSchedules as $index => $eveningSchedule)
                    <button type="button" name="time" value="{{$eveningSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded btn" id="evening-schedule-{{$index}}-{{$eveningSchedule}}">{{$eveningSchedule}}</button>
                    @endforeach
                </div>
                <input type="hidden" name="time-clicked" id="time-clicked-input" value="">
            </div>

            @else

            <div class="mb-6 hidden" id="message">
                <p>Le restaurant est fermé ce jour-ci. Veuillez sélectionner une autre date.</p>
            </div>

            <div class="" id="schedule-display">
                <div class="mb-6">
                    <label for="time-clicked" class="inline-block text-lg mb-2">Heure</label><br>
                    @foreach ($noonSchedules as $index => $noonSchedule)
                    <button type="button" name="time" value="{{$noonSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded btn" id="noon-schedule-{{$index}}-{{$noonSchedule}}">{{$noonSchedule}}</button>
                    @endforeach
                </div>
                <div class="mb-6">
                    @foreach ($eveningSchedules as $index => $eveningSchedule)
                    <button type="button" name="time" value="{{$eveningSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded btn" id="evening-schedule-{{$index}}-{{$eveningSchedule}}">{{$eveningSchedule}}</button>
                    @endforeach
                </div>
                <input type="hidden" name="time-clicked" id="time-clicked-input" value="">
            </div>

            @endif

            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-red-500 text-white rounded py-2 px-4 hover:bg-red-400"
                >
                    Réserver
                </button>
            </div>

        </form>
    </div>
</x-layout>