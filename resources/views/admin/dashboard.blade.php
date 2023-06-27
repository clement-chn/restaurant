<x-layout-admin>
    <main class="p-12">

        <form action="" class="flex">
            <div class="basis-2/3 flex justify-end">
                <div class="flex flex-col w-96">
                    <h2 class="mb-3 self-center">Date</h2>
                    <input type="date" class="border border-gray-200 rounded p-2 w-full mb-5" name="date" min="" max="" id="datefield" value="2023-06-25">
                </div>
            </div>
            <div class="basis-1/3 self-center">
                <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate mt-4 ml-4">Changer de date</button>
            </div>
        </form>

        <form action="" class="flex flex-col">

            <div class="flex justify-center">
            {{-- TABLEAU --}}
                <div class="grid grid-cols-5 mt-10">

                    {{-- <div class="bg-white border-solid border-2 border-black border-b-0"> --}}
                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-x-2 border-b-2 border-black bg-chocolate text-white">Nom</h3>
                        <ul class="max-h-full overflow-y-auto">
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-x-2 border-b-2 border-black">Clément</li>
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-x-2 border-b-2 border-black">Manon</li>
                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Numéro de table</h3>
                        <ul class="max-h-full overflow-y-auto">
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">2</li>
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">3</li>
                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Heure</h3>
                        <ul class="max-h-full overflow-y-auto">
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">12:00</li>
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">13:00</li>
                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Nombre de personnes</h3>
                        <ul class="max-h-full overflow-y-auto">
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">6</li>
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">10</li>
                        </ul>
                    </div>

                    <div class="bg-white border-solid border-t-2 border-black">
                        <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black bg-chocolate text-white">Allergies</h3>
                        <ul class="max-h-full overflow-y-auto">
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">Sans</li>
                            <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center py-3 border-solid border-r-2 border-b-2 border-black">Fruits de mers</li>
                        </ul>
                    </div>
                </div>
                {{-- Ici une boucle for i = 0, blabla il faut une croix pour chaque ligne du tableau --}}
                <div class="ml-2 pt-[5.8rem]">
                    <button class="w-12 opacity-0 hover:opacity-60" id="cross-1">
                        <img src="{{asset('dashboards/marque-de-croix.png')}}" alt="supprimer la réservation">
                    </button>
                    <br>
                    <button class="w-12 opacity-0 hover:opacity-60" id="cross-2">
                        <img src="{{asset('dashboards/marque-de-croix.png')}}" alt="supprimer la réservation">
                    </button>
                </div>
            </div>
            <div class="self-end mt-8 mx-auto">
                <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate hidden block" id="delete-btn">Enregistrer les modifications</button>
            </div>
        </form>
            
            
        {{-- @foreach ($names as $name)
        <li class="text-center">{{$name}}</li>
        @endforeach --}}
    

        {{-- @foreach ($tableIds as $tableId)
        <li class="text-center">{{$tableId}}</li>
        @endforeach --}}



        {{-- @foreach ($times as $time)
        <li class="text-center">{{$time}}</li>
        @endforeach --}}
    


        {{-- @foreach ($nbPeoples as $nbPeople)
        <li class="text-center">{{$nbPeople}}</li>
        @endforeach --}}
    


        {{-- @if ($allergies)

        @foreach ($allergies as $allergie)
        <li class="text-center">{{$allergie}}</li>
        @endforeach

        @else

        <li class="text-center">Sans</li>

        @endif --}}
    </main>
</x-layout-admin>