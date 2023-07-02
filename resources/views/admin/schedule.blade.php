<x-layout-admin>
    @if($isUserAdmin)

    <main class="p-12">
        <form action="" method="GET" class="flex flex-col">

            <div class="self-center" id="dayfield-container">
                <div class="flex flex-col w-96">
                    <h2 class="mb-3 self-center">Jour</h2>
                    <select class="border border-gray-200 rounded p-2 w-full" name="day" id="dayfield">
                        <option value="monday">Lundi</option>
                        <option value="tuesday">Mardi</option>
                        <option value="wednesday">Mercredi</option>
                        <option value="thursday">Jeudi</option>
                        <option value="friday">Vendredi</option>
                        <option value="saturday">Samedi</option>
                        <option value="sunday">Dimanche</option>
                    </select>                      
                </div>
                <div class="basis-1/3 self-center">
                    <button type="submit" class="bg-gold text-white rounded py-2 px-4 hover:bg-chocolate mt-4 ml-4 hidden" id="day-btn">Changer de jour</button>
                </div>
            </div>


            <div class="flex justify-evenly p-32">
                <div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-open-hour" id ="noon-open-hour-field">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-open-minute" id ="noon-open-minute-field">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            </select>
                    </div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-close-hour" id ="noon-close-hour-field">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="noon-close-minute" id ="noon-close-minute-field">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            </select>
                    </div>
                </div>


                <div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="eveninopen-hour" id ="evening-open-hour-field">
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-open-minute" id ="evening-open-minute-field">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            </select>
                    </div>
                    <div class="flex">
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-close-hour" id ="evening-close-hour-field">
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        </select>
                        <p class="text-xl px-4 pt-1">:</p>
                        <select class="border border-gray-200 rounded p-2 w-full mb-5 w-[4rem]" name="evening-close-minute" id ="evening-close-minute-field">
                            <option value="00">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                            </select>
                    </div>
                </div>
            </div>
            <div class="flex justify-center" id="form-btn-container">
                <div class="flex">
                    <p class="p-3 self-center">Le restaurant est fermé à ce jour</p>
                    <input type="checkbox" name="closed-day" id="closed-day-field">
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