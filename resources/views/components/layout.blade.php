<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Quai Antique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Madurai:wght@400;700&family=Lora:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@400;700&family=Pinyon+Script&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/toggle-menu.js')
    @vite('resources/js/date-reservation.js')
</head>
<body>
    <nav class="sm:flex sm:justify-between p-5 shadow-md z-40">
        <div class="flex justify-between">
          <h1 class="lg:text-5xl md:text-4xl font-logo self-center text-3xl text-gold"><a href="/">Le Quai Antique</a></h1>
          <button class="sm:hidden" id="menu-btn">
            <img class="w-10 h-10" src="{{asset('/burger/burger.png')}}" alt="menu deroulant" id="menu-img">
          </button>
        </div>
        <ul class="sm:block sm:flex sm:py-0 font-subtitle hidden text-center py-8" id="menu-links">
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold"><a href="/">Accueil</a></li>
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold"><a href="#">Carte</a></li>
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold"><a href="#">Horaires</a></li>
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold font-bold"><a href="/reservation">Réserver</a></li>
          @auth
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg text-red-400 hover:text-red-300">
            <form method="POST" action="/logout">
            @csrf
            <button type="submit">
              Se déconnecter
            </button>
            </form>
          </li>
          @else
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold"><a href="/register">Inscription</a></li>
          <li class="lg:text-lg lg:p-4 sm:p-2 sm:text-base p-4 text-lg hover:text-gold"><a href="/login">Connexion</a></li>
          @endauth
        </ul>
    </nav>
    {{$slot}}
    <footer class="bg-chocolate text-white static">
      <h2 class="text-center p-4 text-xl underline underline-offset-8">Horaires d'ouverture</h2>
      {{-- Horaires à mettre ici avec un foreach --}}
      <p class="font-logo text-center p-3">© Le Quai Antique</p>
    </footer>
</body>
</html>