<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto my-24">
        <form method="POST" action="/reservation">
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
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="number" value="" min="1">

                {{-- Dans value, mettre celle de User --}}

                @error('number') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="text" class="inline-block text-lg mb-2">Des allergies?</label>
                <input type="text" placeholder="ex: lactose, arachides..." class="border border-gray-200 rounded p-2 w-full" name="allergies" value="" >

                {{-- Dans value, mettre celle de User --}}

            </div>

            <div class="mb-6">
                <label for="date" class="inline-block text-lg mb-2">Date de réservation</label>
                <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date" min="" max="" id="datefield" value="{{$todayFullDate}}">

                {{-- Dans min, mettre date d'aujourd'hui --}}

                @error('date') 
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="time" class="inline-block text-lg mb-2">Heure</label><br>
                @foreach ($noonSchedules as $noonSchedule)
                <button name="time" value="{{$noonSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded">{{$noonSchedule}}</button>
                @endforeach
            </div>
            <div class="mb-6">
                @foreach ($eveningSchedules as $eveningSchedule)
                <button name="time" value="{{$eveningSchedule}}" class="bg-gold w-16 p-3 text-white m-2 rounded">{{$eveningSchedule}}</button>
                @endforeach
            </div>
        </form>
    </div>
</x-layout>