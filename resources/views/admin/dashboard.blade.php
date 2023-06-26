<x-layout-admin>
    <main class="p-12">

        {{-- <form action="" class="flex flex-col justify-center">
            <h2 class="self-center mb-3">Date</h2>
            <div class="self-center">
                <input type="date" class="border border-gray-200 rounded p-2 w-full mb-5 w-96" name="date" min="" max="" id="datefield" value="2023-06-25">
                <div class="absolute right-[17%] top-[24.4%] hidden lg:block">
                    <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate">Changer de date</button>
                </div>
            </div>
        </form> --}}

        <form action="" class="flex">
            <div class="basis-2/3 flex justify-end">
                <div class="flex flex-col">
                    <h2 class="mb-3 self-center">Date</h2>
                    <input type="date" class="border border-gray-200 rounded p-2 w-full mb-5 w-96" name="date" min="" max="" id="datefield" value="2023-06-25">
                </div>
            </div>
            <div class="basis-1/3 self-center">
                <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate mt-4 ml-4">Changer de date</button>
            </div>
        </form>

        <form action="">

            {{-- TABLEAU --}}
            <div class="grid grid-cols-5 bg-gray-200 p-2 mt-10">

                <div class="bg-white p-4">
                    <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Nom</h3>
                    <ul class="max-h-full overflow-y-auto">
                    <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Clément</li>
                    <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Manon</li>
                    </ul>
                </div>

                <div class="bg-white p-4">
                    <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Numéro de table</h3>
                    <ul class="max-h-full overflow-y-auto">
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">2</li>
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">3</li>
                    </ul>
                </div>

                <div class="bg-white p-4">
                    <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Heure</h3>
                    <ul class="max-h-full overflow-y-auto">
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">12:00</li>
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">13:00</li>
                    </ul>
                </div>

                <div class="bg-white p-4">
                    <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Nombre de personnes</h3>
                    <ul class="max-h-full overflow-y-auto">
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">6</li>
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">10</li>
                    </ul>
                </div>

                <div class="bg-white p-4">
                    <h3 class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Allergies</h3>
                    <ul class="max-h-full overflow-y-auto">
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Sans</li>
                        <li class="whitespace-nowrap overflow-hidden overflow-ellipsis text-center">Fruits de mers</li>
                    </ul>
                </div>
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