<x-layout-admin>
    @if($isUserAdmin)
    <main class="p-12">

        <form action="/dashboard/newdate" method="GET" class="flex">

            <div class="basis-2/3 flex justify-end">
                <div class="flex flex-col w-96">
                    <h2 class="mb-3 self-center">Date</h2>
                    <input type="date" class="border border-gray-200 rounded p-2 w-full mb-5" name="date" min="" max="" id="datefield" value="{{$todayFullDate}}">
                </div>
            </div>
            <div class="basis-1/3 self-center">
                <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate mt-4 ml-4 hidden" id="date-btn">Changer de date</button>
            </div>
        </form>

        <form action="/dashboard/delete" method="POST" class="flex flex-col">
            @csrf

            <div class="flex justify-center">
            {{-- TABLEAU --}}
                <div class="grid grid-cols-5 mt-10">

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-x-2 border-b-2 border-black bg-chocolate text-white">Nom</h3>
                        <ul class="max-h-full overflow-y-auto">

                        @foreach ($names as $name)
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-x-2 border-b-2 border-black">{{$name}}</li>
                        @endforeach

                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Numéro de table</h3>
                        <ul class="max-h-full overflow-y-auto">

                            @foreach ($tableIds as $tableId)
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">{{$tableId}}</li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Heure</h3>
                        <ul class="max-h-full overflow-y-auto">

                            @foreach ($times as $time)
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">{{$time}}</li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Nombre de personnes</h3>
                        <ul class="max-h-full overflow-y-auto">

                            @foreach ($nbPeoples as $nbPeople)
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">{{$nbPeople}}</li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Allergies</h3>
                        <ul class="max-h-full overflow-y-auto">

                            @foreach ($allergies as $allergie)
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">       {{$allergie}}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="ml-2 pt-[5.8rem]">

                    @for ($i = 0; $i < $nbReservations; $i++)
                        <button class="w-10 my-1 opacity-0 hover:opacity-60" id="cross-{{$i}}">
                            <img src="{{asset('dashboards/marque-de-croix.png')}}" alt="supprimer la réservation">
                        </button>
                        <br>
                    @endfor
                    <input type="hidden" id="clickedButton" name="clickedButton" value="">
                    <input type="hidden" id="newDate" name="newDate" value="{{$todayFullDate}}">
                </div>
            </div>
            <div class="self-end mt-8 mx-auto">
                <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate hidden block" id="delete-btn">Enregistrer les modifications</button>
            </div>
        </form>
    </main>
    @else
    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
          <h1>Vous n'êtes pas autorisé à consulter cette page.</h1>
        </div>
    </div>
    <?php
    header("Location: localhost:8000"); // Replace "/path/to/destination" with the actual URL or path
    exit;
    ?>
    @endif
</x-layout-admin>