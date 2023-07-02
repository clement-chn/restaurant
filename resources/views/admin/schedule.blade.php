<x-layout-admin>
    @if($isUserAdmin)

    <main class="p-12">
        <form action="" method="GET" class="flex flex-col">

            <div class="self-center" id="dayfield-container">
                <div class="flex flex-col w-96">
                    <h2 class="mb-3 self-center">Jour</h2>
                    <select class="border border-gray-200 rounded p-2 w-full" name="day" id="dayfield">
                        @foreach ($englishDays as $key => $day)
                        <option value="{{ $day }}" @if ($day === $today) selected @endif>{{ $frenchDays[$key] }}</option>
                        @endforeach
                    </select>                      
                </div>
                <div class="basis-1/3 self-center">
                    <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate mt-9 ml-5 hidden" id="day-btn">Changer de jour</button>
                </div>
            </div>


            <div class="flex justify-evenly p-32">
                <div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-open-hour" id ="noon-open-hour-field">
                            @foreach ($noonHours as $noonHour)
                            <option value="{{$noonHour}}" @if ($noonHour == $noonOpeningTimeHour) selected @endif>{{$noonHour}}</option>
                            @endforeach
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-open-minute" id ="noon-open-minute-field">
                            @foreach ($minutes as $noonOpeningMinute)
                            <option value="{{$noonOpeningMinute}}" @if ($noonOpeningMinute == $noonOpeningTimeMinute) selected @endif>{{$noonOpeningMinute}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-close-hour" id ="noon-close-hour-field">
                            @foreach ($noonHours as $noonHour)
                            <option value="{{$noonHour}}" @if ($noonHour == $noonClosingTimeHour) selected @endif>{{$noonHour}}</option>
                            @endforeach
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-close-minute" id ="noon-close-minute-field">
                            @foreach ($minutes as $noonClosingMinute)
                            <option value="{{$noonClosingMinute}}" @if ($noonClosingMinute == $noonClosingTimeMinute) selected @endif>{{$noonClosingMinute}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="eveninopen-hour" id ="evening-open-hour-field">
                            @foreach ($eveningHours as $eveningHour)
                            <option value="{{$eveningHour}}" @if ($eveningHour == $eveningOpeningTimeHour) selected @endif>{{$eveningHour}}</option>
                            @endforeach
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-open-minute" id ="evening-open-minute-field">
                            @foreach ($minutes as $eveningOpeningMinute)
                            <option value="{{$eveningOpeningMinute}}" @if ($eveningOpeningMinute == $eveningOpeningTimeMinute) selected @endif>{{$eveningOpeningMinute}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-close-hour" id ="evening-close-hour-field">
                            @foreach ($eveningHours as $eveningHour)
                            <option value="{{$eveningHour}}" @if ($eveningHour == $eveningClosingTimeHour) selected @endif>{{$eveningHour}}</option>
                            @endforeach
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-close-minute" id ="evening-close-minute-field">
                            @foreach ($minutes as $eveningClosingMinute)
                            <option value="{{$eveningClosingMinute}}" @if ($eveningClosingMinute == $eveningClosingTimeMinute) selected @endif>{{$eveningClosingMinute}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex justify-center" id="form-btn-container">
                <div class="flex">
                    <p class="p-3 self-center">Le restaurant est fermé à ce jour</p>
                    <input type="checkbox" @if ($isClosed) checked @endif name="closed-day" id="closed-day-field">
                </div>
                <div class="self-center">
                    <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate hidden block" id="delete-btn">Enregistrer les modifications</button>
                </div>
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